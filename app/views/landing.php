<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WEo3</title>
	{{ style('/assets/css/flexy.css') }}
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
	{{ style('/assets/css/style.css') }}
</head>
<body>

<header class="header flex-row flex-a-center flex-j-between">
	<h1>WEo3</h1>
</header>	
<main class="flex-1">
	<div class="landing">
		<div class="container flex-row flex-a-center flex-j-around" style="margin-top: 1em;">
			<div>
				<h1>Login</h1>

				<?= Form::open('/auth/attempt') ?>
					<div class="form-group">
						{{ Form::label('username', 'Username') }}
						{{ Form::text('username', '', ['class' => 'form-control required'])}}
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Password') }}
						{{ Form::password('password', '', ['class' => 'form-control required'])}}
					</div>
					<div class="form-group">
						{{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
					</div>
				<?= Form::close() ?>
			</div>
			
			<h3><i>OR</i></h3>

			<div>
				<h1>Register</h1>

				<?= Form::open('/user/save') ?>
					<div class="form-group">
						{{ Form::label('first_name', 'First Name') }}
						{{ Form::text('first_name', '', ['class' => 'form-control required']) }}
					</div>
					<div class="form-group">
						{{ Form::label('last_name', 'Last Name') }}
						{{ Form::text('last_name', '', ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::label('username', 'Username') }}
						{{ Form::text('username', '', ['class' => 'form-control required']) }}
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Password') }}
						{{ Form::password('password', '', ['class' => 'form-control required']) }}
					</div>
					<div class="form-group">
						{{ Form::label('email', 'Email') }}
						{{ Form::email('email', '', ['class' => 'form-control required']) }}
					</div>
					<div class="form-group">
						{{ Form::submit('Register', ['class' => 'btn btn-primary']) }}
					</div>
				<?= Form::close() ?>
			</div>
		</div>
	</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
		<script>
			$('form').eq(0).validate()
			$('form').eq(1).validate()
		</script>
	</main>
	<footer >
	
		<p>WEo3<sup>&copy;</sup> 2016</p>

	</footer>
</body>
</html>