@extends('website.layouts.master')
@section('title')
    تخير
    |
   {{\Illuminate\Support\Facades\Auth::user()->name}}
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
                            <li>تعديل النبذة شخصية  </li>
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
                                    <li class="active"><a href="{{url('user/dashboard')}}"><i class="fa fa-user"></i>
                                            تعديل النبذة شخصية
                                        </a></li>
                                    <li><a href="{{url('user/update')}}"><i class="fa fa-edit"></i> تعديل معلوماتي المهنية  </a></li>

                                    <li><a href="{{url('chat-main')}}"><i class="fa fa-comments"></i> المحادثات </a>
                                    </li>

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
                        <!--Filter Short By-->
                        @if(isset($compelete_info) && $compelete_info !='')
                            <div class="alert alert-danger">  {{$compelete_info}} </div>
                        @endif
                        <div class="twm-right-section-panel site-bg-gray">
                            <form id="offerForm" method="post" action="{{url('user/update_info')}}" enctype="multipart/form-data">
                                @csrf
                                <!--Basic Information-->
                                <div class="panel panel-default">
                                    <div class="panel-heading wt-panel-heading p-a20">
                                        <h4 class="panel-tittle m-a0"> المعلومات الاساسية </h4>
                                    </div>
                                    <div class="panel-body wt-panel-body p-a20 m-b30 ">

                                        <div class="row">

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>  الاسم  </label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="name" type="text"
                                                               value="{{Auth::user()->name}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> اسم المستخدم </label>
                                                    <div class="ls-inputicon-box">
                                                        <input disabled readonly class="form-control" name="username"
                                                               type="text"
                                                               value="{{Auth::user()->username}}">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> البريد الإلكتروني</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="email" type="email"
                                                               value="{{Auth::user()->email}}">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>الهاتف </label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="mobile" type="text"
                                                               value="{{Auth::user()->mobile}}">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>  نبذة عني  </label>
                                                    <textarea name="info" class="form-control"
                                                              rows="3">{{Auth::user()->info}}</textarea>
                                                </div>
                                            </div>

                                            @if(Auth::user()->cv != '')

                                                <div class="col-xl-6 col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label> مشاهدة السيرة الذاتية  </label>
                                                        <a target="_blank" href="{{asset('assets/uploads/userscv/'.\Illuminate\Support\Facades\Auth::user()->cv)}}" type="button"
                                                                class="btn btn-primary uploadFiles"> مشاهدة السيرة الذاتية   <i
                                                                class="fa fa-download"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                            @endif

                                            <div class="form-group">
                                                <label> تعديل السيرة الذاتية  </label>
                                                <br>
                                                <input type="file" name="cv"
                                                       class="form-control"
                                                       accept=".pdf, .doc, .docx"
                                                       id="fileInput" multiple
                                                       style="display: none;">
                                                <button type="button"
                                                        class="btn btn-primary uploadFiles"
                                                        id="uploadButton"> رفع السيرة الذاتية  <i
                                                        class="fa fa-upload"></i>
                                                </button>
                                                <span id="fileNames" class="span_info">لم يتم اختيار ملفات بعد</span>
                                                <span class="span_info">الامتدادات المسموحة: pdf, doc, docx. الحجم الأقصى للملف 50MB</span>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="upload-btn-wrapper">
                                                        <div id="upload-image-grid">
                                                            @if(\Illuminate\Support\Facades\Auth::user()->logo !='')
                                                                <img
                                                                    src="{{asset('assets/uploads/users/'.Auth::user()->logo)}}"
                                                                    alt="">
                                                            @else
                                                                <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="">
                                                            @endif
                                                        </div>
                                                        <button class="site-button button-sm"> حدد الصورة </button>
                                                        <input type="file" name="logo" id="file-uploader"
                                                               accept=".jpg, .jpeg, .png">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="text-left">
                                                    <button id="submitBtn" type="submit" class="site-button">احفظ التغييرات</button>
                                                    <span id="loader"
                                                          style="display: none;">جاري حفظ التغيرات ...</span>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                            </form>


                            <script>
                                document.getElementById('offerForm').addEventListener('submit', function (event) {
                                    document.getElementById('submitBtn').disabled = true; // تعطيل زر الإرسال
                                    document.getElementById('submitBtn').style.display = 'none'; // إخفاء زر الإرسال
                                    document.getElementById('loader').style.display = 'inline'; // إظهار مؤشر التحميل
                                });
                            </script>

                            <script>
                                document.getElementById('uploadButton').addEventListener('click', function () {
                                    document.getElementById('fileInput').click();
                                });

                                document.getElementById('fileInput').addEventListener('change', function () {
                                    var input = document.getElementById('fileInput');
                                    var output = document.getElementById('fileNames');
                                    var fileNames = [];
                                    for (var i = 0; i < input.files.length; i++) {
                                        fileNames.push(input.files[i].name);
                                    }
                                    output.textContent = fileNames.length > 0 ? fileNames.join(', ') : 'لم يتم اختيار ملفات بعد';
                                });
                            </script>

                            <style>
                                .uploadFiles {
                                    padding: 10px 20px;
                                    border-radius: 5px;
                                    cursor: pointer;
                                    background: transparent;
                                    color: var(--main-color);
                                    border-color: var(--main-color);
                                    outline: none;
                                }

                                .uploadFiles:hover {
                                    background: transparent;
                                    color: var(--main-color);
                                    border-color: var(--main-color);
                                }

                                #fileNames {
                                    display: block;
                                    margin-top: 10px;
                                    color: #333;
                                    font-size: 14px
                                }

                                #loader {
                                    font-size: 16px;
                                    color: var(--main-color);
                                }
                            </style>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- OUR BLOG END -->


    </div>
    <!-- CONTENT END -->
@endsection
