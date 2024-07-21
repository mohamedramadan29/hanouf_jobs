@extends('website.layouts.master')
@section('title')
    ابحث عن خبراء
@endsection
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center"
             style="background-image:url({{asset('assets/website/images/main_banner.jpg')}});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title"> خبراء تخير </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li> خبراء تخير</li>
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

                                <form>

                                    <div class="form-group mb-4">
                                        <h4 class="section-head-small mb-4">فئة</h4>
                                        <select class="wt-select-bar-large selectpicker" data-live-search="true"
                                                data-bv-field="size">
                                            <option selected>كل الفئة</option>
                                            <option>مصمم الويب</option>
                                            <option>مطور</option>
                                            <option>محاسب</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12">
                        <div class="twm-candidates-list-wrap talent_page">
                            <ul>
                                @foreach($users as $user)
                                    <a href="{{url('talent-details/'.$user['username'])}}">
                                        <li>
                                            <div class="twm-candidates-list-style1 mb-5">
                                                <div class="twm-media">
                                                    <div class="twm-media-pic">
                                                        <img src="{{asset('assets/uploads/users/'.$user['logo'])}}"
                                                             alt="#">
                                                    </div>

                                                </div>
                                                <div class="twm-mid-content">
                                                    <a href="{{url('talent-details/'.$user['username'])}}"
                                                       class="twm-job-title">
                                                        <h4>  {{$user['name']}} </h4>
                                                    </a>
                                                    <p> {{$user['jobs_name']['title']}} </p>

                                                    <div class="twm-fot-content">
                                                        <div class="twm-left-info">
                                                            <p class="twm-candidate-address">{{$user['location']['name']}}
                                                                <i
                                                                    class="feather-map-pin"></i>
                                                            </p>
                                                            <div>
                                                                @php
                                                                    $desc_words = explode(' ',$user['info']);
                                                           $short_description = implode(' ', array_slice($desc_words, 0, 20)) . '...';
                                                                @endphp
                                                                {{$short_description}} </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>

                        <div class="pagination-outer">
                            <div class="pagination-style1">
                                <!-- روابط التصفح -->
                                @if ($users->hasPages())
                                    <ul class="clearfix">
                                        <!-- رابط الصفحة السابقة -->
                                        @if ($users->onFirstPage())
                                            <li class="prev disabled"><span> <i class="fa fa-angle-left"></i> </span>
                                            </li>
                                        @else
                                            <li class="prev"><a href="{{ $users->previousPageUrl() }}"><span> <i
                                                            class="fa fa-angle-left"></i> </span></a></li>
                                        @endif

                                        <!-- روابط الصفحات -->
                                        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                            @if ($page == $users->currentPage())
                                                <li class="active"><a href="javascript:;">{{ $page }}</a></li>
                                            @else
                                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        <!-- رابط الصفحة التالية -->
                                        @if ($users->hasMorePages())
                                            <li class="next"><a href="{{ $users->nextPageUrl() }}"><span> <i
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
