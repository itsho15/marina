<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('contact_name', 191);
			$table->string('contact_phone', 191);
			$table->string('contact_relation', 191);
			$table->integer('order_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}