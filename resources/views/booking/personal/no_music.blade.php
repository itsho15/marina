@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title title-singer">
        <ul>
        	<li><img src="{{ url('images/singer.png') }}" alt=""></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt=""></li>
        </ul>
        <h1 class="border-grad"> {{ trans('front.rhythms_and_machichoose') }} </h1>
    </div>
</div>

<div class="form-style">
    <form action="{{ url('step3') }}" method="POST">
    	{{ csrf_field() }}

        <div class="col-md-12 col-xs-12 wow fadeInDownBig ">
        	<div class="form-group">
            	<p>
                		{{ trans('front.rhythms_choose') }} :
                </p>
            </div>
        </div>

        @foreach(Rhythms() as $rhythms)

	        <div class="col-md-6 col-xs-12 wow fadeInDownBig ">
	        	<div class="form-group otherStyle">
	            	<label class="checkB">

	            		{{ $rhythms->getTranslatedAttribute('name', session('lang') ) }}

	                  <input  type="checkbox"
                        {{ ( rhythms_session($rhythms->id) == $rhythms->getTranslatedAttribute('name', session('lang')) ) ? 'checked' : ''  }}
                                 name="rhythms[{{ $rhythms->id }}]"
                                 value="{{ $rhythms->getTranslatedAttribute('name', session('lang') ) }}"
                                 />

	                  <span class="checkmark"></span>
	                </label>
	            </div>
	        </div>

        @endforeach

        <div class="col-xs-12 wow fadeInDownBig ">
        	<div class="form-group">
            	<input type="submit" class="nextPage" value="{{ trans('front.continue') }}" />
            </div>
        </div>
    </form>

</div>

@endsection
