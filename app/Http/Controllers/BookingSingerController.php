<?php

namespace App\Http\Controllers;
use abdullahobaid\mobilywslaraval\Mobily;
use App\Models\Bank;
use App\Models\Order;
use App\Models\Remittance;
use App\User;
use Carbon\Carbon;
use Validator;

class BookingSingerController extends Controller {
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
	public function index($gender) {
		// get all singers
		$singers = User::whereHas('roles', function ($q) {
			$q->whereIn('name', ['singer']);
		})->get();

		return view('booking.singer.index', compact('gender', 'singers'));
	}

	public function music() {
		return view('booking.singer.music');
	}

	public function no_music() {
		return view('booking.singer.no_music');
	}

	public function contract_view() {
		return view('booking.singer.contract-view');
	}

	public function book_singer() {
		session()->put('singer_id', request('singer_id'));
		return redirect('show/singer/' . request('singer_id'));
	}

	public function show_singer($id) {
		$singer = User::whereId($id)->first();
		return view('booking.singer.show', compact('singer'));
	}

	public function choose($id) {
		$singer = User::whereId($id)->first();
		return view('booking.singer.choose', compact('singer'));
	}

	public function booking() {
		return view('booking.singer.choose_compOrPerson');
	}

	public function persons() {
		return view('booking.singer.persons');
	}

	public function step1() {

		$this->validate(request(), [
			'occasion_id'     => 'required|integer',
			'number_bridal'   => 'required|string',
			'name_bridal'     => 'required|string',
			'identity'        => 'required',
			'birthday'        => 'required',
			'nationalty'      => 'required|string',
			'identity_source' => 'required|string',
			'email_address'   => 'required|email',
			'phone_bridal'    => 'required',
			'carol_type'      => 'required',
			'hejry_date'      => 'required',
			'date'            => 'required',
			'hotel_name'      => 'required|string',
			'start_time'      => 'required',
			'end_time'        => 'required',
			'street_name'     => 'required|string',
			'hall_id'         => 'integer',
			'identity_image'  => 'required',
			'country_id'      => 'required|integer',
			'city_id'         => 'required|integer',
			'state_id'        => 'required|integer',
		], [], [
			'occasion_id'     => trans('front.location_occasion'),
			'number_bridal'   => trans('front.number_bridal'),
			'name_bridal'     => trans('front.name_bridal'),
			'identity'        => trans('front.identity'),
			'birthday'        => trans('front.birthday'),
			'nationalty'      => trans('front.nationalty'),
			'identity_source' => trans('front.identity_source'),
			'email_address'   => trans('front.email_address'),
			'phone_bridal'    => trans('front.phone_bridal'),
			'carol_type'      => trans('front.carol_type'),
			'hejry_date'      => trans('front.hejry_date'),
			'date'            => trans('front.date'),
			'hotel_name'      => trans('front.hotel_name'),
			'start_time'      => trans('front.start_time'),
			'end_time'        => trans('front.end_time'),
			'street_name'     => trans('front.street_name'),
			'hall_id'         => trans('front.halls'),
			'identity_image'  => trans('front.identity_image'),
			'country_id'      => trans('front.country'),
			'city_id'         => trans('front.city'),
			'state_id'        => trans('front.state'),
		]);

		$data                = request()->except('identity_image');
		$data['code_number'] = rand(100000, 999999);

		$image                  = request()->file('identity_image')->store('identity');
		$data['identity_image'] = $image;
		session()->put('order_data', $data);
		return view('booking.singer.contract');
	}

	public function step2() {

		$validator = Validator::make(request()->all(), [
			'condition.*' => 'required',
			'condition.*' => 'accepted',
			'agree'       => 'required',
		]);

		if ($validator->fails()) {
			return view('booking.singer.contract')->withErrors($validator);
		} else {
			return view('booking.singer.party');
		}

	}

	public function step3() {
		$validator = Validator::make(request()->all(), [
			'machine' => 'sometimes|nullable',
			'rhythms' => 'sometimes|nullable',
		], [
			'machine' => trans('front.machine'),
			'rhythms' => trans('front.rhythms'),
		]);

		session()->put('machine', request('machine'));
		session()->put('rhythms', request('rhythms'));

		if ($validator->fails()) {
			return back()->withErrors($validator);
		} else {
			return view('booking.singer.agreements');
		}
	}

	public function step4() {

		$validator = Validator::make(request()->all(), [
			'number_of_hits' => 'required',
			'deposit'        => 'required',
		], [
			'deposit'        => trans('front.deposit'),
			'number_of_hits' => trans('front.number_of_hits'),
		]);

		$agreements = request()->except(['number_ribbons', '_token']);

		if (request('agree') == 'on') {
			$agreements['number_ribbons'] = request('number_ribbons');
		}

		session()->put('agreements', $agreements);

		if ($validator->fails()) {
			return back()->withErrors($validator);
		} else {
			return view('booking.singer.conversions');
		}
	}

