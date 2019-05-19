<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up() {

		Schema::table('orders', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('cascade');

		});
		Schema::table('orders', function (Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries')
				->onDelete('cascade');

		});
		Schema::table('orders', function (Blueprint $table) {
			$table->foreign('occasion_id')->references('id')->on('Remittances')
				->onDelete('cascade');

		});
		Schema::table('orders', function (Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
				->onDelete('cascade');

		});
		Schema::table('orders', function (Blueprint $table) {
			$table->foreign('state_id')->references('id')->on('states')
				->onDelete('cascade');

		});
		Schema::table('orders', function (Blueprint $table) {
			$table->foreign('tune_id')->references('id')->on('tunes')
				->onDelete('cascade');

		});
		Schema::table('cities', function (Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries')
				->onDelete('cascade');

		});
		Schema::table('states', function (Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries')
				->onDelete('cascade');

		});
		Schema::table('states', function (Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
				->onDelete('cascade');

		});
		Schema::table('Remittances', function (Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
				->onDelete('cascade');

		});
		Schema::table('contacts', function (Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
				->onDelete('cascade');

		});
	}

	public function down() {

		Schema::table('orders', function (Blueprint $table) {
			$table->dropForeign('orders_user_id_foreign');
		});
		Schema::table('orders', function (Blueprint $table) {
			$table->dropForeign('orders_country_id_foreign');
		});
		Schema::table('orders', function (Blueprint $table) {
			$table->dropForeign('orders_city_id_foreign');
		});
		Schema::table('orders', function (Blueprint $table) {
			$table->dropForeign('orders_state_id_foreign');
		});
		Schema::table('orders', function (Blueprint $table) {
			$table->dropForeign('orders_tune_id_foreign');
		});
		Schema::table('cities', function (Blueprint $table) {
			$table->dropForeign('cities_country_id_foreign');
		});
		Schema::table('states', function (Blueprint $table) {
			$table->dropForeign('states_country_id_foreign');
		});
		Schema::table('states', function (Blueprint $table) {
			$table->dropForeign('states_city_id_foreign');
		});
		Schema::table('Remittances', function (Blueprint $table) {
			$table->dropForeign('Remittances_order_id_foreign');
		});
		Schema::table('contacts', function (Blueprint $table) {
			$table->dropForeign('contacts_order_id_foreign');
		});
	}
}