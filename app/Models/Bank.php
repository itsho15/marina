<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Bank extends Model {
	use Translatable;
	protected $translatable = ['bank_name'];
}
