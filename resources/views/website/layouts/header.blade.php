<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>

    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content=" اكتشف فرص العمل التي تناسب مهاراتك " />

    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{asset('assets/website/images/logo.png')}}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/website/images/logo.png')}}" />

    <!-- PAGE TITLE HERE -->
    <title>  @yield('title') </title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/bootstrap.rtl.min.css')}}"><!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/font-awesome.min.css')}}"><!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/feather.css')}}"><!-- FEATHER ICON SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/owl.carousel.min.css')}}"><!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/magnific-popup.min.css')}}"><!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/lc_lightbox.css')}}"><!-- Lc light box popup -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/bootstrap-select.min.css')}}"><!-- BOOTSTRAP SLECT BOX STYLE SHEET  -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/dataTables.bootstrap5.min.css')}}"><!-- DATA table STYLE SHEET  -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/select.bootstrap5.min.css')}}"><!-- DASHBOARD select bootstrap  STYLE SHEET  -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/dropzone.css')}}"><!-- DROPZONE STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/scrollbar.css')}}"><!-- CUSTOM SCROLL BAR STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/datepicker.css')}}"><!-- DATEPICKER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/flaticon.css')}}"> <!-- Flaticon -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/swiper-bundle.min.css')}}"><!-- Swiper Slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/style.css')}}"><!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/rtl.css')}}"><!-- RTL STYLE SHEET -->

    @notifyCss
    @yield('css')
    @livewireStyles
</head>



<body>

<!-- LOADING AREA START ===== -->
<div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>
</div>
<!-- LOADING AREA  END ====== -->
