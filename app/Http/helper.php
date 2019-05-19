<?php
if (!function_exists('lang')) {
	function lang() {
		if (session('lang') == 'ar') {
			\Config::set('voyager.multilingual.rtl', true);
		} else {
			\Config::set('voyager.multilingual.rtl', false);
		}
		if (session()->has('lang')) {
			return session('lang');
		} else {
			if (auth()->check() && empty(session('lang'))) {
				\Config::set('voyager.multilingual.rtl', true);
				session()->put('lang', 'ar');
				return session('lang');
			}
		}
	}
}

if (!function_exists('Occasions')) {
	function Occasions() {
		return \App\Models\Occasion::orderBy('id', 'desc')->get();
	}
}

if (!function_exists('countries')) {
	function countries() {
		return \App\Models\Country::orderBy('id', 'desc')->get();
	}
}

if (!function_exists('cities')) {
	function cities() {
		return \App\Models\City::get();
	}
}

if (!function_exists('states')) {
	function states() {
		return \App\Models\State::get();
	}
}

if (!function_exists('halls')) {
	function halls() {
		return \App\Models\Halls::get();
	}
}

if (!function_exists('conditions')) {
	function conditions() {
		return \App\Models\Condition::get();
	}
}

if (!function_exists('Machines')) {
	function Machines() {
		return \App\Models\Machine::get();
	}
}

if (!function_exists('Rhythms')) {
	function Rhythms() {
		return \App\Models\Rhythms::get();
	}
}

if (!function_exists('prices')) {
	function prices() {
		return \App\Models\Price::get();
	}
}

if (!function_exists('orderdata')) {
	function orderdata($key) {
		if (!empty(session('order_data')[$key])) {
			return session('order_data')[$key];
		} else {
			return old($key);
		}
	}
}

if (!function_exists('companystep1')) {
	function companystep1($key) {
		if (!empty(session('companystep1')[$key])) {
			return session('companystep1')[$key];
		} else {
			return old($key);
		}
	}
}

if (!function_exists('companystep2')) {
	function companystep2($key) {
		if (!empty(session('companystep2')[$key])) {
			return session('companystep2')[$key];
		} else {
			return old($key);
		}
	}
}

if (!function_exists('machine_session')) {
	function machine_session($key) {
		if (!empty(session('machine')[$key])) {
			return session('machine')[$key];
		} else {
			return null;
		}
	}
}
if (!function_exists('rhythms_session')) {
	function rhythms_session($key) {
		if (!empty(session('rhythms')[$key])) {
			return session('rhythms')[$key];
		} else {
			return null;
		}
	}
}

if (!function_exists('agreements')) {
	function agreements($key) {
		if (!empty(session('agreements')[$key])) {
			return session('agreements')[$key];
		} else {
			return null;
		}
	}
}
if (!function_exists('Remittances')) {
	function Remittances($key) {
		if (!empty(session('Remittances')[$key])) {
			return session('Remittances')[$key];
		} else {
			return null;
		}
	}
}

if (!function_exists('contacts')) {
	function contacts($key) {
		if (!empty(session('contacts'))) {
			return session('contacts')[$key];
		} else {
			return null;
		}
	}
}

if (!function_exists('GetModelbyName')) {
	function GetModelbyName($model, $id) {
		if ($model::whereId($id)->first()) {
			return $model::whereId($id)->first()->getTranslatedAttribute('name', session('lang'));
		}
	}
}
/*
get last order id
 */

if (!function_exists('getLastOrder')) {
	function getLastOrder() {
		$lastid = \App\Models\Order::latest()->first();
		return $lastid->id + 1;
	}
}

/////// Validate Helper Functions ///////
if (!function_exists('v_image')) {
	function v_image($ext = null) {
		if ($ext === null) {
			return 'image|mimes:jpg,jpeg,png,gif,bmp';
		} else {
			return 'image|mimes:' . $ext;
		}

	}
}

if (!function_exists('PersonsRoute')) {
	function PersonsRoute() {
		Route::get('/booking/marina/{name?}', 'BookingController@index');
		Route::post('/booking/marina/persons', 'BookingController@step1');
		Route::post('/step2', 'BookingController@step2');
		Route::get('/music', 'BookingController@music');
		Route::get('/no_music', 'BookingController@no_music');
		Route::get('/music_no_music', 'BookingController@music_no_music');
		Route::post('/contract_view', 'BookingController@contract_view');
		Route::post('/step3', 'BookingController@step3');
		Route::post('/step4', 'BookingController@step4');
		Route::post('/step5', 'BookingController@step5');
		Route::post('/step6', 'BookingController@step6');
		Route::post('/finalStep', 'BookingController@finalStep');
	}
}

if (!function_exists('CompaniesRoutes')) {
	function CompaniesRoutes() {
		Route::post('/booking/marina/companies', 'BookingCompaniesController@step1');
		Route::post('/booking/marina/companies/step2', 'BookingCompaniesController@step2post');
		Route::get('/booking/marina/companies/step3', 'BookingCompaniesController@step3');
		Route::post('/booking/marina/companies/step3', 'BookingCompaniesController@step3post');
		Route::post('/booking/marina/companies/finalStep', 'BookingCompaniesController@finalStep');
	}
}

if (!function_exists('SingerRoutes')) {
	function SingerRoutes() {
		//booking from personal singer
		Route::get('booking/singer_personal/{gender?}', 'BookingSingerController@index');
		Route::post('show/singer/', 'BookingSingerController@book_singer');
		Route::get('show/singer/{singer_id}', 'BookingSingerController@show_singer');
		Route::get('singer/choose/{singer_id}', 'BookingSingerController@choose');

		Route::get('singer/booking', 'BookingSingerController@booking');

		Route::get('singer/persons', 'BookingSingerController@persons');

		Route::post('booking/singer/step1', 'BookingSingerController@step1');

		Route::post('singer/step2', 'BookingSingerController@step2');
		Route::get('singer/music', 'BookingSingerController@music');
		Route::get('singer/no_music', 'BookingSingerController@no_music');
		Route::get('singer/music_no_music', 'BookingSingerController@music_no_music');
		Route::post('singer/contract_view', 'BookingSingerController@contract_view');
		Route::post('singer/step3', 'BookingSingerController@step3');
		Route::post('singer/step4', 'BookingSingerController@step4');
		Route::post('singer/step5', 'BookingSingerController@step5');
		Route::post('singer/step6', 'BookingSingerController@step6');
		Route::post('singer/finalStep', 'BookingSingerController@finalStep');
	}
}
