<?php

namespace App\Providers;

use App\ArrayField;
use App\HejryDateCustomfield;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {

	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		Voyager::addFormField(ArrayField::class);
		Voyager::addFormField(HejryDateCustomfield::class);
		Schema::defaultStringLength(191);
		Schema::enableForeignKeyConstraints();
	}
}
