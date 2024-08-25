@extends('website.layouts.master')
@section('title')
   الوظائف المقترحة
@endsection
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">
        @if (Session::has('Success_message'))
            @php
                emotify('success', \Illuminate\Support\Facades\Session::get('Success_message'));
            @endphp
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @php
                    emotify('error', $error);
                @endphp
            @endforeach
        @endif
        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center"
             style="background-image:url({{asset('assets/website/images/banner/1.jpg')}});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title"> {{ Auth::user()->name }} </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li> الوظائف المقترحة  </li>
                        </ul>
                    </div>

                    <!-- BREADCRUMB ROW END -->
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->


        <!-- OUR BLOG START -->
        <div class="section-full p-t120  p-b90 site-bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-12 rightSidebar m-b30">
                        <div class="side-bar-st-1">
                            <div class="twm-candidate-profile-pic">
                                @if(\Illuminate\Support\Facades\Auth::user()->logo !='')
                                    <img
                                        src="{{asset('assets/uploads/users/'.Auth::user()->logo)}}"
                                        alt="">
                                @else
                                    <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="">
                                @endif

                            </div>

                            <div class="twm-mid-content text-center" style="margin-bottom: 15px">
                                <a href="{{url('user/dashboard')}}" class="twm-job-title">
                                    <h4 style="margin-bottom: 10px">  {{Auth::user()->name}} </h4>
                                </a>
                                <p> {{Auth::user()->email}} </p>
                            </div>

                            <div class="twm-nav-list-1">
                                <ul>
                                    <li><a href="{{url('user/dashboard')}}"><i class="fa fa-user"></i>
                                            تعديل النبذة شخصية
                                        </a></li>
                                    <li><a href="{{url('user/update')}}"><i class="fa fa-edit"></i>  تعديل معلوماتي المهنية </a></li>

                                    <li class="active"><a href="{{url('user/suggested-jobs')}}"><i class="fa fa-receipt"></i>  الوظائف المقترحة
                                        </a></li>

                                    <li><a href="{{url('user/alerts')}}"><i class="fa fa-bell"></i>   تنبيهات مهمة
                                        </a></li>


                                    <li><a href="{{url('user/change-password')}}"><i class="fa fa-fingerprint"></i>
                                            تغيير كلمة المرور</a></li>
                                    <li><a href="{{url('user/logout')}}"><i class="fa fa-share-square"></i> تسجيل
                                            خروج</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                        <div class="product-filter-wrap d-flex justify-content-between align-items-center m-b30">
                            <span class="woocommerce-result-count-left">عرض {{ $advs->count()  }} وظيفة</span>

                            <form class="woocommerce-ordering twm-filter-select" method="get">
                                <span class="woocommerce-result-count"> رتب حسب </span>
                                <select class="wt-select-bar-2 selectpicker" data-live-search="true"
                                        data-bv-field="size">
                                    <option>الأحدث</option>
                                    <option>الاقدم</option>

                                </select>
                            </form>

                        </div>

                        <div class="twm-jobs-list-wrap newalljobs">
                            <ul>
                                @foreach($advs as $adv)
                                    <li>
                                        <div class="twm-jobs-list-style1 mb-5">
                                            <div class="twm-media">
                                                @if($adv['company']['logo'] !='')
                                                    <img
                                                        src="{{asset('assets/uploads/companies/'.$adv['company']['logo'])}}"
                                                        alt="#">
                                                @else
                                                    <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}"
                                                         alt="#">
                                                @endif

                                            </div>
                                            <div class="twm-mid-content">
                                                <a href="{{url('job/'.$adv['id'].'-'.$adv['slug'])}}"
                                                   class="twm-job-title">
                                                    <h4 class="job_title"> {{$adv['title']}} <span
                                                            class="twm-job-post-duration">/  {{$adv->created_at->diffForHumans()}}   </span>
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
                                                   class="twm-jobs-browse btn"> <i class="fa fa-paper-plane"></i> تقدم للوظيفة </a>
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
        <!-- OUR BLOG END -->


    </div>
    <!-- CONTENT END -->
@endsection
