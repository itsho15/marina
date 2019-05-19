<?php

namespace App;

use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function scopeCurrentUser($query) {

		if (auth()->user()->hasRole('singer')) {
			return $query->where('role_id', 5)->where('singer_id', auth()->user()->id);
		} else {
			return $query;
		}

	}

	public function save(array $options = []) {
		if (auth()->user()->hasRole('singer')) {
			$this->singer_id = auth()->user()->id;
			$this->role_id   = 5; // 5 is the modrator role
			parent::save();
		} else {
			parent::save();
		}
	}

	public function roles() {
		return $this->belongsTo('\TCG\Voyager\Models\Role', 'role_id', 'id');
	}

}
