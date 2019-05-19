@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title title-singer">
        <ul>
           <li><img src="{{ url('images/singer.png') }}" alt=""></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt=""></li>
        </ul>
        <h1 class="border-grad">{{ trans('front.cancel_joy') }}</h1>
    </div>
</div>

<span class="height"></span>
<div class="form-style animation-fast">

    <form action="{{ url('cancel/'.$code_number) }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

        <div class="col-md-6 col-xs-12  wow animation-div" style="visibility: visible;">
            <div class="form-group">
                <label class="control-label">{{ trans('front.reason_of_cancel') }}</label>
                <div class="select">
                    <select name="reason_of_edit">
                        <option value="{{ trans('front.deathcase') }}">{{ trans('front.deathcase') }}</option>
                        <option value="{{ trans('front.chronic_disease') }}">{{ trans('front.chronic_disease') }}</option>
                        <option value="{{ trans('front.divorce') }}">{{ trans('front.divorce') }}</option>
                    </select>
                    <i class="fa fa-times-circle-o"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig wow fadeInDownBig" style="visibility: visible;">
            <div class="form-group">
                <label class="control-label">{{ trans('front.attach_proof') }}</label>
                <input type="file" name="attach_proof" id="file-3" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple="">
                <label class="upload" for="file-3"><i class="fa fa-vcard"></i> <span>{{ trans('front.attach_proof') }}</span> </label>
            </div>
        </div>

        <div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
            <div class="form-group">
                <input type="submit" class="nextPage" value="{{ trans('continue') }}">
            </div>
        </div>
    </form>

</div>


@endsection