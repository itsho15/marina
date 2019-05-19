@extends('layouts.app')

@section('content')


<div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
    <div class="title title-singer">
        <ul>
          <li><img src="{{ url('images/singer.png') }}" alt=""></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt=""></li>
        </ul>
        <h1 class="border-grad"> {{ trans('front.enter_code_number') }}</h1>
    </div>
</div>

<div class="form-style animation-fast" >


  <div class="col-md-12 col-xs-12  wow animation-div" style="visibility: visible;">

        @if($singer)
        <div class="singer-img">
             <img src="{{ Voyager::image( $singer->avatar )}}" alt="{{ $singer->name }}">
             </div>
        @endif
    </div>
    <form action="{{ url('contract/find') }}" method="POST">
        {{ csrf_field() }}
        <div class="col-md-12 col-xs-12  wow fadeInDownBig" style="visibility: visible;">
          <div class="form-group">
                <label class="control-label active">{{ trans('front.code_number') }}</label>
                <input maxlength="100" type="text" class="form-control" placeholder="{{ trans('front.code_number') }}" required="" name="code_number">
                <i class="fa fa-barcode"></i>

            </div>
        </div>

        <div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
          <div class="form-group">
              <input type="submit" class="nextPage" value="{{ trans('front.join') }}">
            </div>
        </div>
    </form>

</div>


@endsection
