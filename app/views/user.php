

<div class="container">

<h2><i>Your profile</i></h2>

<br>
	

	<div class="profile">
		<p><b>First name:</b> <?= $user->first_name ?></p>
		<p><b>Last name:</b> <?= $user->last_name ?></p>
		<p><b>Username:</b> <?= $user->username ?></p>
		<p><b>Password:</b> **********</p>
		<p><b>Email Address:</b> <?= $user->email ?></p>

		<a href="<?=url('/user/'.$user->id.'/edit')?>">
			<button type="button" class="btn btn-info">Edit</button>
		</a>

		<a href="<?=url('/user/'.$user->id.'/delete')?>">
			<button type="button" class="btn btn-danger" id="delete-btn">Delete profile</button>
		</a>
	</div>

	
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<script>
	
	$('#delete-btn').on('click', function(event) {
		var confirmed = confirm('Are you sure you want to delete this profile?')

		if(!confirmed) {
			event.preventDefault()
		}
	})

</script>