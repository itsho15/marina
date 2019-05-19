@extends('layouts.app')

@section('content')

<div class="logo singer wow fadeInDownBig">
	<img src="images/singer.png" alt="" />
    	<span class="text-grad">{{ trans('front.site_title') }}</span>
    <img src="images/logo/text-logo.png" alt="" />
</div>

 <div class="choose-login">
	<a href="{{ url('booking/marina') }}" class="btn-style nextPage animation-div">
      {{ trans('front.order_from_marina') }}
     </a>
	<a href="{{ url('booking/singer_personal/female') }}" class="btn-style nextPage animation-div"> {{ trans('front.order_from_singer_female_personal') }} </a>
    <a href="{{ url('booking/singer_personal/male') }}" class="btn-style nextPage animation-div"> {{ trans('front.order_from_singer_personal') }}</a>
    <a href="#" class="btn-style nextPage animation-div">{{ trans('front.order_from_photograph') }}</a>
 </div>

@endsection
