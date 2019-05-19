<?php

namespace App\Http\Controllers;
use abdullahobaid\mobilywslaraval\Mobily;
use App\Models\Order;
use Carbon\Carbon;
use Validator;

class BookingCompaniesController extends Controller {
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

	public function step1() {
		$this->validate(request(), [
			'company_type'               => 'required',
			'company_name'               => 'required|string',
			'commercial_registration_no' => 'required|integer',
			'company_owner_name'         => 'required|string',
			'registration_id_number'     => 'required|integer',
			'director_name'              => 'required|string',
		], [], [
			'company_type'               => trans('front.company_type'),
			'company_name'               => trans('front.company_name'),
			'commercial_registration_no' => trans('front.commercial_registration_no'),
			'company_owner_name'         => trans('front.company_owner_name'),
			'registration_id_number'     => trans('front.registration_id_number'),
			'director_name'              => trans('front.director_name'),
		]);

		$data                = request()->except('_token');
		$data['code_number'] = rand(100000, 999999);
		session()->put('companystep1', $data);
		return view('booking.companies.companystep2');
	}

	public function step2post() {

		$validator = Validator::make(request()->all(), [
			'country_id'    => 'required',
			'city_id'       => 'required',
			'state_id'      => 'required',
			'street_name'   => 'required',
			'hejry_date'    => 'required',
			'date'          => 'required',
			'singer_gender' => 'required',
			'start_time'    => 'required',
			'end_time'      => 'required',
			'price'         => 'required',
			'concert'       => 'required',
			'permits'       => 'required',
		]);

		if ($validator->fails()) {
			return back()->withErrors($validator);
		} else {
			$data = request()->except('_token');
			session()->put('companystep2', $data);
			return redirect('booking/marina/companies/step3');
		}

	}

	public function step3() {

		return view('booking.companies.contract');

	}

	public function step3post() {

		$validator = Validator::make(request()->all(), [
			'condition.*' => 'required',
			'condition.*' => 'accepted',
			'agree'       => 'required',
		], [
			'agree'     => trans('front.agree'),
			'condition' => trans('front.condition'),
		]);

		if ($validator->fails()) {
			return view('booking.companies.contract')->withErrors($validator);
		} else {
			return view('booking.companies.contract-view');
		}

	}

	public function finalStep() {

		$companystep1 = session('companystep1');
		$companystep2 = session('companystep2');

		$start_time = Carbon::parse($companystep2['start_time'])->format('H:i');
		$end_time   = Carbon::parse($companystep2['end_time'])->format('H:i');

		if ($companystep1 != null && $companystep2 != null) {

			$data = [
				'company_type'               => $companystep1['company_type'],
				'company_name'               => $companystep1['company_name'],
				'commercial_registration_no' => $companystep1['commercial_registration_no'],
				'company_owner_name'         => $companystep1['company_owner_name'],
				'registration_id_number'     => $companystep1['registration_id_number'],
				'director_name'              => $companystep1['director_name'],
				'code_number'                => $companystep1['code_number'],
				'hejry_date'                 => Carbon::parse($companystep2['hejry_date']),
				'date'                       => Carbon::parse($companystep2['date']),
				'start_time'                 => $start_time,
				'end_time'                   => $end_time,
				'street_name'                => $companystep2['street_name'],
				'user_id'                    => auth()->user()->id,
				'country_id'                 => $companystep2['country_id'],
				'city_id'                    => $companystep2['city_id'],
				'state_id'                   => $companystep2['state_id'],
				'concert'                    => $companystep2['concert'],
				'price'                      => $companystep2['price'],
				'order_type'                 => 'companies',
				'permits'                    => $companystep2['permits'],

			];

			if (!empty(session('singer_id'))) {
				$data['singer_id'] = session('singer_id');
			}

			if ($companystep2['singer_name_female'] != null && $companystep2['singer_gender'] == 'female') {
				$data['singer_name']          = $companystep2['singer_name_female'];
				$data['singer_name_optional'] = $companystep2['singer_name_optional_female'];
			} else {
				$data['singer_name']          = $companystep2['singer_name_male'];
				$data['singer_name_optional'] = $companystep2['singer_name_optional_male'];
			}

			$order = Order::create($data);
			// send sms to user
			$mobily  = new Mobily();
			$message = "( عميلنا العزيز سارع بسداد مبلغ العربون بقيمة  " . $companystep2['price'] / 100 * 30 . " ريال حسب العربون المختار من صفحه الإتفاقات الماليه حتى لا يتم الغاء الطلب خلال ٢٤ ساعه )";
			$mobily->send(auth()->user()->phone, $message);

			// destroy all session after save data
			session()->forget('companystep1');
			session()->forget('companystep2');
			session()->forget('singer_id');

			// redirect user to his orders
			session()->flash('success', 'your order Successfully added');
			return redirect('my-orders');

		} else {
			return redirect('/')->with('error', 'fill your data first to make order');
		}

	}

}