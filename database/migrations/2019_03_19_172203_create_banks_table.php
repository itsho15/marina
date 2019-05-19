<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('banks', function (Blueprint $table) {
			$table->increments('id');
			$table->string('bank_name');
			$table->string('image')->nullable();
			$table->string('account_number');
			$table->string('account_number_with');
			$table->string('name_of_owner');
			$table->string('number_of_owner');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('banks');
	}
}
