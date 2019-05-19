<?php

namespace App\Http\Controllers;

use App\Models\Grooms;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;

class OrdersController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index() {

		if (session('singer_id')) {
			$singer = User::whereId(session('singer_id'))->first();
		} else {
			$singer = null;
		}

		return view('contract.index', compact('singer'));
	}

	/**
	 * find the order
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function find() {
		$order = Order::where('approved', 1)->where('code_number', request('code_number'))->first();

		if ($order) {
			return redirect('contract/' . $order->code_number);
		} else {
			return back()->with('error', 'contract number is not found please check it or contact the support');
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $code_number
	 * @return \Illuminate\Http\Response
	 */
	public function show($code_number) {

		$order = Order::where('approved', 1)->where('code_number', $code_number)->first();

		if ($order) {
			if ($order->singer_id != null) {
				$singer = User::whereId($order->singer_id)->first();
			}
			return view('contract.show', compact('order', 'singer'));
		} else {
			return view('errors.not_found');
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $code_number
	 * @return \Illuminate\Http\Response
	 */
	public function addGroom($code_number) {
		$order = Order::where('approved', 1)->where('code_number', $code_number)->first();

		if ($order->singer_id != null) {
			$singer = User::whereId($order->singer_id)->first();
		}

		return view('contract.addGroom', compact('code_number', 'singer'));
	}

	public function addGroomPost($code_number) {

		$data = $this->validate(request(), [
			'name'     => 'required|string',
			'identity' => 'required|integer',
			'birthday' => 'required|date',
			'phone'    => 'required|integer',

		], [], [
			'name'     => trans('front.name_bridal'),
			'identity' => trans('front.identity'),
			'birthday' => trans('front.birthday'),
			'phone'    => trans('front.mobile'),

		]);
		$order = Order::where('approved', 1)->where('code_number', $code_number)->first();

		$data['order_id'] = $order->id;
		Grooms::create($data);
		session()->flash('info', trans('front.groom_added_success'));
		return redirect('contract/' . $code_number);
	}

	/**
	 * delay of joy
	 *
	 * @param  int  $code_number
	 * @return \Illuminate\Http\Response
	 */
	public function delay($code_number) {
		$order = Order::where('approved', 1)->where('code_number', $code_number)->first();

		return view('contract.delay', compact('order', 'code_number'));
	}

	public function delayPost($code_number) {
		$data = $this->validate(request(), [
			'reason_of_edit' => 'required|string',
			'new_date'       => 'required|date',

		], [], [
			'reason_of_edit' => trans('front.reason_of_edit'),
			'new_date'       => trans('front.new_date'),
		]);

		Order::where('code_number', $code_number)->update($data);
		session()->flash('info', trans('front.delay_success'));
		return redirect('contract/' . $code_number);
	}

	/**
	 * close of joy
	 *
	 * @param  int  $code_number
	 * @return \Illuminate\Http\Response
	 */
	public function close($code_number) {
		$order = Order::where('approved', 1)->where('code_number', $code_number)->first();

		return view('contract.close', compact('order', 'code_number'));
	}

	public function closePost($code_number) {

		Order::where('code_number', $code_number)->update(['closed' => 1]);
		session()->flash('info', trans('front.closed_success'));
		return redirect('contract/' . $code_number);
	}

	/**
	 * cancel of joy
	 *
	 * @param  int  $code_number
	 * @return \Illuminate\Http\Response
	 */
	public function cancel($code_number) {
		$order = Order::where('approved', 1)->where('code_number', $code_number)->first();

		return view('contract.cancel', compact('order', 'code_number'));
	}

	public function cancelPost($code_number) {
		$data = $this->validate(request(), [
			'reason_of_edit' => 'required|string',
			'attach_proof'   => 'required|image',

		], [], [
			'reason_of_edit' => trans('front.reason_of_edit'),
			'attach_proof'   => trans('front.attach_proof'),
		]);

		$image                = request()->file('attach_proof')->store('canceled_attached');
		$data['attach_proof'] = $image;

		Order::where('code_number', $code_number)->update(['canceled' => 1]);
		session()->flash('info', trans('front.canceled_message'));
		return redirect('contract/' . $code_number);
	}

	/**
	 * cancel of joy
	 *
	 * @param  int  $code_number
	 * @return \Illuminate\Http\Response
	 */
	public function print() {
		if (session('singer_id')) {
			$singer = User::whereId(session('singer_id'))->first();
		} else {
			$singer = null;
		}

		return view('contract.print', compact('singer'));
	}

	public function printPost() {
		$order = Order::where('approved', 1)->where('code_number', request('code_number'))->first();

		if ($order) {
			return redirect('contract/print/' . $order->code_number);
		} else {
			return back()->with('error', 'contract number is not found please check it or contact the support');
		}
	}

	public function printShow($code_number) {
		$order = Order::where('approved', 1)->where('code_number', $code_number)->first();

		if ($order) {
			if ($order->singer_id != null) {
				$singer = User::whereId($order->singer_id)->first();
			}
			return view('contract.printShow', compact('order', 'singer'));
		} else {
			return view('errors.not_found');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		Grooms::create([]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
