@extends('layouts.app')

@section('content')


<div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
    <div class="title title-singer">
        <ul>
          <li><img src="{{ url('images/singer.png') }}" alt=""></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt=""></li>
        </ul>
        <h1 class="border-grad">{{ trans('front.print') }}</h1>
    </div>
</div>

<div class="form-style animation-fast">
    <div class="col-md-12 col-xs-12  wow animation-div" style="visibility: visible;">
        <div class="singer-img">
            @if($singer)
             <img src="{{ Voyager::image( $singer->avatar )}}" alt="{{ $singer->name }}">
            @endif
        </div>
    </div>


    <div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
        <button type="submit" class="nextPage">{{ trans('front.print') }}</button>
    </div>

</div>
@endsection
