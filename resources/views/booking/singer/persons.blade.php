@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title title-singer">
        <ul>
            <li><img src="{{ url('images/singer.png') }}" alt="" /></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt="" /></li>
        </ul>
        <h1 class="border-grad"> {{ trans('front.booking_singer_from_marina') }} </h1>
    </div>
</div>

<div class="form-style animation-fast">

    <form action="{{ url('/booking/singer/step1') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-6 col-xs-12  wow animation-div">
            <div class="form-group">
                <label class="control-label">{{ trans('front.appropriate_type') }}</label>
                <div class="select">
                    <select name="occasion_id">

                        @foreach(Occasions() as $Occasion )
                          <option value="{{ $Occasion->id }}"  {{ ( orderdata('occasion_id') == $Occasion->id  ) ? 'selected' :'' }}>
                                {{ $Occasion->getTranslatedAttribute('name', session('lang') ) }}
                        </option>
                        @endforeach

                    </select>
                    <i class="fa fa-viadeo"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 wow animation-div">
            <div class="form-group popover-markup">
                <div class="trigger">
                    <label class="control-label" >{{ trans('front.number_bridal') }}</label>
                    <input type="number" id="passengers" name="number_bridal" class="form-control" value="{{ orderdata('number_bridal') }}" />
                </div>
                <div class="content hide">
                    <div class="form-group">
                         <div class="input-group number-spinner col-md-7">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger" data-dir="dwn"><span class="fa fa-minus"></span></button>
                            </span>
                            <input type="text" class="form-control text-center enter" value="1" max=9 min=1 disabled />
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info" data-dir="up"><span class="fa fa-plus"></span></button>
                            </span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default btn-block demise">{{ trans('front.select') }}</button>
                </div>
                <i class="fa fa-male lefti"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.name_bridal') }}</label>
                <input maxlength="100" type="text" name="name_bridal" value="{{ orderdata('name_bridal') }}" class="form-control" placeholder="الاسم " required />
                <i class="fa fa-user"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.identity_number') }}</label>
                <input maxlength="100" type="text" name="identity" value="{{ orderdata('identity') }}" class="form-control" placeholder="{{ trans('front.identity_number') }}" required />
                <i class="fa fa-vcard"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.birthday') }}</label>
                <input maxlength="100" type="text" name="birthday" value="{{ orderdata('birthday') }}" placeholder="yyy / mm / 01" class="form-control birthday"  required />
                <i class="fa fa-birthday-cake"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.nationalty') }}</label>
                <div class="select">
                    <select name="nationalty">
                        <option value="سعودي" {{ ( orderdata('nationalty') == 'سعودي'  ) ? 'selected' :'' }}>سعودي</option>
                        <option value="مصري" {{ ( orderdata('nationalty') == 'مصري' ) ? 'selected' :'' }}>مصري</option>
                        <option value="كويتي" {{ ( orderdata('nationalty') == 'كويتي'  ) ? 'selected' :'' }}>كويتي</option>
                        <option value="اماراتي" {{ ( orderdata('nationalty') == 'اماراتي'  ) ? 'selected' :'' }}>اماراتي</option>
                    </select>
                    <i class="fa fa-vcard"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.identity_source') }}</label>
                <input maxlength="100" type="text" value="{{ orderdata('identity_source') }}" name="identity_source" class="form-control" placeholder="مصدر الهوية" required />
                <i class="fa fa-map-marker"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.identity_image') }} </label>
                <input type="file" name="identity_image"  value="{{ orderdata('identity_image') }}" id="file-3" class="inputfile inputfile-2"
                data-multiple-caption="{count} files selected" multiple />
                <label class="upload" for="file-3"><i class="fa fa-vcard"></i> <span>{{ trans('front.identity_image') }} </span> </label>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.email_address') }}</label>
                <input maxlength="100" name="email_address" value="{{ orderdata('email_address') }}" type="email" class="form-control" placeholder="{{ trans('front.email_address') }}" required />
                <i class="fa fa-envelope"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.phone_bridal') }}</label>
                <input maxlength="100" type="text" name="phone_bridal" value="{{ orderdata('phone_bridal') }}" class="form-control" placeholder="{{ trans('front.phone_bridal') }}" required />
                <i class="fa fa-mobile"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.singer_gender') }}</label>
                <div class="select">
                    <select id="type" name="singer_gender">
                        <option value="female" {{ ( orderdata('singer_gender') == 'female'  ) ? 'selected' :'' }}>مطربة</option>
                        <option value="male" {{ ( orderdata('singer_gender') == 'male'  ) ? 'selected' :'' }}>مطرب</option>
                    </select>
                    <i class="fa fa-microphone"></i>
                </div>
            </div>
        </div>

        <div class="col-xs-12 padding types wow fadeInDownBig" id="female">
            <div class="col-md-6 col-xs-12 ">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.singer_name_female') }}</label>
                    <input maxlength="100" type="text" name="singer_name_female" value="{{ orderdata('singer_name_female') }}" class="form-control" placeholder="{{ trans('front.singer_name_female') }}" />
                    <i class="fa fa-microphone"></i>
                </div>
            </div>

            <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.singer_name_optional_female') }} </label>
                    <input maxlength="100" type="text" name="singer_name_optional_female" value="{{ orderdata('singer_name_optional_female') }}" class="form-control" placeholder="{{ trans('front.singer_name_optional_female') }}" />
                    <i class="fa fa-microphone"></i>
                </div>
            </div>
        </div>

        <div class="col-xs-12 padding types hideT wow fadeInDownBig" id="male">
            <div class="col-md-6 col-xs-12 ">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.singer_name_male') }}</label>
                    <input maxlength="100" type="text" name="singer_name_male" value="{{ orderdata('singer_name_male') }}" class="form-control" placeholder="{{ trans('front.singer_name_male') }}" />
                    <i class="fa fa-microphone"></i>
                </div>
            </div>

            <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.singer_name_optional_male') }} </label>
                    <input maxlength="100" type="text" name="singer_name_optional_male" value="{{ orderdata('singer_name_optional_male') }}" class="form-control" placeholder="{{ trans('front.singer_name_optional_male') }}" />
                    <i class="fa fa-microphone"></i>
                </div>
            </div>
        </div>

        <div class="col-xs-12 padding singer-choose wow fadeInDownBig">
            <div class="col-xs-12">
                <label class="control-label gold">{{ trans('front.carol_type') }}</label>
            </div>
            <div class="col-md-6 col-xs-6 ">
                <div class="form-group">
                    <label class="checkB">
                      <input type="checkbox" class="carol_type" {{ ( orderdata('carol_type') == trans('front.carol_male') ) ? 'checked' : '' }} name="carol_type" value="{{ trans('front.carol_male') }}">
                      <span><i class=" fa fa-microphone"></i>{{ trans('front.carol_male') }}</span>
                      <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="col-md-6 col-xs-6  wow fadeInDownBig">
                <div class="form-group">
                    <label class="checkB">
                      <input type="checkbox" class="carol_type" {{ ( orderdata('carol_type') == trans('front.carol_female')  ) ? 'checked' : '' }} name="carol_type" value="{{ trans('front.carol_female') }}">
                      <span><i class=" fa fa-microphone"></i>{{ trans('front.carol_female') }}</span>
                      <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>

        <hr />

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.hejry_date') }}</label>
                <input id="hijrDate" onclick="pickDate(event)"  type="text" name="hejry_date" value="{{ orderdata('hejry_date') }}" class="form-control" placeholder="yyy / mm / 01" required />
                <i class="fa fa-calendar"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.meladi_date') }}</label>
                <input id="gregDate" onclick="pickDate(event)" type="text" name="date" value="{{ orderdata('date') }}" class="form-control" placeholder="yyy / mm / 01" required />
                <i class="fa fa-calendar"></i>
            </div>
        </div>
        {{--
        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">اليوم</label>
                <div class="select">
                    <select disabled>
                        <option>السبت</option>
                        <option>الاحد</option>
                        <option>الاثنين</option>
                    </select>
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
        </div>
        --}}

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.hotel_name') }}</label>
                <div class="select">
                    <select name="hotel_name">
                        <option value="hotel1" {{ ( orderdata('hotel_name') == 'hotel1'  ) ? 'selected' :'' }}>إسم التجريبي للفندق</option>
                        <option value="hotel2"{{ ( orderdata('hotel_name') == 'hotel2'  ) ? 'selected' :'' }}>إسم التجريبي للفندق</option>
                        <option value="hotel3" {{ ( orderdata('hotel_name') == 'hotel3'  ) ? 'selected' :'' }}>إسم التجريبي للفندق</option>
                    </select>
                    <i class="fa fa-building-o"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.halls') }}</label>
                <div class="select">

                    <select name="hall_id">

                        @foreach(halls() as $hall )

                        <option value="{{ $hall->id }}" {{ ( orderdata('hall_id') ==  $hall->id  ) ? 'selected' :'' }}>
                            {{ $hall->getTranslatedAttribute('name', session('lang') ) }}
                        </option>

                        @endforeach
                    </select>

                    <i class="fa fa-video-camera"></i>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xs-12  wow fadeInDownBig">
            <span class="small-text margin"><i class="fa fa-clock-o"></i> {{ trans('front.time_of_start') }}</span>
        </div>

        <div class="col-md-6 col-xs-6  wow fadeInDownBig">
            <div class="form-group">
                <label class="small-label">{{ trans('front.from') }}</label>
                <input id="timepicker1" type="text"  value="{{ orderdata('start_time') }}" name="start_time" class="form-control" placeholder="{{ trans('front.from') }}" required />
            </div>
        </div>

        <div class="col-md-6 col-xs-6  wow fadeInDownBig">
            <div class="form-group to">
                <label class="small-label">{{ trans('front.to') }}</label>
                <input id="timepicker2" type="text" name="end_time" value="{{ orderdata('end_time') }}"  class="form-control" placeholder="{{ trans('front.to') }}" required />
            </div>
        </div>

        <div class="col-sm-4 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.country') }}</label>
                <div class="select">
                    <select class="form-control select1" name="country_id" required>

                        @foreach(countries() as $country )
                        <option value="{{ $country->id }}" {{ ( orderdata('country_id') == $country->id  ) ? 'selected' :'' }}>
                            {{ $country->getTranslatedAttribute('name', session('lang') ) }}
                        </option>
                        @endforeach

                    </select>
                    <i class="fa fa-globe"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <label class="control-label">{{ trans('front.city') }}</label>
                <div class="select">
                    <select class="form-control selectthree" name="city_id" required>

                        @foreach(cities() as $city )
                        <option value="{{ $city->id }}" {{ ( orderdata('city_id') == $city->id  ) ? 'selected' :'' }} >
                            {{ $city->getTranslatedAttribute('name', session('lang') ) }}
                        </option>
                        @endforeach

                    </select>
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <label class="control-label">{{ trans('front.state') }}</label>
                <div class="select">

                    <select class="form-control select2" name="state_id" required>

                        @foreach(states() as $state )
                            <option value="{{ $state->id }}" {{ ( orderdata('state_id') == $state->id  ) ? 'selected' :'' }}>
                                {{ $state->getTranslatedAttribute('name', session('lang') ) }}
                            </option>
                        @endforeach

                    </select>
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <label class="control-label">{{ trans('front.street_name') }} </label>
                <input maxlength="100" type="text" name="street_name" value="{{ orderdata('street_name') }}" class="form-control" placeholder="{{ trans('front.street_name') }}" required />
                <i class="fa fa-map-marker"></i>
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
