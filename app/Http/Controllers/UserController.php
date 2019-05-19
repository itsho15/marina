<?php

namespace App\Http\Controllers;

class UserController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {

	}
	/**
	 * Show the application user Orders.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function myorders() {
		return view('user/orders');
	}
}
