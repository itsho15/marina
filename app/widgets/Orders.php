<?php

namespace App\Widgets;

use App\Models\Order;
use TCG\Voyager\Widgets\BaseDimmer;

class Orders extends BaseDimmer {
	/**
	 * The configuration array.
	 *
	 * @var array
	 */
	protected $config = [];

	/**
	 * Treat this method as a controller action.
	 * Return view() or other content to display.
	 */
	public function run() {

		if (auth()->user()->hasRole('singer')) {
			$count = Order::where('singer_id', auth()->user()->id)->count();
		} elseif (auth()->user()->hasRole('moderator')) {
			$count = Order::where('singer_id', auth()->user()->singer_id)->count();
		} else {
			$count = Order::count();
		}

		$string = trans('admin.orders');

		return view('voyager::dimmer', array_merge($this->config, [
			'icon'   => 'voyager-bag',
			'title'  => "{$count} {$string}",
			'text'   => __('admin.order_text', ['count' => $count, 'string' => $string]),
			'button' => [
				'text' => trans('admin.view_all_orders'),
				'link' => route('voyager.orders.index'),
			],
			'image'  => 'images/widget-bk.png',
		]));
	}

	/**
	 * Determine if the widget should be displayed.
	 *
	 * @return bool
	 */
	public function shouldBeDisplayed() {
		return app('VoyagerAuth')->user()->can('browse', new order());
	}
}
