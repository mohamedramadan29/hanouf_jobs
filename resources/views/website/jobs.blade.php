@extends('website.layouts.master')
@section('title')
    اعلانات وظيفية  | تخير
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
                            <h2 class="wt-title"> الوظائف </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li>قائمة الوظائف</li>
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

                    <div class="col-lg-4 col-md-12 rightSidebar">

                        <div class="side-bar">

                            <div class="sidebar-elements search-bx">
                                <form method="get" action="{{ url('jobs') }}">
                                    @csrf

                                    <!-- المسمي الوظيفي -->
                                    <div class="twm-sidebar-ele-filter">
                                        <h4 class="section-head-small mb-4">المسمي الوظيفي</h4>
                                        <select class="wt-select-box selectpicker" name="job_ids" data-live-search="true" title="اختر المسمي الوظيفي">
                                            <option value="">عرض الكل</option>
                                            @foreach($jobs as $job)
                                                <option value="{{ $job['id'] }}" {{ request('job_ids') == $job['id'] ? 'selected' : '' }}>
                                                    {{ $job['title'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- التخصص المهني -->
                                    <div class="twm-sidebar-ele-filter">
                                        <h4 class="section-head-small mb-4">التخصص المهني</h4>
                                        <select class="wt-select-box selectpicker" name="special_ids" data-live-search="true" title="اختر التخصص المهني">
                                            <option value="">عرض الكل</option>
                                            @foreach($specialists as $special)
                                                <option value="{{ $special['id'] }}" {{ request('special_ids') == $special['id'] ? 'selected' : '' }}>
                                                    {{ $special['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- المؤهل العلمي -->
                                    <div class="twm-sidebar-ele-filter">
                                        <h4 class="section-head-small mb-4">المؤهل العلمي</h4>
                                        <select class="wt-select-box selectpicker" name="academy_certificate">
                                            <option value="">عرض الكل</option>
                                            <option value="ثانوي" {{ request('academy_certificate') == 'ثانوي' ? 'selected' : '' }}>ثانوي</option>
                                            <option value="دبلوم" {{ request('academy_certificate') == 'دبلوم' ? 'selected' : '' }}>دبلوم</option>
                                            <option value="بكالوريوس" {{ request('academy_certificate') == 'بكالوريوس' ? 'selected' : '' }}>بكالوريوس</option>
                                            <option value="ماستر" {{ request('academy_certificate') == 'ماستر' ? 'selected' : '' }}>ماستر</option>
                                            <option value="دكتوراة" {{ request('academy_certificate') == 'دكتوراة' ? 'selected' : '' }}>دكتوراة</option>
                                        </select>
                                    </div>

                                    <!-- زر البحث -->
                                    <div>
                                        <button type="submit" class="site-button" style="display: block; width: 100%">بحث</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <!--Filter Short By-->
                        <div class="product-filter-wrap d-flex justify-content-between align-items-center m-b30">
                            <span class="woocommerce-result-count-left">عرض {{ $advs->count()  }} وظيفة</span>

                            <form class="woocommerce-ordering twm-filter-select" method="get" action="{{url('jobs')}}">
                                <span class="woocommerce-result-count">رتب حسب</span>
                                <select class="wt-select-bar-2 selectpicker" data-live-search="true" name="sort" id="sortOrder" onchange="this.form.submit()">
                                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>الأحدث</option>
                                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>الاقدم</option>
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

                        <div class="pagination-outer">
                            <div class="pagination-style1">
                                <!-- روابط التصفح -->
                                @if ($advs->hasPages())
                                    <ul class="clearfix">
                                        <!-- رابط الصفحة السابقة -->
                                        @if ($advs->onFirstPage())
                                            <li class="prev disabled"><span> <i class="fa fa-angle-left"></i> </span>
                                            </li>
                                        @else
                                            <li class="prev"><a href="{{ $advs->previousPageUrl() }}"><span> <i
                                                            class="fa fa-angle-left"></i> </span></a></li>
                                        @endif

                                        <!-- روابط الصفحات -->
                                        @foreach ($advs->getUrlRange(1, $advs->lastPage()) as $page => $url)
                                            @if ($page == $advs->currentPage())
                                                <li class="active"><a href="javascript:;">{{ $page }}</a></li>
                                            @else
                                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        <!-- رابط الصفحة التالية -->
                                        @if ($advs->hasMorePages())
                                            <li class="next"><a href="{{ $advs->nextPageUrl() }}"><span> <i
                                                            class="fa fa-angle-right"></i> </span></a></li>
                                        @else
                                            <li class="next disabled"><span> <i class="fa fa-angle-right"></i> </span>
                                            </li>
                                        @endif

                                    </ul>
                                @endif
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
