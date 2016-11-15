

<div class="container">

<h2><i>Edit Contact</i></h2>
	

	<?= Form::open('/contact/'.$contact->id.'/edit', ['id' => 'row-form']) ?>

	<div class="flex-row">
		<div class="form-group">
			{{ Form::label('first_name', 'First Name') }}
			{{ Form::text('first_name', $contact->first_name, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">

			{{ Form::label('last_name', 'Last Name') }}
			{{ Form::text('last_name', $contact->last_name, ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="flex-row">
		<div class="form-group">
			{{ Form::label('company', 'Company') }}
			{{ Form::text('company', $contact->company, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email', $contact->email, ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="flex-row">
		<div class="form-group">
			{{ Form::label('phone_number', 'Phone') }}

			<div class="input_fields_wrap">
				<? foreach($contact->phones()->where('deleted', '0')->get() as $phone):?>

					<div class="flex-row">
						{{ Form::hidden('ids[]', $phone->id)}}
						{{ Form::number('phone_number[]', $phone->phone_number, ['class' => 'form-control']) }}
						<button type="button" class="remove_field">x</button>
					</div>

				<? endforeach ?>
			</div>
			<button type="button" class="add_field_button">Add number</button>
		</div>
		<div class="form-group">
			{{ Form::label('additional_information', 'Additional Information') }}
			{{ Form::textarea('additional_information', $contact->additional_information, ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::submit('Confirm', ['class' => 'btn btn-success']) }}
		<a href="{{url('/contact/'.$contact->id)}}" class="btn btn-warning">Cancel</a>
	</div>


	<?= Form::close() ?>
	
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<script>
	
$(document).ready(function() {
	var max_fields 		= 5;
	var wrapper 		= $(".input_fields_wrap");
	var add_button 		= $(".add_field_button");

	var x = 1;
	$(add_button).click(function(e) {
		e.preventDefault();
		if(x < max_fields) {
			x++;
			$(wrapper).append('<div class="flex-row"><input class="form-control" type="number" name="phone_number[]"/><button type="button" class="remove_field ">x</button></div>');
		}
	});

	$(wrapper).on("click",".remove_field", function(e){
		e.preventDefault();
		var theID = $(this).prev().prev().val()
		console.log(theID);
		$('form').append('<input type="hidden" name="deletes[]" value="' + theID + '">')
		$(this).parent('div').remove();
		x--;
	})
});

</script>
