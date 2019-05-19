<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
<head>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="keywords" content="{{ setting('site.keywords') }}">
    <meta name="author" content="Elryad">
    <meta name="description" content="{{ setting('site.description') }}">
    <title>{{ setting('site.title') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href=" {{Voyager::image( setting('site.favicon') )}}" />
    <!-- Styles -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap-clockpicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/ekko-lightbox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/timepicki.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/hover.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/w3Picker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/mobile.css') }}" rel="stylesheet" type="text/css" />

    @if( session('lang') == 'en')
     <link href="{{ asset('css/style-en.css') }}" rel="stylesheet" type="text/css" />
    @endif



</head>
<body>