<div class="container">
	<div class="email">
		<h2><i>Email</i> {{ $contact->first_name }}</h2>

		<p><b>From:</b> {{ App\Auth::user()->email }}</p>
		<p><b>To:</b> {{ $contact->email }} </p>

		<?= Form::open('/contact/'.$contact->id.'/submit') ?>
			<div class="form-group flex-col">
				{{ Form::label('subject', 'Subject') }}
				{{ Form::text('subject','', ['class' => 'email-subject']) }}
			</div>

			<div class="form-group flex-col">
				{{ Form::label('content', 'Message') }}
				{{ Form::textarea('content','', ['class' => 'email-message']) }}
			</div>
			<div class="form-group">
				{{ Form::submit('Send', ['class' => 'btn btn-success', 'id' => 'send-btn']) }}
				<a href="{{url('/contact/'.$contact->id)}}" class="btn btn-warning">Cancel</a>
			</div>	
		<?= Form::close() ?>	
	</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.13/tinymce.min.js"></script>
	<script>
		
	tinymce.init({selector: '#content'})

	</script>