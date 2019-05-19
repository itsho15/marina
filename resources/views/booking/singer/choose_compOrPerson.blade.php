@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
	<div class="logo singer">
    	<img src="{{ url('images/singer.png') }}" alt="" />
        	<span class="text-grad">{{ trans('front.site_title') }}</span>
        <img src="{{ url('images/logo/text-logo-black.png') }}" alt="" />
    </div>
</div>

<div class="choose-login">
	<a href="{{ url('singer/persons') }}" class="btn-style nextPage animation-div">
      {{ trans('front.personal_login') }}
      </a>
	<a href="{{ url('/booking/marina/companies') }}" class="btn-style nextPage animation-div">
      {{ trans('front.companies_login') }}
    </a>
</div>

@endsection
