@extends('website.layouts.master')
@section('title')
    المدونة
@endsection
@section('content')
    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center"
            style="background-image:url({{ asset('assets/website/images/main_banner.jpg') }});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title"> {{ $blog['name'] }} </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->
                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{ url('/') }}"> الرئيسية </a></li>
                            <li> {{ $blog['name'] }} </li>
                        </ul>
                    </div>

                    <!-- BREADCRUMB ROW END -->
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->



        <!-- OUR BLOG START -->
        <div class="section-full  p-t120 p-b90 bg-white">
            <div class="container">

                <!-- BLOG SECTION START -->
                <div class="section-content">
                    <div class="row d-flex justify-content-center">

                        <div class="col-lg-12 col-md-12">
                            <!-- BLOG START -->
                            <div class="blog-post-single-outer">
                                <div class="blog-post-single bg-white">

                                    <div class="wt-post-info">

                                        <div class="wt-post-media m-b30">
                                            <img style="max-width: 400px"
                                                src="{{ asset('assets/uploads/Blogs/' . $blog['image']) }}" alt="">
                                        </div>

                                        <div class="wt-post-title ">
                                            <div class="wt-post-meta-list">
                                                <div class="wt-list-content post-date"> {{ $blog['created_at'] }} </div>
                                                <div class="wt-list-content post-author"> الادمن </div>
                                            </div>
                                            <h3 class="post-title"> {{ $blog['name'] }} </h3>

                                        </div>

                                        <div class="wt-post-discription">
                                            {!! $blog['desc'] !!}
                                        </div>

                                    </div>



                                </div>

                                <div class="post-area-tags-wrap">
                                    <div class="post-social-icons-wrap">
                                        <h4 class="mb-4 text-right">يشارك</h4>
                                        <!-- AddToAny BEGIN -->
                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                            <a class="a2a_button_facebook"></a>
                                            <a class="a2a_button_telegram"></a>
                                            <a class="a2a_button_threads"></a>
                                            <a class="a2a_button_linkedin"></a>
                                            <a class="a2a_button_whatsapp"></a>
                                            <a class="a2a_button_copy_link"></a>
                                            <a class="a2a_button_x"></a>
                                        </div>
                                        <script defer src="https://static.addtoany.com/menu/page.js"></script>
                                        <!-- AddToAny END -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!-- OUR BLOG END -->


    </div>
    <!-- CONTENT END -->
@endsection
