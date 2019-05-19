<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricesTable extends Migration {

	public function up()
	{
		Schema::create('prices', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('price', 191);
		});
	}

	public function down()
	{
		Schema::drop('prices');
	}
}