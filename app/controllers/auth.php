<?php

use App\Auth as Authentication;
use App\URL;
use App\Model\User;

class Auth extends Controller {

	// LOGIN AND REGISTER
	function login() {
		View::load('landing.php');
	}

	// LOGOUT
	function logout() {
		
		Authentication::log_out();

		URL::redirect('/');
	}

	// ATTEMPT TO LOGIN
	function attempt() {

		$user = new User();

		$user->load([
			'username' => $_POST['username'],
			'deleted' => '0'
		]);

		$verified = password_verify($_POST['password'], $user->password);

		if($verified && $user->id) {
			Authentication::log_in($user->id);
			URL::redirect('/home/'.$user->id);
		} else {
			URL::redirect('/');
		}
		
	}

}