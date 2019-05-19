@extends('layouts.app')

@section('content')

<div class="logo wow fadeInDownBig">
    <img src="{{ url('images/logo/logo.png') }}" alt="" />
        <span class="text-grad">{{ trans('front.site_title') }}</span>
    <img src="{{ url('images/logo/text-logo.png') }}" alt="" />
</div>
<div class="col-xs-12 wow fadeInDownBig">
    <div class="title other">
        <h1 class="border-grad">{{ trans('front.goal_of_enter') }}</h1>
    </div>
</div>
<div class="choose-login wow fadeInDownBig">
    <a href="{{ url('login') }}" class="btn-style nextPage animation-div">{{ trans('front.login_customer_for_booking') }}</a>
    <a href="{{ url('login') }}" class="btn-style nextPage animation-div">{{ trans('front.enter_singers') }}</a>
</div>

@endsection
