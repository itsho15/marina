<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class State extends Model {

	use Translatable;
	protected $translatable = ['name'];

	public function county() {
		return $this->hasOne('App\Models\Country', 'id', 'country_id');
	}

	public function city() {
		return $this->hasOne('App\Models\City', 'id', 'city_id');
	}

}