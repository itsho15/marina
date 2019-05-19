@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title title-singer">
        <ul>
            <li><img src="{{ url('images/singer.png') }}" alt="" /></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt="" /></li>
        </ul>
        <h1 class="border-grad">{{ trans('front.important_contact') }}</h1>
    </div>
</div>

<div class="form-style">
    <form action="{{ url('singer/step6') }}" method="POST">
        {{ csrf_field() }}

        <div id="vehicleFieldsWrapper" >
            <div class="vehicleFields">

                @php $i= 0; @endphp

                @if( is_array( session('contacts')['contact_name'] ) && count( session('contacts')['contact_name']) > 1)

                    @foreach(session('contacts')['contact_name'] as  $contact)

                        <div class="col-md-6 col-xs-12 wow animation-div ">
                            <div class="form-group">
                                <label class="control-label">{{ trans('front.name') }}</label>
                                <input maxlength="100" type="text" class="form-control" name="contact_name[]" value="{{ session('contacts')['contact_name'][$i] }}" placeholder="إسم تجريبي" required />
                                <i class="fa fa-male"></i>
                            </div>
                        </div>

                         <div class="col-md-6 col-xs-12 wow animation-div">
                            <div class="form-group">
                                <label class="control-label">{{ trans('front.relation_contact') }}

                                </label>
                                <div class="select">
                                    <select name="contact_relation[]">

                                        <option value="{{ trans('front.father') }}"
                                        {{ ( session('contacts')['contact_phone'][$i] ==  trans('front.father')  ) ? 'selected' : '' }}
										>{{ trans('front.father') }}</option>

                                        <option value="{{ trans('front.brother') }}"
                                        {{ (session('contacts')['contact_phone'][$i] ==
                                           trans('front.brother') ) ? 'selected' :'' }}
>
                                          {{ trans('front.brother') }}</option>
                                    </select>

                                    <i class="fa fa-handshake-o"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
                            <div class="form-group">
                                <label class="control-label">{{ trans('front.mobile') }}</label>
                                <input maxlength="100" type="text" class="form-control" name="contact_phone[]" value="{{ session('contacts')['contact_phone'][$i] }}" placeholder="{{ trans('front.mobile') }}" required />
                                <i class="fa fa-phone"></i>
                            </div>
                        </div>

                        @php $i++; @endphp
                    @endforeach
                @else

                     <div class="col-md-6 col-xs-12 wow animation-div ">
                        <div class="form-group">
                            <label class="control-label">{{ trans('front.name') }}</label>
                            <input maxlength="100" type="text" class="form-control" name="contact_name[]" placeholder="{{ trans('front.name') }}" required />
                            <i class="fa fa-male"></i>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12 wow animation-div">
                        <div class="form-group">
                            <label class="control-label">
                              {{ trans('front.relation_contact') }}</label>
                            <div class="select">
                                <select name="contact_relation[]">
                                    <option value="{{ trans('front.father') }}" >
                                      {{ trans('front.father') }}
                                    </option>
                                    <option value="{{ trans('front.brother') }}" >
                                      {{ trans('front.brother') }}
                                     </option>
                                </select>
                                <i class="fa fa-handshake-o"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12 wow fadeInDownBig">
                        <div class="form-group">
                            <label class="control-label">{{ trans('front.mobile') }}</label>
                            <input maxlength="100" type="text" class="form-control" name="contact_phone[]" placeholder="{{ trans('front.mobile') }}" required />
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>

                @endif



            </div>
        </div>
        <div class="col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <a  class="nextPage requ" id="addVehicle"><i class="fa fa-plus"></i>
                {{ trans('front.add_other_contact') }}
                </a>
                <input type="submit" class="nextPage" value="{{ trans('front.continue') }}" />
            </div>
        </div>
    </form>

</div>


@endsection
