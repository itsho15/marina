<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRemittancesTable extends Migration {

	public function up() {
		Schema::create('Remittances', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('sender_name', 191);
			$table->string('relative_relation', 191);
			$table->string('bank_name', 191);
			$table->string('account_number', 191);
			$table->string('sender_phone', 191);
			$table->integer('order_id')->unsigned();
		});
	}

	public function down() {
		Schema::drop('Remittances');
	}
}