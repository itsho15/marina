<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroomsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('grooms', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('identity')->nullable();
			$table->date('birthday')->nullable();
			$table->string('phone')->nullable();
			$table->integer('order_id')->unsigned();
			$table->foreign('order_id')->references('id')->on('orders')
				->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('grooms');
	}
}
