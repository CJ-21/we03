<?php

use App\Auth;
use App\URL;
use App\Model\Contact;
use App\Model\User;
use App\Model\Phone;
use App\Input;
use App\Email;
use App\DataStore;

class Site extends Controller {

	// YOU CAN NOT ACCESS THESE PAGES UNLESS YOU ARE LOGGED IN
	function pre() {
	Auth::kickout('/');
	}

	// HOME PAGE ONCE LOGGED IN
	function view_contacts($id) {

		$user = User::find($id);

		$data = [
			'user'=> $user
		];

		View::load('header.php');
		View::load('contacts.php', $data);
		View::load('footer.php');
	}

	// CREATE A NEW CONTACT
	function create() {

		View::load('header.php');
		View::load('new_contact.php');
		View::load('footer.php');

	}

	// SAVE THE NEW CONTACT
	function save() {

		$contact = new Contact();

		$contact->first_name 				= Input::get('first_name');
		$contact->last_name 				= Input::get('last_name');
		$contact->company 					= Input::get('company');
		$contact->email 					= Input::get('email');
		$contact->additional_information 	= Input::get('additional_information');
		$contact->user_id 					= Auth::user_id();

		$contact->save();

	// ADD MULTIPLE PHONE NUMBERS TO THE CONTACT
		foreach ($_POST['phone_number'] as $num){
			$phone_number = new Phone();

			$phone_number->phone_number = $num;

			$phone_number->contact_id = $contact->id;

			$phone_number->save();
		}

		URL::redirect('/home/'.Auth::user_id());
		
	}

	// VIEW CONTACT INFORMATION
	function view($id) {

		$contact = Contact::find($id);

		$data = [
			'contact'=> $contact
		];

		View::load('header.php');
		View::load('view_contact.php', $data);
		View::load('footer.php');
	}

	// DELETE CONTACT
	function delete($id) {
		
		$contact = new Contact();

		$contact->load($id);

		$contact->delete();

		URL::redirect('/home/'.Auth::user_id());
		
	}

	// EDIT CONTACT
	function edit($id) {

		$contact = new Contact();

		$contact->load($id);

		$data = [
			'contact'=> $contact
		];

		View::load('header.php');
		View::load('edit_contact.php', $data);
		View::load('footer.php');
		
	}

	// UPDATE CONTACT WITH EDITED INFORMATION
	function update($id) {

		$contact = Contact::find($id);

		$contact->fill($_POST);

		$contact->save();

		foreach ($_POST['phone_number'] as $key => $num){
			$number_id = $_POST['ids'][$key];

			if($number_id) {
				$phone_number = Phone::find($number_id);
			} else {
				$phone_number = new Phone();

				$phone_number->contact_id = $contact->id;
			}
			

			$phone_number->phone_number = $num;

			$phone_number->save();
		}

		foreach($_POST['deletes'] as $delete_id){
			$phone = Phone::find($delete_id);

			$phone->delete();
		}

		URL::redirect('/contact/'.$id);
		
	}

	// EMAIL THE CONTACT
	function email($id) {

		$contact = new Contact();

		$contact->load($id);

		$data = [
			'contact'=> $contact
		];

		View::load('header.php');
		View::load('email_contact.php', $data);
		View::load('footer.php');

	}

	// SUBMIT THE EMAIL TO THE CONTACT
	function submit($id) {
		$contact = new Contact();

		$contact->load($id);

		$email = new Email();

		$email->to 		= $contact->email;
		$email->from 	= App\Auth::user()->email;
		$email->subject = $_POST['subject'];
		$email->message = $_POST['content'];
		$email->html 	= true;

		$email->send();

		// or 

		if($email->success) {

			DataStore::set('send', true);

			URL::redirect('/contact/'.$id);
		} else {
			echo 'Something went wrong';
		}
		
	}

	// MAKE A SEARCH
	function search_redirect() {
		App\URL::redirect('/search/'.$_POST['term']);
	}

	// SEARCH RESULTS
	function search($term) {

		$user = User::find($id);

		$db = new App\Database(App\Config::$database);

		$q = 'SELECT * FROM contacts WHERE deleted="0" AND user_id="'.App\Auth::user()->id.'" AND (';
		$q .= 'first_name LIKE "%' . $db->escape($term) . '%" ';
		$q .= 'OR last_name LIKE "%' . $db->escape($term) . '%" ';
		$q .= 'OR company LIKE "%' . $db->escape($term) . '%" ';
		$q .= 'OR email LIKE "%' . $db->escape($term) . '%" ';

		$q .= ')';

		$contacts = $db->model('App\Model\Contact')->query($q);

		$data['contacts'] = $contacts;
		$data['term'] = $term;

		View::load('header');
		View::load('search_results', $data);
		View::load('footer');
	}

}