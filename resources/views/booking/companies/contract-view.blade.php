@extends('layouts.app')

@section('content')

    <div class="col-xs-12 wow fadeInDownBig">
        <div class="title title-singer">
            <ul>
                <li><img src="{{ url('images/singer.png') }}" alt="" /></li>
                <li><img src="{{ url('images/singer-icon.png') }}" alt="" /></li>
            </ul>
            <h1 class="border-grad">{{ trans('front.contract_preview') }}</h1>
        </div>
    </div>

<div class="col-xs-12">

    <h1 class="title-table wow animation-div">{{ trans('front.the_first_side') }}</h1>

    <div class="contract box wow animatio wow animation-div">

        <table>
            <tbody>

                <tr>
                    <td>{{ trans('front.order_id') }}</td>
                    <td>{{ getLastOrder() }}</td>
                </tr>
                <tr>
                    <td>{{ trans('front.hejry_date_contract') }}</td>
                    <td>{{ companystep2('hejry_date') }}</td>
                </tr>
                <tr>
                    <td>{{ trans('front.company_name') }}</td>
                    <td>{{ companystep1('company_name') }}</td>
                </tr>
                <tr>
                    <td>{{ trans('front.company_owner_name') }}</td>
                    <td>{{ companystep1('company_owner_name') }}</td>
                </tr>
                <tr>
                    <td>{{ trans('front.registration_id_number') }}</td>
                    <td>{{ companystep1('registration_id_number') }}</td>
                </tr>

                 <tr>
                    <td>{{ trans('front.country') }}</td>
                    <td>{{ GetModelbyName('App\Models\Country', companystep2('country_id') ) }}</td>
                </tr>
                <tr>
                    <td>{{ trans('front.state') }}</td>
                    <td>{{ GetModelbyName('App\Models\State', companystep2('state_id') ) }}</td>
                </tr>
                <tr>

                    <td>{{ trans('front.city') }}</td>
                    <td>{{ GetModelbyName('App\Models\City', companystep2('city_id') ) }}</td>
                </tr>
                <tr>
                    <td>{{ trans('front.street_name') }}</td>
                    <td>{{ companystep2('street_name') }}</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
<div class="col-xs-12">
<h1 class="title-table wow fadeInDownBig">{{ trans('front.second_party') }} </h1>
<div class="contract box wow fadeInDownBig">

    <table>
        <tbody>

            <tr>
                <td>{{ trans('front.order_id') }}</td>
                <td>{{ getLastOrder() }}</td>
            </tr>
            <tr>
                <td>{{ trans('front.hejry_date_contract') }}</td>
                <td>{{ companystep2('hejry_date') }}</td>
            </tr>

            <tr>
                <td>الوظيفة</td>
                <td>منسق فرقة مارينا الغربية</td>
            </tr>
            <tr>
                <td>رقم الهوية</td>
                <td>1234567899</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<div class="col-xs-12">
    <h1 class="title-table wow fadeInDownBig">{{ trans('front.terms_contract') }}</h1>
    <div class="contract box wow fadeInDownBig">
        <table>
            <tbody>

                 @if(companystep2('singer_name_female'))
                <tr>
                    <td>{{ trans('front.singer_name_female') }}</td>
                    <td> {{ companystep2('singer_name_female') }}</td>
                </tr>
                @else
                <tr>
                    <td>{{ trans('front.singer_name_male') }}</td>
                    <td> {{ companystep2('singer_name_male') }}</td>
                </tr>
                @endif

                @if(companystep2('singer_name_optional_female'))
                     <tr>
                        <td>{{ trans('front.singer_name_optional_female') }}</td>
                        <td>{{ companystep2('singer_name_optional_female') }}</td>
                    </tr>
                @else
                <tr>
                    <td>{{ trans('front.singer_name_optional_male') }}</td>
                    <td> {{ companystep2('singer_name_optional_male') }}</td>
                </tr>
                @endif

                <tr>
                    <td>{{ trans('front.hejry_date_contract') }}</td>
                    <td>{{ companystep2('hejry_date') }}</td>
                </tr>

                <tr>
                    <td>{{ trans('front.time_of_start') }}</td>
                    <td>{{ companystep2('start_time') }}</td>
                </tr>

                <tr>
                    <td>{{ trans('front.time_of_end') }}</td>
                    <td>{{ companystep2('end_time') }}</td>
                </tr>

                <tr>
                    <td>{{ trans('front.the_amount') }} </td>
                    <td>{{ companystep2('price') }} <br /> </td>
                </tr>
                <tr>
                    <td>{{ trans('front.deposit')  }} {{ '( العربون بنسبه 30% من السعر المحجوز)' }}</td>
                    <td>{{ companystep2('price') / 100 * 30 }} <br /></td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

    <div class="col-xs-12 wow fadeInDownBig">
        <div class="col-xs-6 padding-right">
            <button data-toggle="modal" data-target="#t2" class="nextPage" >{{ trans('front.final_save') }}</button>
        </div>
        <div class="col-xs-6 padding-left">
            <button data-toggle="modal" data-target="#t1" class="nextPage requ" >
              {{ trans('front.preservative_save') }}
              </button>
        </div>
    </div>

        <div class="modal fade" id="t1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h1>{{ trans('front.dear_user') }}</h1>
                <table class="client">
                    <tr>
                        <td colspan="2"><span>
                          {{ trans('front.your_request_number_is') }}
                        </span></td>
                        <td><input type="text" value="{{ getLastOrder() }}" readonly /></td>
                    </tr>

                </table>
              </div>
              <div class="modal-footer">
                <span>{{ trans('front.please_press_in_final_saveToSave') }}</span>
                <button type="button" class="nextPage"  data-toggle="modal" data-target="#t2" data-dismiss="modal">{{ trans('front.final_save') }}</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="t2">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h1>{{ trans('front.are_you_surefinal_save') }}</h1>
                <p>
                    <i class="fa fa-info-circle"></i>

                    {{ trans('front.message_for_user_before_final_save') }}
                </p>
              </div>
              <div class="modal-footer">
                <form method="POST" action="{{ url('/booking/marina/companies/finalStep') }}">
                    {{ csrf_field() }}
                    <div class="col-xs-6">
                        <button type="submit" class="nextPage" >{{ trans('front.final_save') }}</button>
                    </div>
                </form>
                <div class="col-xs-6">
                    <button type="button" class="nextPage requ" data-dismiss="modal">
                     {{ trans('front.close') }}
                      </button>
                </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

@endsection
