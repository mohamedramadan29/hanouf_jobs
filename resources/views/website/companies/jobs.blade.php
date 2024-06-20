@extends('website.layouts.master')
@section('title')
     ادارة الوظائف
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
                            <h2 class="wt-title">الشركة إدارة الوظائف</h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}">الرئيسية </a></li>
                            <li>الشركة إدارة الوظائف</li>
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
                                    <li class="active"><a href="{{url('company/jobs')}}"><i class="fa fa-suitcase"></i> إدارة الوظائف</a></li>
                                    <li><a href="{{url('company/add-job')}}"><i class="fa fa-user"></i> اضف وظيفة جديدة  </a></li>
                                    <li><a href="{{url('company/chat')}}"><i class="fa fa-credit-card"></i> المحادثات   </a></li>
                                    <li><a href="{{url('company/plan')}}"><i class="fa fa-credit-card"></i> ادارة الخطة  </a></li>
                                    <li><a href="{{url('company/change-password')}}"><i class="fa fa-fingerprint"></i> تغيير كلمة المرور</a></li>
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
                                        <h4 class="panel-tittle m-a0"><i class="fa fa-suitcase"></i>إدارة الوظائف</h4>
                                    </div>
                                    <div class="panel-body wt-panel-body m-b30 ">
                                        <div class="twm-D_table p-a20 table-responsive">
                                            <table id="jobs_bookmark_table" class="table table-bordered twm-bookmark-list-wrap">
                                                <thead>
                                                <tr>
                                                    <th>مسمى وظيفي</th>
                                                    <th>فئة</th>
                                                    <th>أنواع الوظائف</th>
                                                    <th>التطبيقات</th>
                                                    <th>تاريخ</th>
                                                    <th> العمل</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <!--1-->
                                                <tr>
                                                    <td>
                                                        <div class="twm-bookmark-list">

                                                            <div class="twm-mid-content">
                                                                <a href="#" class="twm-job-title">
                                                                    <h4>مصمم ويب كبير</h4>
                                                                    <p class="twm-bookmark-address">
                                                                        <i class="feather-map-pin"></i> ساكرامنتو ، كاليفورنيا
                                                                    </p>
                                                                </a>

                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td>مصمم الويب</td>
                                                    <td><div class="twm-jobs-category"><span class="twm-bg-green">دوام جزئى</span></div></td>
                                                    <td><a href="javascript:;" class="site-text-primary">03 تطبيق</a></td>
                                                    <td>
                                                        <span class="text-clr-green2">نشيط</span>
                                                    </td>

                                                    <td>
                                                        <div class="twm-table-controls">
                                                            <ul class="twm-DT-controls-icon list-unstyled">
                                                                <li>
                                                                    <button title="View profile" type="button" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="fa fa-eye"></span>
                                                                    </button>
                                                                </li>

                                                                <li>
                                                                    <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="far fa-trash-alt"></span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--2-->
                                                <tr>
                                                    <td>
                                                        <div class="twm-bookmark-list">

                                                            <div class="twm-mid-content">
                                                                <a href="#" class="twm-job-title">
                                                                    <h4>الأب فني الأسهم المتداول</h4>
                                                                    <p class="twm-bookmark-address">
                                                                        <i class="feather-map-pin"></i>ساكرامنتو ، كاليفورنيا
                                                                    </p>
                                                                </a>

                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td>مدير الانتاج</td>
                                                    <td><div class="twm-jobs-category"><span class="twm-bg-brown">واجه</span></div></td>
                                                    <td><a href="javascript:;" class="site-text-primary">05مُطبَّق</a></td>
                                                    <td>
                                                        <span class="text-clr-green2">نشيط</span>
                                                    </td>

                                                    <td>
                                                        <div class="twm-table-controls">
                                                            <ul class="twm-DT-controls-icon list-unstyled">
                                                                <li>
                                                                    <button title="View profile" type="button" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="fa fa-eye"></span>
                                                                    </button>
                                                                </li>

                                                                <li>
                                                                    <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="far fa-trash-alt"></span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--3-->
                                                <tr>
                                                    <td>
                                                        <div class="twm-bookmark-list">

                                                            <div class="twm-mid-content">
                                                                <a href="#" class="twm-job-title">
                                                                    <h4>مدير قسم تكنولوجيا المعلومات</h4>
                                                                    <p class="twm-bookmark-address">
                                                                        <i class="feather-map-pin"></i> ساكرامنتو ، كاليفورنيا
                                                                    </p>
                                                                </a>

                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td>مطور بي أتش بي</td>
                                                    <td><div class="twm-jobs-category"><span class="twm-bg-purple">وقت كامل</span></div></td>
                                                    <td><a href="javascript:;" class="site-text-primary">06مُطبَّق</a></td>
                                                    <td>
                                                        <span class="text-clr-red">يرفض</span>
                                                    </td>

                                                    <td>
                                                        <div class="twm-table-controls">
                                                            <ul class="twm-DT-controls-icon list-unstyled">
                                                                <li>
                                                                    <button title="View profile" type="button" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="fa fa-eye"></span>
                                                                    </button>
                                                                </li>

                                                                <li>
                                                                    <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="far fa-trash-alt"></span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--4-->
                                                <tr>
                                                    <td>
                                                        <div class="twm-bookmark-list">

                                                            <div class="twm-mid-content">
                                                                <a href="#" class="twm-job-title">
                                                                    <h4>أخصائي إنتاج الفن</h4>
                                                                    <p class="twm-bookmark-address">
                                                                        <i class="feather-map-pin"></i>ساكرامنتو ، كاليفورنيا
                                                                    </p>
                                                                </a>

                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td>مصمم المنتج</td>
                                                    <td><div class="twm-jobs-category"><span class="twm-bg-sky">مستقل</span></div></td>
                                                    <td><a href="javascript:;" class="site-text-primary">13 مُطبَّق</a></td>
                                                    <td>
                                                        <span class="text-clr-green2">نشيط</span>
                                                    </td>

                                                    <td>
                                                        <div class="twm-table-controls">
                                                            <ul class="twm-DT-controls-icon list-unstyled">
                                                                <li>
                                                                    <button title="View profile" type="button" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="fa fa-eye"></span>
                                                                    </button>
                                                                </li>

                                                                <li>
                                                                    <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="far fa-trash-alt"></span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--5-->
                                                <tr>
                                                    <td>
                                                        <div class="twm-bookmark-list">

                                                            <div class="twm-mid-content">
                                                                <a href="#" class="twm-job-title">
                                                                    <h4>عامل الترفيه واللياقة</h4>
                                                                    <p class="twm-bookmark-address">
                                                                        <i class="feather-map-pin"></i>ساكرامنتو ، كاليفورنيا
                                                                    </p>
                                                                </a>

                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td>مدرب الصالة الرياضية</td>
                                                    <td><div class="twm-jobs-category"><span class="twm-bg-golden">مؤقت</span></div></td>
                                                    <td><a href="javascript:;" class="site-text-primary">08مُطبَّق</a></td>
                                                    <td>
                                                        <span class="text-clr-yellow">قيد الانتظار</span>
                                                    </td>

                                                    <td>
                                                        <div class="twm-table-controls">
                                                            <ul class="twm-DT-controls-icon list-unstyled">
                                                                <li>
                                                                    <button title="View profile" type="button" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="fa fa-eye"></span>
                                                                    </button>
                                                                </li>

                                                                <li>
                                                                    <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="far fa-trash-alt"></span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--6-->
                                                <tr>
                                                    <td>
                                                        <div class="twm-bookmark-list">

                                                            <div class="twm-mid-content">
                                                                <a href="#" class="twm-job-title">
                                                                    <h4>مصمم ويب كبير</h4>
                                                                    <p class="twm-bookmark-address">
                                                                        <i class="feather-map-pin"></i> ساكرامنتو ، كاليفورنيا
                                                                    </p>
                                                                </a>

                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td>مصمم الويب</td>
                                                    <td><div class="twm-jobs-category"><span class="twm-bg-green">جديد</span></div></td>
                                                    <td><a href="javascript:;" class="site-text-primary">14مُطبَّق</a></td>
                                                    <td>
                                                        <span class="text-clr-yellow">قيد الانتظار</span>
                                                    </td>

                                                    <td>
                                                        <div class="twm-table-controls">
                                                            <ul class="twm-DT-controls-icon list-unstyled">
                                                                <li>
                                                                    <button title="View profile" type="button" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="fa fa-eye"></span>
                                                                    </button>
                                                                </li>

                                                                <li>
                                                                    <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="far fa-trash-alt"></span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--7-->
                                                <tr>
                                                    <td>
                                                        <div class="twm-bookmark-list">

                                                            <div class="twm-mid-content">
                                                                <a href="#" class="twm-job-title">
                                                                    <h4>الأب فني الأسهم المتداول</h4>
                                                                    <p class="twm-bookmark-address">
                                                                        <i class="feather-map-pin"></i>ساكرامنتو ، كاليفورنيا
                                                                    </p>
                                                                </a>

                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td>مدير الإنتاج</td>
                                                    <td><div class="twm-jobs-category"><span class="twm-bg-green">جديد</span></div></td>
                                                    <td><a href="javascript:;" class="site-text-primary">10مُطبَّق</a></td>
                                                    <td>
                                                        <span class="text-clr-green2">نشيط</span>
                                                    </td>

                                                    <td>
                                                        <div class="twm-table-controls">
                                                            <ul class="twm-DT-controls-icon list-unstyled">
                                                                <li>
                                                                    <button title="View profile" type="button" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="fa fa-eye"></span>
                                                                    </button>
                                                                </li>

                                                                <li>
                                                                    <button title="Delete" data-bs-toggle="tooltip" data-bs-placement="top">
                                                                        <span class="far fa-trash-alt"></span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>مسمى وظيفي</th>
                                                    <th>فئة</th>
                                                    <th>أنواع الوظائف</th>
                                                    <th>التطبيقات</th>
                                                    <th>تاريخ</th>
                                                    <th>فعل</th>
                                                </tr>
                                                </tfoot>
                                            </table>
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
