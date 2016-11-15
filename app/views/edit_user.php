

<div class="container">

<h2><i>Edit profile</i></h2>

<br>
	

	<?= Form::open('/user/'.$user->id.'/edit', ['id' => 'row-form']) ?>

	<div class="flex-row">
		<div class="form-group">
			{{ Form::label('first_name', 'First Name') }}
			{{ Form::text('first_name', $user->first_name, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">

			{{ Form::label('last_name', 'Last Name') }}
			{{ Form::text('last_name', $user->last_name, ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="flex-row">
		<div class="form-group">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', $user->username, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email', $user->email, ['class' => 'form-control']) }}
		</div>
	</div>
		<div class="form-group">
			{{ Form::submit('Confirm', ['class' => 'btn btn-success']) }}
			<a href="{{url('/user/'.App\Auth::user()->id)}}" class="btn btn-warning">Cancel</a>
		</div>


	<?= Form::close() ?>
	
	</div>
