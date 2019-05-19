<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::group(['prefix' => 'admin'], function () {
	Voyager::routes();
});

Auth::routes();

Route::get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
 ****	you Can find All Routes in this path : App\Http\helper.php
|--------------------------------------------------------------------------
 */

PersonsRoute();
CompaniesRoutes();
SingerRoutes();

Route::post('contract/find', 'OrdersController@find');
// addGroom
Route::get('addGroom/{code_number}', 'OrdersController@addGroom');
Route::post('addGroom/{code_number}', 'OrdersController@addGroomPost');
// delay
Route::get('delay/{code_number}', 'OrdersController@delay');
Route::post('delay/{code_number}', 'OrdersController@delayPost');

// close
Route::get('close/{code_number}', 'OrdersController@close');
Route::post('close/{code_number}', 'OrdersController@closePost');

// close
Route::get('cancel/{code_number}', 'OrdersController@cancel');
Route::post('cancel/{code_number}', 'OrdersController@cancelPost');

// print
Route::get('contract/print', 'OrdersController@print');
Route::post('contract/print', 'OrdersController@printPost');
Route::get('contract/print/{code_number}', 'OrdersController@printShow');

Route::resource('contract', 'OrdersController');

Route::get('/my-orders', 'UserController@myorders');

// change lang back-end and front-end
Route::get('lang/{lang}', function ($lang) {
	session()->has('lang') ? session()->forget('lang') : '';
	$lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
	return back();
});
