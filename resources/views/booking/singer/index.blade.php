@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
    <div class="title title-singer">
        <ul>
            <li><img src="{{ url('images/singer.png') }}" alt=""></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt=""></li>
        </ul>

          <h1 class="border-grad"> @if($gender == 'female') {{ trans('front.singer_name_female') }} @else  {{ trans('front.singer_name_male') }} @endif </h1>
    </div>
</div>

<div class="form-style animation-fast">
    <form action="{{ url('show/singer') }}" method="POST">
         {{ csrf_field() }}
        <div class="col-md-12 col-xs-12  wow animation-div">
            <div class="form-group">
                <label class="control-label active">@if($gender == 'female') {{ trans('front.singer_name_female') }} @else  {{ trans('front.singer_name_male') }} @endif</label>
                    <div class="select">
                        <select class="chz-select" data-placeholder="Select..."  name="singer_id">
                             @foreach($singers as $singer)
                                <option value="{{ $singer->id }}"> {{ $singer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <i class="fa fa-user"></i>
            </div>
        </div>

        <div class="col-xs-12 wow animation-div">
            <div class="form-group">
                <input type="submit" class="nextPage" value="{{ trans('front.continue') }}" />
            </div>
        </div>
    </form>

</div>

@endsection

@push('js')
<script type="text/javascript">
    $(window).load(function() {
        $('.chz-select').select2({

            formatNoMatches: function(term) {
                return "<a href='{{ url('booking/marina') }}' onclick='alert('" + term + "');'" +
                    "id='newClient'>{{ trans('front.no_result_singer') }}</a>";
            }
        });
    });
</script>
@endpush

