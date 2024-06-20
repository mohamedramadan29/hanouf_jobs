@extends('website.layouts.master')
@section('title')
    حساب الشركة
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
                            <h2 class="wt-title"> {{Auth::guard('company')->user()->name }} </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li> حساب الشركة</li>
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
                                @if(\Illuminate\Support\Facades\Auth::guard('company')->user()->logo !='')
                                    <img
                                        src="{{asset('assets/uploads/companies/'.Auth::guard('company')->user()->logo)}}"
                                        alt="">
                                @else
                                    <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="">
                                @endif


                            </div>

                            <div class="twm-mid-content text-center" style="margin-bottom: 15px">
                                <a href="{{url('company/dashboard')}}" class="twm-job-title">
                                    <h4 style="margin-bottom: 10px">  {{Auth::guard('company')->user()->name}} </h4>
                                </a>
                                <p> {{Auth::guard('company')->user()->email}} </p>
                            </div>

                            <div class="twm-nav-list-1">
                                <ul>
                                    <li class="active"><a href="{{url('company/dashboard')}}"><i class="fa fa-user"></i>ملف
                                            الشركة</a></li>
                                    <li><a href="{{url('company/jobs')}}"><i class="fa fa-suitcase"></i> إدارة
                                            الوظائف</a></li>
                                    <li><a href="{{url('company/add-job')}}"><i class="fa fa-user"></i> اضف وظيفة جديدة
                                        </a></li>
                                    <li><a href="{{url('company/chat')}}"><i class="fa fa-comments"></i> المحادثات </a>
                                    </li>
                                    <li><a href="{{url('company/plan')}}"><i class="fa fa-credit-card"></i> ادارة الخطة
                                        </a></li>
                                    <li><a href="{{url('company/job-users')}}"><i class="fa fa-users"></i> المتقدمين
                                            للوظيفة </a></li>
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
                            <form method="post" action="{{url('company/update_info')}}" enctype="multipart/form-data">
                                @csrf
                                <!--Basic Information-->
                                <div class="panel panel-default">
                                    <div class="panel-heading wt-panel-heading p-a20">
                                        <h4 class="panel-tittle m-a0"> حساب الشركة </h4>
                                    </div>
                                    <div class="panel-body wt-panel-body p-a20 m-b30 ">

                                        <div class="row">

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> اسم الشركة</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="name" type="text"
                                                               value="{{Auth::guard('company')->user()->name}}">
                                                        <i class="fs-input-icon fa fa-building"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> اسم المستخدم </label>
                                                    <div class="ls-inputicon-box">
                                                        <input disabled readonly class="form-control" name="username"
                                                               type="text"
                                                               value="{{Auth::guard('company')->user()->username}}">
                                                        <i class="fs-input-icon fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> البريد الإلكتروني</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="email" type="email"
                                                               value="{{Auth::guard('company')->user()->email}}">
                                                        <i class="fs-input-icon fas fa-at"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>الهاتف </label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="mobile" type="text"
                                                               value="{{Auth::guard('company')->user()->mobile}}">
                                                        <i class="fs-input-icon fa fa-phone-alt"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> نبذة عن الشركة </label>
                                                    <textarea name="info" class="form-control"
                                                              rows="3">{{Auth::guard('company')->user()->info}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="upload-btn-wrapper">
                                                        <div id="upload-image-grid">
                                                            @if(\Illuminate\Support\Facades\Auth::guard('company')->user()->logo !='')
                                                                <img
                                                                    src="{{asset('assets/uploads/companies/'.Auth::guard('company')->user()->logo)}}"
                                                                    alt="">
                                                            @else
                                                                <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="">
                                                            @endif
                                                        </div>
                                                        <button class="site-button button-sm"> حدد صورة الشركة</button>
                                                        <input type="file" name="logo" id="file-uploader"
                                                               accept=".jpg, .jpeg, .png">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="text-left">
                                                    <button type="submit" class="site-button">احفظ التغييرات</button>
                                                </div>
                                            </div>


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
