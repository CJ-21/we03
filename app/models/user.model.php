<?php

namespace App\Model;

class User extends Model {

	public function contacts() {
		return $this->hasMany('Contact');
	}
	
}