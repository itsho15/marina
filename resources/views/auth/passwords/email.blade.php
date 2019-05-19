@extends('layouts.app')

@section('content')

<div class="title wow fadeInDownBig">
    <i class="fa fa-user-circle-o"></i>
     <h1>{{ trans('front.reset_password') }}</h1>
</div>

<div class="form-style">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

     <form method="POST" action="{{ route('password.email') }}">
         @csrf
        <div class="col-md-6 col-xs-12 wow animation-div">
            <div class="form-group">
                <label class="control-label"><i class="fa fa-user"></i> {{ trans('front.email_address') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="{{ trans('front.email_address') }}"  />
                <i class="fa fa-envelope"></i>

            </div>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>

         <div class="col-md-12 col-xs-12 wow animation-div">
            <div class="form-group">
                <input type="submit" value="{{ trans('front.send') }}" class="nextPage" />
            </div>
        </div>
    </form>
</div>

@endsection
