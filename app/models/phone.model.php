<?php

namespace App\Model;

class Phone extends Model {
	public $table = 'phone_numbers';

	public function contacts() {
		return $this->belongsTo('Contact', 'contact_id');
	}
}