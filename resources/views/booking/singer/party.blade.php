@extends('layouts.app')

@section('content')

<div class="logo singer wow fadeInDownBig">
	<img src="{{ url('images/singer.png') }}" alt="" />
    	<span class="text-grad">{{ trans('front.site_title') }}</span>
    <img src="{{ url('images/logo/text-logo.png') }}" alt="" />
</div>

<div class="col-xs-12 wow  animation-div">
    <div class="title title-singer">
        <h1 class="border-grad"> {{ trans('front.select_the_type_of_breed') }} </h1>
    </div>
</div>

<div class="choose-login">

	<a class="btn-style nextPage animation-div" href="{{ url('singer/music') }}">
        {{ trans('front.concert') }}
    </a>

    <a class="btn-style nextPage animation-div" href="{{ url('singer/no_music') }}">
       {{ trans('front.without_concert') }}
    </a>

    <a class="btn-style nextPage animation-div" href="{{ url('singer/music') }}">
        {{ trans('front.music_no_music') }}
    </a>

</div>

@endsection
