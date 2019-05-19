<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up() {
		Schema::create('orders', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('number_bridal')->nullable();
			$table->string('name_bridal')->nullable();
			$table->string('identity')->nullable();
			$table->string('birthday')->nullable();
			$table->string('nationalty')->nullable();
			$table->string('identity_source')->nullable();
			$table->string('identity_image')->nullable();
			$table->string('email_address')->nullable();
			$table->string('phone_bridal')->nullable();
			$table->string('singer_gender')->nullable();
			$table->string('singer_name')->nullable();
			$table->string('singer_name_optional')->nullable();
			$table->string('carol_type')->nullable();
			$table->string('hejry_date')->nullable();
			$table->string('date')->nullable();
			$table->string('hotel_name')->nullable();
			$table->string('start_time')->nullable();
			$table->string('end_time')->nullable();
			$table->string('street_name')->nullable();
			$table->string('code_number')->nullable();
			$table->string('concert')->nullable();
			$table->string('company_type')->nullable();
			$table->string('company_name')->nullable();
			$table->string('commercial_registration_no')->nullable();
			$table->string('company_owner_name')->nullable();
			$table->string('registration_id_number')->nullable();
			$table->string('director_name')->nullable();
			$table->string('permits')->nullable();
			$table->string('price');
			$table->text('reason_of_edit')->nullable();
			$table->date('new_date')->nullable();
			$table->string('attach_proof')->nullable();
			$table->enum('order_type', ['personal', 'companies'])->default('personal');
			$table->json('machines')->nullable();
			$table->json('rhythms')->nullable();
			$table->json('agreements')->nullable();
			$table->json('contacts')->nullable();
			$table->integer('hall_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('country_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->integer('state_id')->unsigned();
			$table->integer('tune_id')->unsigned();
			$table->integer('occasion_id')->unsigned();
			$table->integer('singer_id')->unsigned();
			$table->integer('approved')->nullable();
			$table->integer('canceled')->nullable();
			$table->integer('closed')->nullable();
		});
	}

	public function down() {
		Schema::drop('orders');
	}
}