@extends('website.layouts.master')
@section('title')
     حساب الشركة
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
                            <h2 class="wt-title">ملف الشركة</h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية  </a></li>
                            <li>ملف الشركة</li>
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
                                    <li class="active"><a href="{{url('company/dashboard')}}"><i class="fa fa-user"></i>ملف الشركة</a></li>
                                    <li><a href="{{url('company/jobs')}}"><i class="fa fa-suitcase"></i> إدارة الوظائف</a></li>
                                    <li><a href="{{url('company/add-job')}}"><i class="fa fa-user"></i> اضف وظيفة جديدة  </a></li>
                                    <li><a href="{{url('company/chat')}}"><i class="fa fa-comments"></i> المحادثات   </a></li>
                                    <li><a href="{{url('company/plan')}}"><i class="fa fa-credit-card"></i> ادارة الخطة  </a></li>
                                    <li><a href="{{url('company/job-users')}}"><i class="fa fa-users"></i> المتقدمين للوظيفة  </a></li>
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
                                        <h4 class="panel-tittle m-a0">ملف الشركة</h4>
                                    </div>
                                    <div class="panel-body wt-panel-body p-a20 m-b30 ">

                                        <div class="row">

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> اسم الشركة</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_name" type="text" placeholder="ديفيد سميث">
                                                        <i class="fs-input-icon fa fa-building"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>الهاتف </label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_phone" type="text" placeholder="(251) 1234-456-7890">
                                                        <i class="fs-input-icon fa fa-phone-alt"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>عنوان البريد الإلكتروني</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_Email" type="email" placeholder="Devid@example.com">
                                                        <i class="fs-input-icon fas fa-at"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>موقع إلكتروني</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_website" type="text" placeholder="https://devsmith.net/">
                                                        <i class="fs-input-icon fa fa-globe-americas"></i>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>البلد </label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="الولايات المتحدة الأمريكية">
                                                        <i class="fs-input-icon fa fa-globe-americas"></i>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>مدينة</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="تكساس">
                                                        <i class="fs-input-icon fa fa-globe-americas"></i>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-12 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>شفرة البريد</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="75462">
                                                        <i class="fs-input-icon fas fa-map-pin"></i>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>العنوان الكامل</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="1363-1385 غروب الشمس الجادة أنجلوس, كاليفورنيا 90026 ، الولايات المتحدة الأمريكية">
                                                        <i class="fs-input-icon fas fa-map-marker-alt"></i>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="twm-s-map mb-5">
                                                    <h4 class="section-head-small mb-4">موقع</h4>
                                                    <div class="twm-s-map-iframe">
                                                        <iframe height="270" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.8534521658976!2d-118.2533646842856!3d34.073270780600225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c6fd9829c6f3%3A0x6ecd11bcf4b0c23a!2s1363%20Sunset%20Blvd%2C%20Los%20Angeles%2C%20CA%2090026%2C%20USA!5e0!3m2!1sen!2sin!4v1620815366832!5m2!1sen!2sin"></iframe>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>وصف</label>
                                                    <textarea class="form-control" rows="3">تحيات! عندما أخذت طابعة غير معروفة من النوع وتدافعت لتكوين كتاب عينة. وقد نجا خمسة قرون فحسب.</textarea>
                                                </div>
                                            </div>


                                            <div class="col-lg-12 col-md-12">
                                                <div class="text-left">
                                                    <button type="submit" class="site-button">احفظ التغييرات </button>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                                <!--Social Network-->
                                <div class="panel panel-default">
                                    <div class="panel-heading wt-panel-heading p-a20">
                                        <h4 class="panel-tittle m-a0">شبكة اجتماعية</h4>
                                    </div>
                                    <div class="panel-body wt-panel-body p-a20">

                                        <div class="row">

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>فيسبوك</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.facebook.com/">
                                                        <i class="fs-input-icon fab fa-facebook-f"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>تويتر</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://twitter.com/">
                                                        <i class="fs-input-icon fab fa-twitter"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>ينكدين</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://in.linkedin.com/">
                                                        <i class="fs-input-icon fab fa-linkedin-in"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>واتس اب</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.whatsapp.com/">
                                                        <i class="fs-input-icon fab fa-whatsapp"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>انستغرام</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.instagram.com/">
                                                        <i class="fs-input-icon fab fa-instagram"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>بينتيريست</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://in.pinterest.com/">
                                                        <i class="fs-input-icon fab fa-pinterest-p"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>نعرفكم</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.tumblr.com/">
                                                        <i class="fs-input-icon fab fa-tumblr"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>رابط يوتيوب</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.youtube.com/">
                                                        <i class="fs-input-icon fab fa-youtube"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
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
