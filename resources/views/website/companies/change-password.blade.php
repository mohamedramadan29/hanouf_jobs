@extends('website.layouts.master')
@section('title')
    تغير كلمة المرور
@endsection
@section('content')



    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center" style="background-image:url({{asset('assets/website/images/banner/1.jpg')}});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title">تغيير كلمة مرور الشركة</h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li>تغيير كلمة مرور الشركة</li>
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

                                <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="">
                                <div class="upload-btn-wrapper">

                                    <div id="upload-image-grid"></div>
                                    <button class="site-button button-sm">حمل الصورة</button>
                                    <input type="file" name="myfile" id="file-uploader" accept=".jpg, .jpeg, .png">
                                </div>

                            </div>

                            <div class="twm-mid-content text-center">
                                <a href="{{url('company/dashboard')}}" class="twm-job-title">
                                    <h4>استوديو الفنان </h4>
                                </a>
                                <p>مقاول تكنولوجيا المعلومات</p>
                            </div>

                            <div class="twm-nav-list-1">
                                <ul>
                                    <li><a href="{{url('company/dashboard')}}"><i class="fa fa-user"></i>ملف الشركة</a></li>
                                    <li><a href="{{url('company/jobs')}}"><i class="fa fa-suitcase"></i> إدارة الوظائف</a></li>
                                    <li><a href="{{url('company/add-job')}}"><i class="fa fa-user"></i> اضف وظيفة جديدة  </a></li>
                                    <li><a href="{{url('company/chat')}}"><i class="fa fa-credit-card"></i> المحادثات   </a></li>
                                    <li><a href="{{url('company/plan')}}"><i class="fa fa-credit-card"></i> ادارة الخطة  </a></li>
                                    <li class="active"><a href="{{url('company/change-password')}}"><i class="fa fa-fingerprint"></i> تغيير كلمة المرور</a></li>
                                    <li><a href="{{url('company/logout')}}"><i class="fa fa-share-square"></i> تسجيل خروج</a></li>
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
                                        <h4 class="panel-tittle m-a0">تغيير كلمة المرور</h4>
                                    </div>
                                    <div class="panel-body wt-panel-body p-a20 ">

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>كلمة المرور القديمة</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control" name="company_name" type="password" placeholder="">
                                                        <i class="fs-input-icon fa fa-asterisk "></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>كلمة المرور الجديدة</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control" name="company_name" type="password" placeholder="">
                                                        <i class="fs-input-icon fa fa-asterisk"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>تأكيد كلمة المرور الجديدة</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control" name="company_name" type="password" placeholder="">
                                                        <i class="fs-input-icon fa fa-asterisk"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="text-left">
                                                    <button type="submit" class="site-button">حفظ التغييرات</button>
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
