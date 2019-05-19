@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title title-singer">
        <ul>
           <li><img src="{{ url('images/singer.png') }}" alt=""></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt=""></li>
        </ul>
        <h1 class="border-grad">{{ trans('front.close_contract') }}</h1>
    </div>
</div>

<span class="height"></span>
<div class="form-style animation-fast">
    <div class="col-xs-12">

        <div class="close-box wow animatio wow fadeInDownBig" style="visibility: visible;">
        <p> {{ trans('front.i_inform_u') }} </p>
	    <p>{{ $order->user->name }}</p>

        <p>{{ trans('front.close_agreements') }}</p>
        </div>
        <div class="form-group">
            <a data-toggle="modal" data-target="#res" class="nextPage">
                {{ trans('front.send') }}
            </a>
        </div>
    </div>


    <div class="modal fade" id="res">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            <h1>{{ trans('front.are_you_surefinal_save') }}</h1>
            <p>
                <i class="fa fa-info-circle"></i>
                {{ trans('front.message_before_close') }}
            </p>

          </div>
          <div class="modal-footer">
            <div class="col-xs-6">
                 <form action="{{ url('close/'.$code_number) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" class="nextPage" value="{{ trans('front.yes') }}">
                 </form>
            </div>
            <div class="col-xs-6">
                <button type="button" class="nextPage requ" data-dismiss="modal">{{ trans('front.no') }}</button>
            </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



</div>


@endsection