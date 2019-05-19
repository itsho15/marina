<?php

namespace App\Http\Controllers\Auth;

use abdullahobaid\mobilywslaraval\Mobily;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	//protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'name'      => ['required', 'string', 'max:255'],
			'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password'  => ['required', 'string', 'min:6', 'confirmed'],
			'phone'     => ['required', 'integer'],
			'checkmark' => ['required'],
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function register() {

		if (request('code')) {

			if (request('code') == session('user_data')['code']) {

				$user = User::create([
					'name'     => session('user_data')['name'],
					'email'    => session('user_data')['email'],
					'phone'    => session('user_data')['phone'],
					'password' => bcrypt(session('user_data')['password']),
				]);

				session()->forget('user_data');
				auth()->login($user);
				return redirect('/')->with('success', trans('user.register_complate'));

			} else {
				session()->flash('error', trans('user.invalid_code'));
				return view('auth.code_verfiy');
			}

		} else {

			$data         = request()->all();
			$data['code'] = rand(1000, 9999); //generate random code

			$mobily = new Mobily();

			$mobily->send(request('sender_phone'), 'Your code is : ' . $data['code']);

			if ($mobily) {
				session(['user_data' => $data]);
				return view('booking.code_verfiy')->with('userdata', session('user_data'));
			} else {
				return $mobily;
			}
			/*
				Nexmo::message()->send([
					'type' => 'unicode',
					'to'   => request('phone'),
					'from' => 'hisham',
					'text' => 'Your code is : ' . $data['code'],
			*/

			session(['user_data' => $data]);
			return view('auth.code_verfiy')->with('userdata', session('user_data'));

		}

	}

}
