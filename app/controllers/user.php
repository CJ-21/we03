<?php

use App\Model\User as User_Model;
use App\Auth;
use App\URL;

class User extends Controller {

	// REGISTER A USER
	function create() {
		
		View::load('landing.php');
	}

	// SAVE THE NEWLY REGISTERED USER
	function save($id) {

		$user = new User_Model();

		$user->fill($_POST);

		$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		$user->save();

		Auth::log_in($user->id);

		URL::redirect('/home/'.$user->id);
		
	}

	// VIEW THE REGISTERED USER'S PROFILE
	function view($id) {
		Auth::kickout('/');

		$user = new User_Model();

		$user->load($id);

		$data = [
			'user'=> $user
		];

		View::load('header.php');
		View::load('user.php', $data);
		View::load('footer.php');
		
	}

	// EDIT THE USER PROFILE
	function edit($id) {
		Auth::kickout('/');

		$user = new User_Model();

		$user->load($id);

		$data = [
			'user'=> $user,
			'phone_numbers'=> $phone_number
		];

		View::load('header.php');
		View::load('edit_user.php', $data);
		View::load('footer.php');
	}

	// UPDATE THE USER PROFILE
	function update($id) {
		Auth::kickout('/');

		$user = new User_model();

		$user->load($id);

		$user->fill($_POST);

		$user->save();

		URL::redirect('/user/'.$user->id);
	}

	// DELETE THE USER
	function delete($id){
		Auth::kickout('/');
		
		$user = new User_Model();

		$user->load($id);

		$user->delete();

		URL::redirect('/');
	}

}