@extends('website.layouts.master')
@section('title')
    المحادثات
@endsection
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center"
             style="background-image:url({{asset('assets/website/images/banner/1.jpg')}});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title">دردشة المرشح</h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{'/'}}"> الرئيسية </a></li>
                            <li>دردشة المرشح</li>
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
                                    <li><a href="{{url('company/dashboard')}}"><i class="fa fa-user"></i>ملف الشركة</a>
                                    </li>
                                    <li><a href="{{url('company/jobs')}}"><i class="fa fa-suitcase"></i> إدارة
                                            الوظائف</a></li>
                                    <li><a href="{{url('company/add-job')}}"><i class="fa fa-user"></i> اضف وظيفة جديدة
                                        </a></li>
                                    <li class="active"><a href="{{url('company/chat')}}"><i
                                                class="fa fa-credit-card"></i> المحادثات </a></li>
                                    <li><a href="{{url('company/plan')}}"><i class="fa fa-credit-card"></i> ادارة الخطة
                                        </a></li>
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
                            <div class="wt-admin-dashboard-msg-2  twm-dashboard-style-2">
                                <!--Left Msg section-->
                                <div class="wt-dashboard-msg-user-list">
                                    <div class="user-msg-list-btn-outer">
                                        <button class="user-msg-list-btn-close">يغلق</button>
                                        <button class="user-msg-list-btn-open">رسالة المستخدم</button>
                                    </div>
                                    <!-- Search Section Start-->
                                    <div class="wt-dashboard-msg-search">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Search Messages" type="text">
                                            <button class="btn" type="button"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <!-- Search Section End-->

                                    <!-- Search Section End-->
                                    <div class="msg-find-list">
                                        <select class="wt-select-box bs-select-hidden">
                                            <option>الدردشات الحديثة</option>
                                            <option>باختصار الوقت</option>
                                            <option>باختصار غير مقروء</option>
                                        </select>
                                    </div>
                                    <!-- Search Section End-->

                                    <!-- user msg list start-->
                                    <div id="msg-list-wrap" class="wt-dashboard-msg-search-list scrollbar-macosx">

                                        <div class="wt-dashboard-msg-search-list-wrap">
                                            <a href="javascript:;" class="msg-user-info clearfix">
                                                <div class="msg-user-timing">الخميس</div>
                                                <div class="msg-user-info-pic"><img src="{{asset('assets/website/images/user-avtar/pic4.jpg')}}"
                                                                                    alt=""></div>
                                                <div class="msg-user-info-text">
                                                    <div class="msg-user-name">راندال هندرسون</div>
                                                    <div class="msg-user-discription">كل شيء تم إنشاؤه من قبل العالم
                                                        لدينا
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="wt-dashboard-msg-search-list-wrap">
                                            <a href="javascript:;" class="msg-user-info clearfix">
                                                <div class="msg-user-timing">2 منذ ساعات</div>
                                                <div class="msg-user-info-pic"><img src="{{asset('assets/website/images/user-avtar/pic1.jpg')}}"
                                                                                    alt=""></div>
                                                <div class="msg-user-info-text">
                                                    <div class="msg-user-name">فوهة روستين</div>
                                                    <div class="msg-user-discription">كل شيء تم إنشاؤه من قبل العالم
                                                        لدينا
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="wt-dashboard-msg-search-list-wrap">
                                            <a href="javascript:;" class="msg-user-info clearfix">
                                                <div class="msg-user-timing">4 منذ ساعات</div>
                                                <div class="msg-user-info-pic"><img src="{{asset('assets/website/images/user-avtar/pic2.jpg')}}"
                                                                                    alt=""></div>
                                                <div class="msg-user-info-text">
                                                    <div class="msg-user-name">بيتر هوكينز</div>
                                                    <div class="msg-user-discription">كل شيء تم إنشاؤه من قبل العالم
                                                        لدينا
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="wt-dashboard-msg-search-list-wrap">
                                            <a href="javascript:;" class="msg-user-info clearfix">
                                                <div class="msg-user-timing">الجمعة</div>
                                                <div class="msg-user-info-pic"><img src="{{asset('assets/website/images/user-avtar/pic3.jpg')}}"
                                                                                    alt=""></div>
                                                <div class="msg-user-info-text">
                                                    <div class="msg-user-name">رالف جونسون</div>
                                                    <div class="msg-user-discription">كل شيء تم إنشاؤه من قبل العالم
                                                        لدينا
                                                    </div>
                                                </div>
                                            </a>
                                        </div>


                                        <div class="wt-dashboard-msg-search-list-wrap">
                                            <a href="javascript:;" class="msg-user-info clearfix">
                                                <div class="msg-user-timing">16/07/2023</div>
                                                <div class="msg-user-info-pic"><img src="{{asset('assets/website/images/user-avtar/pic1.jpg')}}"
                                                                                    alt=""></div>
                                                <div class="msg-user-info-text">
                                                    <div class="msg-user-name">راندال وارن</div>
                                                    <div class="msg-user-discription">كل شيء تم إنشاؤه من قبل العالم
                                                        لدينا
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="wt-dashboard-msg-search-list-wrap">
                                            <a href="javascript:;" class="msg-user-info clearfix">
                                                <div class="msg-user-timing">16/07/2023</div>
                                                <div class="msg-user-info-pic"><img src="{{asset('assets/website/images/user-avtar/pic2.jpg')}}"
                                                                                    alt=""></div>
                                                <div class="msg-user-info-text">
                                                    <div class="msg-user-name">كريستينا فيشر</div>
                                                    <div class="msg-user-discription">كل شيء تم إنشاؤه من قبل العالم
                                                        لدينا
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="wt-dashboard-msg-search-list-wrap">
                                            <a href="javascript:;" class="msg-user-info clearfix">
                                                <div class="msg-user-timing">16/07/2023</div>
                                                <div class="msg-user-info-pic"><img src="images/user-avtar/pic3.jpg"
                                                                                    alt=""></div>
                                                <div class="msg-user-info-text">
                                                    <div class="msg-user-name">واندا ويليس</div>
                                                    <div class="msg-user-discription">كل شيء تم إنشاؤه من قبل العالم
                                                        لدينا
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="wt-dashboard-msg-search-list-wrap">
                                            <a href="javascript:;" class="msg-user-info clearfix">
                                                <div class="msg-user-timing">16/07/2023</div>
                                                <div class="msg-user-info-pic"><img src="images/user-avtar/pic4.jpg"
                                                                                    alt=""></div>
                                                <div class="msg-user-info-text">
                                                    <div class="msg-user-name">بيتر هوكينز</div>
                                                    <div class="msg-user-discription">كل شيء تم إنشاؤه من قبل العالم
                                                        لدينا
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="wt-dashboard-msg-search-list-wrap">
                                            <a href="javascript:;" class="msg-user-info clearfix">
                                                <div class="msg-user-timing">16/07/2023</div>
                                                <div class="msg-user-info-pic"><img src="images/user-avtar/pic1.jpg"
                                                                                    alt=""></div>
                                                <div class="msg-user-info-text">
                                                    <div class="msg-user-name">كاثلين مورينو</div>
                                                    <div class="msg-user-discription">كل شيء تم إنشاؤه من قبل العالم
                                                        لدينا
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="wt-dashboard-msg-search-list-wrap">
                                            <a href="javascript:;" class="msg-user-info clearfix">
                                                <div class="msg-user-timing">16/07/2023</div>
                                                <div class="msg-user-info-pic"><img src="images/user-avtar/pic2.jpg"
                                                                                    alt=""></div>
                                                <div class="msg-user-info-text">
                                                    <div class="msg-user-name">واندا مونتغمري</div>
                                                    <div class="msg-user-discription">كل شيء تم إنشاؤه من قبل العالم
                                                        لدينا
                                                    </div>
                                                </div>
                                            </a>
                                        </div>


                                    </div>
                                    <!-- user msg list End-->

                                </div>

                                <!--Right Msg section-->
                                <div class="wt-dashboard-msg-box">
                                    <div class="single-msg-user-name-box">
                                        <div class="single-msg-short-discription">
                                            <h4 class="single-msg-user-name">راندال هندرسون </h4>
                                            مقاول تكنولوجيا المعلومات
                                        </div>
                                        <a href="#" class="message-action"><i class="far fa-trash-alt"></i> مسح المحادثة</a>
                                    </div>
                                    <div id="msg-chat-wrap" class="single-user-msg-conversation scrollbar-macosx">

                                        <div class="single-user-comment-wrap">
                                            <div class="row">
                                                <div class="col-xl-9 col-lg-12">
                                                    <div class="single-user-comment-block clearfix">
                                                        <div class="single-user-com-pic"><img
                                                                src="{{asset('assets/website/images/user-avtar/pic4.jpg')}}" alt=""></div>
                                                        <div class="single-user-com-text">يبدأ كسر الدورة التي لا نهاية
                                                            لمحادثات الرسائل النصية التي لا معنى لها بالتحدث فقط مع شخص
                                                            يقدم آراء مواضيع مثيرة للاهتمام.
                                                        </div>
                                                        <div class="single-user-msg-time">12:13 مساءً</div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="single-user-comment-wrap sigle-user-reply">
                                            <div class="row justify-content-end">
                                                <div class="col-xl-9 col-lg-12">
                                                    <div class="single-user-comment-block clearfix">
                                                        <div class="single-user-com-pic"><img
                                                                src="{{asset('assets/website/images/user-avtar/pic1.jpg')}}" alt=""></div>
                                                        <div class="single-user-com-text">هناك العديد من الاختلافات في
                                                            مقاطع المتاحة ، ولكن الغالبية عانت من تغيير في شكل ما ، عن
                                                            طريق حقن الفكاهة.
                                                        </div>
                                                        <div class="single-user-msg-time">12:37 مساءً</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-user-comment-wrap">
                                            <div class="row">
                                                <div class="col-xl-9 col-lg-12">
                                                    <div class="single-user-comment-block clearfix">
                                                        <div class="single-user-com-pic"><img
                                                                src="{{asset('assets/website/images/user-avtar/pic4.jpg')}}" alt=""></div>
                                                        <div class="single-user-com-text">يبدأ كسر الدورة التي لا نهاية
                                                            لمحادثات الرسائل النصية التي لا معنى لها بالتحدث فقط مع شخص
                                                            يقدم آراء مواضيع مثيرة للاهتمام.
                                                        </div>
                                                        <div class="single-user-msg-time">12:13 مساءً</div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="single-user-comment-wrap sigle-user-reply">
                                            <div class="row justify-content-end">
                                                <div class="col-xl-9 col-lg-12">
                                                    <div class="single-user-comment-block clearfix">
                                                        <div class="single-user-com-pic"><img
                                                                src="{{asset('assets/website/images/user-avtar/pic1.jpg')}}" alt=""></div>
                                                        <div class="single-user-com-text">هناك العديد من الاختلافات في
                                                            مقاطع المتاحة ، ولكن الغالبية عانت من تغيير في شكل ما ، عن
                                                            طريق حقن الفكاهة.
                                                        </div>
                                                        <div class="single-user-msg-time">12:37 مساءً</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-user-comment-wrap">
                                            <div class="row">
                                                <div class="col-xl-9 col-lg-12">
                                                    <div class="single-user-comment-block clearfix">
                                                        <div class="single-user-com-pic"><img
                                                                src="{{asset('assets/website/images/user-avtar/pic4.jpg')}}" alt=""></div>
                                                        <div class="single-user-com-text">يبدأ كسر الدورة التي لا نهاية
                                                            لمحادثات الرسائل النصية التي لا معنى لها بالتحدث فقط مع شخص
                                                            يقدم آراء مواضيع مثيرة للاهتمام.
                                                        </div>
                                                        <div class="single-user-msg-time">12:13 مساءً</div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="single-user-comment-wrap sigle-user-reply">
                                            <div class="row justify-content-end">
                                                <div class="col-xl-9 col-lg-12">
                                                    <div class="single-user-comment-block clearfix">
                                                        <div class="single-user-com-pic"><img
                                                                src="{{asset('assets/website/images/user-avtar/pic1.jpg')}}" alt=""></div>
                                                        <div class="single-user-com-text">هناك العديد من الاختلافات في
                                                            مقاطع المتاحة ، ولكن الغالبية عانت من تغيير في شكل ما ، عن
                                                            طريق حقن الفكاهة.
                                                        </div>
                                                        <div class="single-user-msg-time">12:37 مساءً</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-msg-reply-comment">
                                        <div class="input-group">
                                            <textarea class="form-control" placeholder="اكتب رسالة هنا"></textarea>
                                            <button class="btn" type="button"><i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </div>

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
