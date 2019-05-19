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
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group row">

            <label class="control-label"><i class="fa fa-user"></i>{{ trans('front.email_address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
              <label class="control-label"><i class="fa fa-lock"></i>{{ trans('front.password') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label"><i class="fa fa-lock"></i>{{ trans('front.password_confirmation') }}</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="nextPage">
                  {{ trans('front.reset_password') }}
                </button>
            </div>
        </div>

    </form>

</div>

@endsection

