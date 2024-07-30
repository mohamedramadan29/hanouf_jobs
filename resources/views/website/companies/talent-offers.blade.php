@extends('website.layouts.master')
@section('title')
    قائمة المتقديمن الي الوظيفة | تخير
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
                            <h2 class="wt-title"> قائمة المتقديمن الي وظيفة :: {{ $adv['title']  }}</h2>

                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li> قائمة المتقديمن الي الوظيفة</li>
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

                    <div class="col-lg-12 col-md-12">
                        <!--Filter Short By-->
                        <div class="product-filter-wrap d-flex justify-content-between align-items-center m-b30">
                            <span
                                class="woocommerce-result-count-left">    عدد المتقدمين ::<span> {{$count_offers}} </span>   </span>
                        </div>

                        <div class="twm-candidates-list-wrap offers_page">
                            <ul>
                                @foreach($offers as $offer)
                                    <li>
                                        <div class="twm-candidates-list-style1 mb-5">
                                            <div class="twm-media">
                                                <div class="twm-media-pic">
                                                    <img src="{{asset('assets/uploads/users/'.$offer['user']['logo'])}}"
                                                         alt="#">
                                                </div>
                                            </div>
                                            <div class="twm-mid-content">
                                                <a href="{{url('talent-details/'.$offer['user']['username'])}}"
                                                   class="twm-job-title">
                                                    <h4> {{$offer['user']['name']}} </h4>
                                                </a>
                                                @php
                                                    $job_name = \App\Models\admin\Jobsname::where('id',$offer['user']['job_name'])->first();
                                                @endphp
                                                <p> {{$job_name['title']}} </p>

                                                <div class="twm-fot-content">
                                                    <div class="twm-left-info d-block">
                                                        <p>
                                                            {{$offer['cover_letter']}}
                                                        </p>
                                                        <br>
                                                        @if($offer['cover_files'] !=null)
                                                            <div class="">
                                                                <h6 style="font-weight: bold;margin-bottom: 10px;">
                                                                    المرفقات </h6>
                                                                @php
                                                                    $coverFiles = json_decode($offer->cover_files);
                                                                @endphp
                                                                <div class="d-flex">
                                                                    @foreach($coverFiles as $file)
                                                                        <a style="margin:5px"
                                                                           class="btn btn-secondary btn-sm"
                                                                           href="{{asset('assets/uploads/JobOfferFiles/'.$file)}}"
                                                                           target="_blank">{{ basename($file) }} <i
                                                                                class="fa fa-file"></i> </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="twm-right-btn">

                                                        @if($offer['offer_status'] == null || $offer['offer_status'] == '')
                                                            <a href="{{url('talent-details/'.$offer['user']['username'])}}"
                                                               class="btn btn-primary btn-sm"> تفاصيل المتقدم<i
                                                                    class="fa fa-eye"></i> </a>
                                                            <a href="{{url('company/chat/'.$offer['id'].'-'.$offer['user']['username'])}}"
                                                               class="btn btn-success btn-sm"><i
                                                                    class="fa fa-comment"></i> محاثة
                                                            </a>
                                                            <a href="{{url('company/offer/unaccepted/'.$offer['id'])}}"
                                                               class="btn btn-danger btn-sm"><i class="">X</i> رفض العرض</a>
                                                        @elseif($offer['offer_status'] == 'مرفوض')
                                                            <button
                                                                class="btn btn-danger btn-sm"><i class="">X</i> تم رفض
                                                                العرض
                                                            </button>
                                                            <a href="{{url('company/chat/'.$offer['id'].'-'.$offer['user']['username'])}}"
                                                               class="btn btn-success btn-sm"><i
                                                                    class="fa fa-comment"></i> محاثة
                                                            </a>
                                                        @elseif($offer['offer_status'] == 'مقبول')
                                                            <button
                                                                class="btn btn-success btn-sm"><i
                                                                    class="fa fa-check"></i> تم قبول العرض
                                                            </button>
                                                            <a href="{{url('company/chat/'.$offer['id'].'-'.$offer['user']['username'])}}"
                                                               class="btn btn-success btn-sm"><i
                                                                    class="fa fa-comment"></i> محاثة
                                                            </a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="pagination-outer">
                            <div class="pagination-style1">
                                <!-- روابط التصفح -->
                                @if ($offers->hasPages())
                                    <ul class="clearfix">
                                        <!-- رابط الصفحة السابقة -->
                                        @if ($offers->onFirstPage())
                                            <li class="prev disabled"><span> <i class="fa fa-angle-left"></i> </span>
                                            </li>
                                        @else
                                            <li class="prev"><a href="{{ $offers->previousPageUrl() }}"><span> <i
                                                            class="fa fa-angle-left"></i> </span></a></li>
                                        @endif

                                        <!-- روابط الصفحات -->
                                        @foreach ($offers->getUrlRange(1, $offers->lastPage()) as $page => $url)
                                            @if ($page == $offers->currentPage())
                                                <li class="active"><a href="javascript:;">{{ $page }}</a></li>
                                            @else
                                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        <!-- رابط الصفحة التالية -->
                                        @if ($offers->hasMorePages())
                                            <li class="next"><a href="{{ $offers->nextPageUrl() }}"><span> <i
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
