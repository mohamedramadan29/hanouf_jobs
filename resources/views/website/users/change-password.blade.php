@extends('website.layouts.master')
@section('title')
    تغير كلمة المرور
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
                            <li> تغير كلمة المرور</li>
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
                                    <li><a href="{{url('user/update')}}"><i class="fa fa-edit"></i> تعديل معلوماتي المهنية
                                        </a></li>

                                    <li><a href="{{url('chat-main')}}"><i class="fa fa-comments"></i> المحادثات </a>
                                    </li>


                                    <li><a href="{{url('user/alerts')}}"><i class="fa fa-bell"></i>   تنبيهات مهمة
                                        </a></li>

                                    <li class="active"><a href="{{url('user/change-password')}}"><i
                                                class="fa fa-fingerprint"></i>
                                            تغيير كلمة المرور</a></li>
                                    <li><a href="{{url('user/logout')}}"><i class="fa fa-share-square"></i> تسجيل
                                            خروج</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                        <!--Filter Short By-->
                        <div class="twm-right-section-panel site-bg-gray">
                            <form method="post" action="{{url('user/change-password')}}">
                                @csrf
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
                                                        <input class="form-control wt-form-control" name="old_password"
                                                               type="password" placeholder="">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>كلمة المرور الجديدة</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control" name="new_password"
                                                               type="password" placeholder="">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>تأكيد كلمة المرور الجديدة</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control"
                                                               name="confirm_password"
                                                               type="password" placeholder="">

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
