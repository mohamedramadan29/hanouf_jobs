@extends('website.layouts.master')
@section('title')
    {{$company['name']}} | تخير
@endsection
@section('content')
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center"
             style="background-image:url({{asset('assets/website/images/banner/1.jpg')}});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title"> {{$company['name']}}  </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li> {{$company['name']}} </li>
                        </ul>
                    </div>

                    <!-- BREADCRUMB ROW END -->
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->

        <!-- Employer Detail START -->
        <div class="section-full  p-t120 p-b90 bg-white">
            <div class="container">


                <div class="section-content">
                    <div class="row d-flex justify-content-center">

                        <div class="col-lg-8 col-md-12">
                            <!-- Candidate detail START -->
                            <div class="cabdidate-de-info job_details_page">
                                <div class="twm-employer-self-wrap">
                                    <div class="twm-employer-self-info">
                                        <div class="twm-employer-self-top">
                                            <div class="twm-mid-content">
                                                <div class="twm-media">
                                                    <img src="{{asset('assets/uploads/companies/'.$company['logo'])}}"
                                                         alt="#">
                                                </div>

                                                <h4 class="twm-job-title"> {{$company['name']}} </h4>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <h4 class="twm-s-title">عن الشركة</h4>

                                <p style="line-height:2;font-size: 16px;"> {{$company['info']}} </p>

                                <h4 class="twm-s-title"> المشاريع </h4>
                                <div class="twm-jobs-list-wrap newalljobs">
                                    <ul>
                                        @foreach($advs as $adv)
                                            <li>
                                                <div class="twm-jobs-list-style1 mb-5">
                                                    <div class="twm-media">
                                                        <img
                                                            src="{{asset('assets/uploads/companies/'.$adv['company']['logo'])}}"
                                                            alt="#">
                                                    </div>
                                                    <div class="twm-mid-content">
                                                        <a href="{{url('job/'.$adv['id'].'-'.$adv['slug'])}}"
                                                           class="twm-job-title">
                                                            <h4>  {{$adv['title']}} <span class="twm-job-post-duration">/   {{$adv->created_at->diffForHumans()}}  </span>
                                                            </h4>
                                                        </a>
                                                        @php
                                                            $desc_words = explode(' ',$adv['description']);
                                                            $short_description = implode(' ', array_slice($desc_words, 0, 20)) . '...';
                                                        @endphp
                                                        <p class="twm-job-address"> {{$short_description}} </p>
                                                    </div>
                                                    <div class="twm-right-content">
                                                        <a href="{{url('job/'.$adv['id'].'-'.$adv['slug'])}}"
                                                           class="twm-jobs-browse btn"> <i
                                                                class="fa fa-paper-plane"></i> تقدم للوظيفة </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!-- Employer Detail END -->


    </div>
    <!-- CONTENT END -->

@endsection
