@extends('layouts.app')

@section('content')


<div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
    <div class="title title-singer">
        <ul>
          <li><img src="{{ url('images/singer.png') }}" alt=""></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt=""></li>
        </ul>
        <h1 class="border-grad">{{ trans('front.addNewGroom') }}</h1>
    </div>
</div>

<div class="form-style animation-fast" >


  <div class="col-md-12 col-xs-12  wow animation-div" style="visibility: visible;">
        <div class="singer-img">
            @if($singer)
             <img src="{{ Voyager::image( $singer->avatar )}}" alt="{{ $singer->name }}">
            @endif
        </div>
    </div>
    <form action="{{ url('addGroom/'.$code_number) }}" method="POST">
        {{ csrf_field() }}


            <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.name_bridal') }}</label>
                    <input maxlength="100" type="text" class="form-control" placeholder="{{ trans('front.name_bridal') }}" required name="name" value="{{ old('name') }}" />
                    <i class="fa fa-user"></i>
                </div>
            </div>

            <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.identity') }}</label>
                    <input maxlength="100" type="text" class="form-control" placeholder="{{ trans('front.identity') }}" required name="identity" value="{{ old('identity') }}" />
                    <i class="fa fa-vcard"></i>
                </div>
            </div>

            <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.birthday') }}</label>
                    <input maxlength="100" type="text" placeholder="{{ trans('front.birthday') }}" class="form-control birthday"  required name="birthday" value="{{ old('birthday') }}" />
                    <i class="fa fa-birthday-cake"></i>
                </div>
            </div>

            <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">

                    <label class="control-label">{{ trans('front.price_per_groom') }}</label>
                    <input  type="text" class="form-control"  readonly value="{{ setting('site.price_per_birdal') }} {{ trans('front.ryal') }}" />
                    <i class="fa fa-dollar"></i>
                </div>
            </div>

            <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.mobile') }}</label>
                    <input maxlength="100" type="text" class="form-control" placeholder="{{ trans('front.mobile') }}" required name="phone" value="{{ old('phone') }}" />
                    <i class="fa fa-mobile"></i>
                </div>
            </div>

            <div class="col-xs-12 wow fadeInDownBig ">
                <div class="form-group">
                    <input type="submit" class="nextPage" value="{{ trans('front.continue') }}" />
                </div>
            </div>

    </form>

</div>


@endsection
