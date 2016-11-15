<?php

namespace App\Model;

class Contact extends Model {

	public function user() {
		return $this->belongsTo('User');
	}

	public function phones() {
		return $this->hasMany('Phone');
	}

}