@extends('website.layouts.master')
@section('title')
    الاسئلة الشائعه
@endsection
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center"
             style="background-image:url({{asset('assets/website/images/banner/1.jpg')}});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title"> الاسئلة الشائعه </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li> الاسئلة الشائعه</li>
                        </ul>
                    </div>

                    <!-- BREADCRUMB ROW END -->
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->
        <!-- FAQ START -->
        <div class="section-full p-t120  p-b90 site-bg-white">

            <div class="container">

                <div class="section-content">
                    <div class="twm-tabs-style-1 center">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Jobs" type="button"
                                        role="tab" aria-controls="Jobs"> الشركات
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Payment" type="button"
                                        role="tab" aria-controls="Payment"> الموظفين
                                </button>
                            </li>


                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!--Tabs content one-->
                            <div class="tab-pane fade show active" id="Jobs" role="tabpanel">
                                <div class="tw-faq-section">
                                    <div class="accordion tw-faq" id="sf-faq-accordion">
                                        <!--One-->

                                        @foreach($companyfaqs as $faq)
                                            <div class="accordion-item">

                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" aria-expanded="false"
                                                        data-bs-target="#FAQ{{$faq['id']}}">
                                                    {{$faq['title']}}
                                                </button>

                                                <div id="FAQ{{$faq['id']}}" class="accordion-collapse collapse"
                                                     data-bs-parent="#sf-faq-accordion">
                                                    <div class="accordion-body">
                                                        {{$faq['desc']}}
                                                    </div>
                                                </div>

                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!--Tabs content two-->
                            <div class="tab-pane fade" id="Payment" role="tabpanel">
                                <div class="tw-faq-section">
                                    <div class="accordion tw-faq" id="sf-faq-accordion-2">

                                        <!--One-->

                                        @foreach($employesfaqs as $faq)
                                            <div class="accordion-item">

                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" aria-expanded="false"
                                                        data-bs-target="#FAQ{{$faq['id']}}">
                                                    {{$faq['title']}}
                                                </button>

                                                <div id="FAQ{{$faq['id']}}" class="accordion-collapse collapse"
                                                     data-bs-parent="#sf-faq-accordion">
                                                    <div class="accordion-body">
                                                        {{$faq['desc']}}
                                                    </div>
                                                </div>

                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>

            </div>

        </div>
        <!-- FAQ END -->


    </div>
    <!-- CONTENT END -->
@endsection
