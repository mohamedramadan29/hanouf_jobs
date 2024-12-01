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
                            <h2 class="wt-title"> المدونة </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->
                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{ url('/') }}"> الرئيسية </a></li>
                            <li> المدونة </li>
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
                <div class="masonry-wrap row d-flex">
                    @foreach ($posts as $post)
                        <!--Block one-->
                        <div class="masonry-item col-lg-4 col-md-12">

                            <div class="blog-post twm-blog-post-1-outer">
                                <div class="wt-post-media">
                                    <a href="{{ url('blog/' . $post['slug']) }}"><img
                                            src="{{ asset('assets/uploads/Blogs/' . $post['image']) }}" alt=""></a>
                                </div>
                                <div class="wt-post-info">
                                    <div class="wt-post-meta ">
                                        <ul>
                                            <li class="post-date">{{ $post['created_at'] }}</li>
                                        </ul>
                                    </div>
                                    <div class="wt-post-title ">
                                        <h4 class="post-title">
                                            <a href="{{ url('blog/' . $post['slug']) }}">{{ $post['name'] }}</a>
                                        </h4>
                                    </div>
                                    <div class="wt-post-text ">
                                        <p>
                                            {{ $post['short_desc'] }}
                                        </p>
                                    </div>
                                    <div class="wt-post-readmore ">
                                        <a href="{{ url('blog/' . $post['slug']) }}"
                                            class="site-button-link site-text-primary">اقرأ أكثر</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
                <div class="pagination-outer">
                    <div class="pagination-style1">
                        <!-- روابط التصفح -->
                        @if ($posts->hasPages())
                            <ul class="clearfix">
                                <!-- رابط الصفحة السابقة -->
                                @if ($posts->onFirstPage())
                                    <li class="prev disabled"><span> <i class="fa fa-angle-left"></i> </span>
                                    </li>
                                @else
                                    <li class="prev"><a href="{{ $posts->previousPageUrl() }}"><span> <i
                                                    class="fa fa-angle-left"></i> </span></a></li>
                                @endif

                                <!-- روابط الصفحات -->
                                @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                    @if ($page == $posts->currentPage())
                                        <li class="active"><a href="javascript:;">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                <!-- رابط الصفحة التالية -->
                                @if ($posts->hasMorePages())
                                    <li class="next"><a href="{{ $posts->nextPageUrl() }}"><span> <i
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
        <!-- OUR BLOG END -->



    </div>
    <!-- CONTENT END -->
@endsection
