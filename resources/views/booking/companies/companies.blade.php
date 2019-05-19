@extends('layouts.app')

@section('content')
<div class="col-xs-12 wow fadeInDownBig">
    <div class="title title-singer">
        <ul>
        	<li><img src="{{ url('images/singer.png') }}" alt="" /></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt="" /></li>
        </ul>
        <h1 class="border-grad">{{ trans('front.companies_title') }}</h1>
    </div>
</div>

<div class="form-style">
   <form action="{{ url('/booking/marina/companies') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
        	<div class="form-group">
                <label class="control-label">{{ trans('front.company_type') }}</label>
                <div class="select">
                	<select name="company_type">
                    	<option value="{{ trans('front.industrial') }}" {{ ( companystep1('company_type') == trans('front.industrial') ) ? 'selected' :'' }} > {{ trans('front.industrial') }} </option>
                    	<option value="{{ trans('front.commercial') }}" {{ ( companystep1('company_type') == trans('front.commercial')  ) ? 'selected' :'' }} > {{ trans('front.commercial') }} </option>
                    </select>
                	<i class="fa fa-building"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
        	<div class="form-group">
                <label class="control-label"> {{ trans('front.company_name') }} </label>
                <input maxlength="100" type="text" class="form-control" value="{{ companystep1('company_name') }}" placeholder="{{ trans('front.company_name') }}"  name="company_name" required/>
                <i class="fa fa-building"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
        	<div class="form-group">
                <label class="control-label">{{ trans('front.commercial_registration_no') }}</label>
                <input maxlength="100" type="text" class="form-control" value="{{ companystep1('commercial_registration_no') }}"  placeholder="{{ trans('front.commercial_registration_no') }}"  name="commercial_registration_no" required />
                <i class="fa fa-vcard"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
        	<div class="form-group">
                <label class="control-label">{{ trans('front.company_owner_name') }}</label>
                <input maxlength="100" type="text" class="form-control" value="{{ companystep1('company_owner_name') }}"  placeholder="{{ trans('front.company_owner_name') }}" name="company_owner_name" required />
                <i class="fa fa-user"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
        	<div class="form-group">
                <label class="control-label">{{ trans('front.registration_id_number') }}</label>
                <input maxlength="100" type="text" class="form-control" value="{{ companystep1('registration_id_number') }}"  placeholder="{{ trans('front.registration_id_number') }}"  name="registration_id_number" required />
                <i class="fa fa-vcard"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
        	<div class="form-group">
                <label class="control-label">{{ trans('front.director_name') }}</label>
                <input maxlength="100" type="text" class="form-control" value="{{ companystep1('director_name') }}"  placeholder="{{ trans('front.director_name') }}" name="director_name" required />
                <i class="fa fa-user"></i>
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


