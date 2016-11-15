<div class="container">

<h2><i>Contact Information</i></h2>
	<br>

	<div class="contact">
		<p><b>First name:</b> <?= $contact->first_name ?></p>
		<p><b>Last name:</b> <?= $contact->last_name ?></p>
		<p><b>Company:</b> <?= $contact->company ?></p>
		<div class="flex-row flex-a-center">
			<p><b>Email Address:</b> <?= $contact->email?></p>
			<? if($contact->email):?>
				<a href="<?=url('/contact/'.$contact->id.'/email')?>">{{ image("assets/img/email.png", ['class'=>'email-link'])}}</a>
			<?endif?>
		</div>
		<p>
			<b>Phone:</b>
			<? foreach($contact->phones()->where('deleted', '0')->get() as $phone_number): ?>
				{{ $phone_number->phone_number}} , 
			<? endforeach ?>
		</p>
		<p><b>Additional Information:</b> <?= $contact->additional_information ?></p>

		<a href="<?=url('/contact/'.$contact->id.'/edit')?>">
			<button type="button" class="btn btn-info">Edit</button>
		</a>

		<a href="<?=url('/contact/'.$contact->id.'/delete')?>">
			<button type="button" class="btn btn-danger" id="delete-btn">Delete contact</button>
		</a>
	</div>

	
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<script>
	
	$('#delete-btn').on('click', function(event) {
		var confirmed = confirm('Are you sure you want to delete this contact?')

		if(!confirmed) {
			event.preventDefault()
		}
	})

	<?php if(App\DataStore::flash('send')): ?>
		alert('Email was sent!')
	<?php endif ?>

</script>
