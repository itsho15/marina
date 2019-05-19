<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remittance extends Model {

	protected $table    = 'remittances';
	protected $fillable = ['sender_name', 'relative_relation', 'bank_name', 'account_number', 'sender_phone', 'order_id'];
	public $timestamps  = true;

}