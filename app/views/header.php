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
	<body class="flex-col">
		<header class="flex-row flex-a-center flex-j-between">
			<a href="{{url('/home/'.App\Auth::user()->id)}}"><h1>WEo3</h1></a>

				<nav>
				<div class="flex-row">
					<div>
						<a href="<?=url('/new_contact')?>" class="btn btn-success">New Contact</a>
					</div>
					<div>
						<div class="btn-group">
							<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{ App\Auth::user()->username }}
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?=url('/user/'.App\Auth::user_id())?>">Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=url('/auth/logout')?>">Logout</a>
							</div>
						</div>
					</div>
				</div>
				
			</nav>
		</header>
		<main class="flex-1">
		


