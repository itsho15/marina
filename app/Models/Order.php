<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $fillable = [
		'number_bridal', 'name_bridal', 'identity', 'birthday', 'nationalty', 'identity_source', 'identity_image', 'email_address', 'phone_bridal', 'singer_gender', 'singer_name', 'singer_name_optional', 'code_number', 'carol_type', 'hejry_date', 'date', 'hotel_name', 'start_time', 'end_time', 'street_name', 'company_type', 'company_name', 'commercial_registration_no', 'company_owner_name', 'registration_id_number', 'director_name', 'price', 'concert', 'order_type', 'hall_id', 'user_id', 'country_id', 'city_id', 'state_id', 'tune_id', 'occasion_id', 'rhythms', 'machines', 'contacts', 'agreements', 'approved', 'singer_id', 'prmits', 'reason_of_edit', 'new_date', 'closed', 'canceled',
	];

	protected $casts = [
		'rhythms'    => 'array',
		'machines'   => 'array',
		'agreements' => 'array',
		'contacts'   => 'array',
	];

	public function scopeCurrentSinger($query) {

		if (request('new_date')) {
			$query->where('new_date', '!=', null);
		}

		if (request('closed')) {
			$query->where('closed', '!=', null);
		}

		if (request('canceled')) {
			$query->where('canceled', '!=', null);
		}

		if (auth()->user()->hasRole('singer')) {
			return $query->where('singer_id', auth()->user()->id);
		} elseif (auth()->user()->hasRole('moderator')) {
			return $query->where('singer_id', auth()->user()->singer_id);
		} else {
			return $query;
		}

	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}