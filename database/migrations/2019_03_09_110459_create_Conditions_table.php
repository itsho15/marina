<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConditionsTable extends Migration {

	public function up()
	{
		Schema::create('Conditions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('condition', 191);
		});
	}

	public function down()
	{
		Schema::drop('Conditions');
	}
}