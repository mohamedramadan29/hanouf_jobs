@extends('website.layouts.master')
@section('title')
    ادارة الوظائف
@endsection
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">
        @if (Session::has('Success_message'))
            @php
                toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
            @endphp
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @php
                    toastify()->error($error);
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
                            <h2 class="wt-title"> ادارة الوظائف </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}">الرئيسية </a></li>
                            <li> إدارة الوظائف</li>
                        </ul>
                    </div>

                    <!-- BREADCRUMB ROW END -->
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->


        <!-- OUR BLOG START -->
        <div class="section-full p-t120  p-b90 site-bg-white">


            <div class="container-fluid">
                <div class="row">

                    <div class="col-xl-3 col-lg-4 col-md-12 rightSidebar m-b30">

                        <div class="side-bar-st-1">

                            <div class="twm-candidate-profile-pic">
                                @if(\Illuminate\Support\Facades\Auth::guard('company')->user()->logo !='')
                                    <img
                                        src="{{asset('assets/uploads/companies/'.Auth::guard('company')->user()->logo)}}"
                                        alt="">
                                @else
                                    <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="">
                                @endif


                            </div>

                            <div class="twm-mid-content text-center">
                                <a href="{{url('company/dashboard')}}" class="twm-job-title">
                                    <h4 style="margin-bottom: 10px">  {{Auth::guard('company')->user()->name}} </h4>
                                </a>
                                <p> {{Auth::guard('company')->user()->email}} </p>
                            </div>

                            <div class="twm-nav-list-1">
                                <ul>
                                    <li><a href="{{url('company/dashboard')}}"><i class="fa fa-user"></i>ملف الشركة</a>
                                    </li>
                                    <li class="active"><a href="{{url('company/jobs')}}"><i class="fa fa-suitcase"></i>
                                            إدارة الوظائف</a></li>
                                    <li><a href="{{url('company/add-job')}}"><i class="fa fa-user"></i> اضف وظيفة جديدة
                                        </a></li>
                                    <li><a href="{{url('chat-main')}}"><i class="fa fa-credit-card"></i> المحادثات
                                        </a></li>
{{--                                    <li><a href="{{url('company/plan')}}"><i class="fa fa-credit-card"></i> ادارة الخطة--}}
{{--                                        </a></li>--}}
                                    <li><a href="{{url('company/change-password')}}"><i class="fa fa-fingerprint"></i>
                                            تغيير كلمة المرور</a></li>
                                    <li><a href="{{url('company/logout')}}"><i class="fa fa-share-square"></i> تسجيل
                                            خروج</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                        <!--Filter Short By-->
                        <div class="twm-right-section-panel site-bg-gray">
                            <form>
                                <!--Basic Information-->
                                <div class="panel panel-default">
                                    <div class="panel-heading wt-panel-heading p-a20">
                                        <h4 class="panel-tittle m-a0"><i class="fa fa-suitcase"></i>إدارة الوظائف</h4>
                                    </div>
                                    <div class="panel-body wt-panel-body m-b30 ">
                                        <div class="twm-D_table p-a20 table-responsive">
                                            @if($jobs->count() > 0)
                                                <table
                                                    class="table table-bordered twm-bookmark-list-wrap">
                                                    <thead>
                                                    <tr>
                                                        <th> العنوان</th>
                                                        <th> الراتب</th>
                                                        <th> تاريخ النشر</th>
                                                        <th> الحالة</th>
                                                        <th> العمليات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($jobs as $job)
                                                        <tr>
                                                            <td>
                                                                {{$job['title']}}
                                                            </td>
                                                            <td>
                                                                {{$job['salary']}} دولار
                                                            </td>
                                                            <td>
                                                                {{$job['created_at']}}
                                                            </td>
                                                            <td>
                                                                @if($job['status'] == 1)
                                                                    <span class="badge badge-success bg-success">نشيط</span>
                                                                @else
                                                                    <span class="badge badge-danger bg-danger"> تحت المراجعه  </span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="twm-table-controls">
                                                                    <ul class="twm-DT-controls-icon list-unstyled jobs_button_controls">
                                                                        <li>
                                                                            <a class="btn btn-primary btn-sm" href="{{url('company/job/'.$job['id'])}}"> <span
                                                                                    class="fa fa-eye"></span>  مشاهدة وتعديل الوظيفة  </a>
                                                                        </li>

                                                                        <li>
                                                                            <a class="btn btn-warning btn-sm" href="{{url('company/job/offers/'.$job['id'])}}" title=" مشاهدة المتقدمين للوظيفة  "
                                                                               > <span
                                                                                    class="fa fa-users"></span> مشاهدة المتقدمين للوظيفة  </a>
                                                                        </li>

                                                                        <li>
                                                                            <a class="btn btn-danger btn-sm" href="{{url('company/job/delete/'.$job['id'])}}"
                                                                               onclick="return confirm('هل انت متاكد من حذف الوظيفة !!!!')"
                                                                               title="حذف الوظيفة" >
                                                                                <span class="far fa-trash-alt"> حذف الوظيفة </span>
                                                                            </a>
                                                                        </li>

                                                                        @if($job['status'] == 1)
                                                                            <li>
                                                                                <a class="btn btn-info btn-sm" href="{{url('company/job/stoped/'.$job['id'])}}"
                                                                                   onclick="return confirm('هل انت متاكد من  ايقاف الاعلان !!!!')"
                                                                                   title="ايقاف الاعلان" >
                                                                                    <span class="far fa-trash-alt">  ايقاف الاعلان  </span>
                                                                                </a>
                                                                            </li>
                                                                        @endif


                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <div class="alert alert-info">
                                                    لا يوجد لديك وظائف في الوقت الحالي !!!!!
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- OUR BLOG END -->


    </div>
    <!-- CONTENT END -->
@endsection
