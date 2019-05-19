<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class City extends Model {

	use Translatable;
	protected $translatable = ['name'];

	protected $fillable = [
		'name',
		'country_id',
	];

	public function country() {
		return $this->hasOne('App\Models\Country', 'id', 'country_id');
	}

}