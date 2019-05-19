@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title">
        <i class="fa fa-user-circle-o"></i>
        <h1 class="border-grad">{{ trans('fornt.reg_new_client') }}</h1>
    </div>
</div>
<div class="form-style">


     <form method="POST" action="{{ route('register') }}">
       @csrf
        <div class="col-md-6 col-md-offset-3 col-xs-12 wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.enter_code') }}</label>
                    <input maxlength="100" type="text" name="code" class="form-control number" placeholder="{{ trans('front.enter_code') }}" required />
                    <i class="fa fa-check-circle"></i>
                    <span class="small-text"><i class="fa fa-exclamation-circle"></i> {{ trans('fornt.enter_code') }}
                    <a href=""><i class="fa fa-refresh"></i> اعد إرسال الكود</a></span>
                </div>
            </div>
      <div class="col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <input type="submit" class="nextPage" value="{{ trans('front.continue') }}" />
            </div>
        </div>
    </form>
</div>

@endsection
