@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title">
        <i class="fa fa-user-circle-o"></i>
        <h1 class="border-grad">{{ trans('front.reg_new_client') }}</h1>
    </div>
</div>
<div class="form-style">

    <form method="POST" action="{{ route('register') }}">
       @csrf
        <div class="col-md-6 col-xs-12 wow animation-div">
            <div class="form-group">
                <label class="control-label">{{ trans('front.name') }}</label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="{{ trans('front.name') }}"  />
                <i class="fa fa-user"></i>
            </div>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-md-6 col-xs-12 wow animation-div">
            <div class="form-group">
                <label class="control-label">{{ trans('front.password') }}</label>
                <input  id="password-field" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required class="form-control" placeholder="{{ trans('front.password') }}" required />
                <i class="fa fa-lock"></i>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>

        <div class="col-md-6 col-xs-12 wow animation-div">
            <div class="form-group">
                <label class="control-label">{{ trans('front.password_confirmation') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="{{ trans('front.password_confirmation') }}" required />
                <i class="fa fa-lock"></i>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.email_address') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="{{ trans('front.email_address') }}"  />
                <i class="fa fa-envelope"></i>
            </div>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>

        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.mobile') }}</label>
                <input type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}"  class="form-control number" placeholder="{{ trans('front.mobile') }}" required />
                <i class="fa fa-phone"></i>
            </div>

            @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif

        </div>



        <div class="col-md-12 col-xs-12 wow fadeInDownBig">
            <div class="form-group allDone">
                <label class="checkB">{{ trans('front.iagree_terms') }}
                    <a href=""><i class="fa fa-exclamation-circle"></i> {{ trans('front.see_the_terms') }} </a>
                  <input type="checkbox" checked="checked" name="checkmark">
                  <span class="checkmark"></span>
                </label>
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
