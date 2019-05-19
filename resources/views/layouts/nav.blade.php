<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <div class="logo-sidebar">
        <img src="{{ Storage::url(setting('site.logo'))   }}" alt="" />
        <span> {{ setting('site.text_header') }} </span>
        <img src="{{ Storage::url(setting('site.logo_text'))  }}" alt="" />
    </div>
    <ul class="nav sidebar-nav">
        <li><a href="index.html"><i class="fa fa-home"></i> {{trans('front.home')}}</a></li>
        <li><a href="#"><i class="fa fa-user"></i> {{trans('front.signup_singer')}}</a></li>
        <li><a href="#"><i class="fa fa-sign-in"></i> {{trans('front.signup_user')}}</a></li>
        <li><a href="#"><i class="fa fa-refresh"></i> {{trans('front.trace_order')}} </a></li>
        <li><a href="#"><i class="fa fa-pencil"></i> {{trans('front.entercode_print')}}</a></li>
        <li><a href="#"><i class="fa fa-users"></i> {{ trans('front.hight_management') }} </a></li>
        <li><a href="#"><i class="fa fa-street-view"></i> {{ trans('front.moderators') }}</a></li>
        <li><a href="#"><i class="fa fa-briefcase"></i> {{ trans('front.business_manager') }}</a></li>
        <li><a href="#"><i class="fa fa-file-text-o"></i> {{ trans('front.complaints') }}</a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"><i class="fa fa-file-text-o"></i>{{ trans('front.logout') }}</a></li>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
    <ul class="social-media">
        <li><a href="{{ setting('site.facebook') }}"><i class="fa fa-facebook"></i></a></li>
        <li><a href="{{ setting('site.twitter') }}"><i class="fa fa-twitter"></i></a></li>
        <!--<li><a href=""><i class="fa fa-snapchat-ghost"></i></a></li>-->
        <li><a href="{{ setting('site.instagram') }}"><i class="fa fa-instagram"></i></a></li>
    </ul>
</nav>