	public function step5() {
		// first check if request has code or not

		if (request('sender_code')) {

			$validator = Validator::make(request()->all(), [
				'sender_code' => 'required',
			], [
				'sender_code' => trans('front.sender_code'),
			]);

			if (request('sender_code') == session('user_data')['code']) {

				//session()->forget('user_data');

				if ($validator->fails()) {
					return back()->withErrors($validator);
				} else {
					return view('booking.singer.contacts');
				}

			} else {
				session()->flash('error', trans('user.invalid_code'));
				return view('booking.singer.code_verfiy');
			}

		} else {
			// if request havn't request_code that mean user still typing his info so make a sms to verfiy phone

			$validator = Validator::make(request()->all(), [
				'sender_name'       => 'required',
				'relative_relation' => 'required',
				'bank_name'         => 'required',
				'account_number'    => 'required',
				'sender_phone'      => 'required',
			]);

			if ($validator->fails()) {
				return back()->withErrors($validator);
			} else {
				session()->put('Remittances', request()->all());
				$data         = request()->all();
				$data['code'] = rand(1000, 9999); //generate random code

				$mobily = new Mobily();

				$mobily->send(request('sender_phone'), 'Your code is : ' . $data['code']);

				if ($mobily) {
					session(['user_data' => $data]);
					return view('booking.singer.code_verfiy')->with('userdata', session('user_data'));
				} else {
					return $mobily;
				}

			}

		}

	}

	public function step6() {

		$validator = Validator::make(request()->all(), [
			'contact_name'     => 'required',
			'contact_phone'    => 'required',
			'contact_relation' => 'required',
		]);

		if ($validator->fails()) {
			return back()->withErrors($validator);
		} else {
			session()->put('contacts', request()->except('_token'));
			$banks = Bank::paginate(4);
			return view('booking.singer.bank', compact('banks'));
		}
	}

	public function finalStep() {

		$order_data  = session('order_data');
		$agreements  = session('agreements');
		$Remittances = session('Remittances');
		$contacts    = session('contacts');

		$start_time = Carbon::parse($order_data['start_time'])->format('H:i');
		$end_time   = Carbon::parse($order_data['end_time'])->format('H:i');

		if ($order_data != null) {

			$data = [
				'occasion_id'     => $order_data['occasion_id'],
				'number_bridal'   => $order_data['number_bridal'],
				'name_bridal'     => $order_data['name_bridal'],
				'identity'        => $order_data['identity'],
				'birthday'        => Carbon::parse($order_data['birthday']),
				'nationalty'      => $order_data['nationalty'],
				'identity_source' => $order_data['identity_source'],
				'email_address'   => $order_data['email_address'],
				'phone_bridal'    => $order_data['phone_bridal'],
				'carol_type'      => $order_data['carol_type'],
				'hejry_date'      => Carbon::parse($order_data['hejry_date']),
				'date'            => Carbon::parse($order_data['date']),
				'start_time'      => $start_time,
				'end_time'        => $end_time,
				'hotel_name'      => $order_data['hotel_name'],
				'street_name'     => $order_data['street_name'],
				'hall_id'         => $order_data['hall_id'],
				'user_id'         => auth()->user()->id,
				'country_id'      => $order_data['country_id'],
				'city_id'         => $order_data['city_id'],
				'state_id'        => $order_data['state_id'],
				'identity_image'  => $order_data['identity_image'],
				'singer_gender'   => $order_data['singer_gender'],
				'code_number'     => $order_data['code_number'],
				'machines'        => session('machine'),
				'rhythms'         => session('rhythms'),
				'price'           => $agreements['price'],
				'agreements'      => $agreements,
				'contacts'        => $contacts,
				'singer_id'       => session('singer_id'),

			];

			if ($order_data['singer_name_female'] != null && $order_data['singer_gender'] == 'female') {
				$data['singer_name']          = $order_data['singer_name_female'];
				$data['singer_name_optional'] = $order_data['singer_name_optional_female'];
			} else {
				$data['singer_name']          = $order_data['singer_name_male'];
				$data['singer_name_optional'] = $order_data['singer_name_optional_male'];
			}

			$order                   = Order::create($data);
			$Remittances['order_id'] = $order->id;

			// store remittances
			Remittance::create($Remittances);
			// send sms to user
			$mobily  = new Mobily();
			$message = "( عميلنا العزيز سارع بسداد مبلغ العربون بقيمة  " . $agreements['deposit'] . " ريال حسب العربون المختار من صفحه الإتفاقات الماليه حتى لا يتم الغاء الطلب خلال ٢٤ ساعه )";
			$mobily->send(auth()->user()->phone, $message);

			// destroy all session after save data
			session()->forget('order_data');
			session()->forget('machine');
			session()->forget('rhythms');
			session()->forget('agreements');
			session()->forget('Remittances');
			session()->forget('contacts');
			session()->forget('singer_id');

			// redirect user to his orders
			session()->flash('success', 'your order Successfully added');
			return redirect('my-orders');

		} else {
			return redirect('/')->with('error', 'fill your data first to make order');
		}

	}

}