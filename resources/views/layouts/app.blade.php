@include('layouts.header')
    <!---------- Start Loader ---------->
        <div class="loader second">
            <div class="loader-inner ball-scale-multiple">
                <img src="{{ Storage::url(setting('site.logo'))  }}" alt="" />
            </div>
        </div>

    <!---------- End Loader ---------->
        <div class="mobile-first m-scene">
            <!-- Start Header -->
            <header class=" wow fadeInDownBig">
                <!---------- Start SideBar ---------->
                <div id="page-content-wrapper">
                    <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                        <span class="bar one"></span>
                        <span class="bar two"></span>
                        <span class="bar three"></span>
                    </button>
                </div>

                @if(auth()->check())

                <div id="wrapper">
                    <div class="overlay" data-toggle="offcanvas"></div>
                    <!-- Sidebar -->
                    @include('layouts.nav')
                </div>

                @endif
                <!---------- End SideBar ---------->

                <!-- Start Logo -->

               <div class="logo-header">
                    <div class="icon-logo"><img src="{{  Storage::url(setting('site.logo')) }} " alt="" /></div>
                    <div class="text-logo">
                        <span>{{ trans('front.site_title') }}</span>
                        <img src="{{ Storage::url(setting('site.logo_text'))   }}" alt="" />
                    </div>
                </div>

                <!-- End Logo
                <a href="" class="language"><i class="fa fa-globe"></i> EN</a>-->
                @if(session('lang') == 'ar')
                    <a href="{{ url('lang/en') }}" class="language"><i class="fa fa-globe"></i> EN</a>
                @elseif(session('lang') == 'en')
                    <a href="{{ url('lang/ar') }}" class="language"><i class="fa fa-globe"></i> AR</a>
                @else
                    <a href="{{ url('lang/en') }}" class="language"><i class="fa fa-globe"></i> EN</a>
                @endif

                <button class="backPage" onClick="goBack()"><i class="fa fa-arrow-left"></i></button>

            </header>
            <!-- End Header -->

            <!-- Start Content -->
            <div class="content bg">
                @include('layouts.messages')
                @yield('content')
            </div>
            <!-- End Content -->
            <!-- Start Footer -->
            <footer>
                <div class="col-sm-8 col-xs-12"><p> {{ trans('front.copyright') }} </p></div>
                <div class="col-sm-4 col-xs-12">
                    <a href="http://elryad.com" class="logo-elryad" title="تصميم مواقع / تطبيقات"> {{ trans('front.elryadcopyright') }}</a>
                </div>
            </footer>
            <!-- End Footer -->
        </div>

@include('layouts.footer')
