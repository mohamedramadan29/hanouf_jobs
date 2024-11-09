@extends('website.layouts.master')
@section('title')
    الرئيسية | تخير
@endsection
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        <!--Banner Start-->
        <div class="twm-home3-banner-section site-bg-white bg-cover"
             style="background-image:url({{asset('assets/website/images/main_background.jpg')}})">
            <div class="twm-home3-inner-section">
                <div class="twm-bnr-mid-section">
                    <div class="twm-bnr-title-large">  تخيَّر للتوظيف </div>
                    <div class="twm-bnr-title-light">  لأن التميز يبدأ بالاختيار الصحيح للكفاءات والفرص العمل نحو شراكة ناجحة </div>
{{--                    <div class="hero_buttons">--}}
{{--                        <a href="{{url('jobs')}}" class="twm-jobs-browse btn"> تصفح افضل الوظائف </a>--}}
{{--                    </div>--}}
                </div>
            </div>

        </div>
        <!--Banner End-->
        <!--Banner End-->

        <!-- HOW TO GET YOUR JOB SECTION START -->
        <div class="section-full p-t120 p-b90 site-bg-light twm-how-t-get-wrap7 about_search_job">

            <div class="container">

                <div class="twm-how-t-get-section">
                    <div class="row">

                        <div class="col-xl-5 col-lg-5 col-md-12">
                            <div class="twm-how-t-get-section-left">
                                <div class="section-head left wt-small-separator-outer">
                                    <div class="wt-small-separator site-text-primary">
                                        <div> ابدأ رحلتك نحو التوظيف المثالي، سواء كنت تبحث عن كفاءات أو عن فرصة وظيفية  </div>
                                    </div>

                                    <p> إذا كنت شركة تسعى لاختيار أفضل الكفاءات أو محترفاً يبحث عن فرصة تليق بمهاراته، فمنصة "تخيَّر" تجمعك بالطرف المناسب بكل سهولة. أنشئ حسابك اليوم للحصول على إشعارات يومية مخصصة لتلبي احتياجاتك. </p>
                                    <h2 class="wt-title"> لأصحاب الأعمال: أحصل على المرشحين المثاليين لمتطلبات شركتك. </h2>
                                    <h2 class="wt-title"> للباحثين عن العمل: أكتشف فرصًا جديدة وقدم عليها بسهولة من خلال حسابك </h2>
                                </div>
                                <div class="twm-how-t-get-bottom">

                                    <div class="twm-left-icon-bx">
                                        <div class="twm-left-icon-media site-bg-primary">
                                            <i class="flaticon-bell site-text-white"></i>
                                        </div>
                                        <div class="twm-left-icon-content">
                                            <h4 class="icon-title">مقابلة جديدة</h4>
                                            <p>لديك مقابلة جديدة اليوم</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <div class="twm-how-t-get-section-right">
                                <div class="twm-media">
                                    <img src="{{asset('assets/website/images/search_job.svg')}}" alt="#">
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
        <!-- HOW TO GET YOUR JOB SECTION END -->


        <!-- HOW IT WORK SECTION START -->
        <div class="section-full p-t120 p-b90 site-bg-white twm-how-it-work-area step_to_join_job">

            <div class="container">

                <!-- TITLE START-->
                <div class="section-head center wt-small-separator-outer">
                    <div class="wt-small-separator site-text-primary">
                        <div>
                        <h2 class="sec_title">  كيف تتقدم للوظائف  </h2>
                        </div>
                    </div>

                </div>
                <!-- TITLE END-->

                <div class="twm-how-it-work-section">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="twm-w-process-steps">
                                <span class="twm-large-number">01</span>
                                <div class="twm-w-pro-top bg-clr-sky">
                                    <div class="twm-media">
                                        <span><img src="{{asset('assets/website/images/work-process/icon1.png')}}"
                                                   alt="icon1"></span>
                                    </div>
                                    <h4 class="twm-title">  أنشئ  <br>
                                        ملفك الشخصي </h4>
                                </div>
                                <p>  أنشئ حساب وأضف مهاراتك وخبراتك ونماذج أعمالك السابقة في ملفك الشخصي. </p>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="twm-w-process-steps">
                                <span class="twm-large-number">02</span>
                                <div class="twm-w-pro-top bg-clr-pink">
                                    <div class="twm-media">
                                        <span><img src="{{asset('assets/website/images/work-process/icon2.png')}}"
                                                   alt="icon1"></span>
                                    </div>
                                    <h4 class="twm-title"> تصفح <br>
                                          الوظائف </h4>
                                </div>
                                <p>  اطلع على الوظائف بمختلف التخصصات وتصفح ملفات الشركات التي لديها شواغر. </p>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="twm-w-process-steps">
                                <span class="twm-large-number">03</span>
                                <div class="twm-w-pro-top bg-clr-green">
                                    <div class="twm-media">
                                        <span><img src="{{asset('assets/website/images/work-process/icon3.png')}}"
                                                   alt="icon1"></span>
                                    </div>
                                    <h4 class="twm-title"> تقدم   <br>
                                        للوظيفة المناسبة </h4>
                                </div>
                                <p> اقرأ وصف الوظيفة واكتب خطاب التوظيف ثم قدم الطلب. </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- HOW IT WORK SECTION END -->

        <!-- HOW IT WORK SECTION START -->
        <div class="section-full p-t120 p-b90 site-bg-white twm-how-it-work-area step_to_join_job">

            <div class="container">

                <!-- TITLE START-->
                <div class="section-head center wt-small-separator-outer">
                    <div class="wt-small-separator site-text-primary">
                        <div>
                            <h2 class="sec_title">كيف تحصل على الكفاءات ؟</h2>
                        </div>
                    </div>
                </div>
                <!-- TITLE END-->

                <div class="twm-how-it-work-section">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="twm-w-process-steps">
                                <span class="twm-large-number">01</span>
                                <div class="twm-w-pro-top bg-clr-sky">
                                    <div class="twm-media">
                                        <span><img src="{{asset('assets/website/images/work-process/icon1.png')}}" alt="icon1"></span>
                                    </div>
                                    <h4 class="twm-title">أنشئ <br> حساب شركتك</h4>
                                </div>
                                <p>أنشئ حسابًا لشركتك واملأ ملفك ببياناتك الأساسية وأهدافك لتتمكن من جذب الكفاءات المناسبة.</p>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="twm-w-process-steps">
                                <span class="twm-large-number">02</span>
                                <div class="twm-w-pro-top bg-clr-pink">
                                    <div class="twm-media">
                                        <span><img src="{{asset('assets/website/images/work-process/icon2.png')}}" alt="icon1"></span>
                                    </div>
                                    <h4 class="twm-title">أعلن عن الوظائف</h4>
                                </div>
                                <p>انشر إعلانات الوظائف وحدد التخصصات المطلوبة لجذب أفضل المرشحين لشركتك.</p>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="twm-w-process-steps">
                                <span class="twm-large-number">03</span>
                                <div class="twm-w-pro-top bg-clr-green">
                                    <div class="twm-media">
                                        <span><img src="{{asset('assets/website/images/work-process/icon3.png')}}" alt="icon1"></span>
                                    </div>
                                    <h4 class="twm-title">اختر المرشحين</h4>
                                </div>
                                <p>راجع ملفات المرشحين وتواصل مع أفضلهم لتعيينهم في شركتك.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- HOW IT WORK SECTION END -->

        <!-- JOBS CATEGORIES SECTION START -->
        <div class="section-full p-t120 p-b90 site-bg-gray twm-job-categories-area">

            <div class="container">

                <div class="wt-separator-two-part">
                    <div class="row wt-separator-two-part-row">
                        <div class="col-xl-5 col-lg-5 col-md-12 wt-separator-two-part-left">
                            <!-- TITLE START-->
                            <div class="section-head left wt-small-separator-outer">
                                <div class="wt-small-separator site-text-primary">
                                    <div>وظائف حسب الاقسام</div>
                                </div>
                                <h2 class="wt-title">اختر القسم الخاصة بك</h2>
                            </div>
                            <!-- TITLE END-->
                        </div>
                    </div>
                </div>

                <div class="twm-job-categories-section">

                    <div class="job-categories-style1 m-b30">
                        <div class="owl-carousel job-categories-carousel owl-btn-left-bottom ">

                            <!-- COLUMNS 1 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-dashboard"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">9,185 وظائف</div>
                                        <a href="job-detail.html">تطوير الاعمال</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 2 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-project-management"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">3,205 وظائف</div>
                                        <a href="job-detail.html">ادارة مشروع</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 3 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-note"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">2,100 وظائف</div>
                                        <a href="job-detail.html">كاتب المحتوى</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 4 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-customer-support"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">1,500 وظائف</div>
                                        <a href="job-detail.html">خدمة الزبائن</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 5 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-bars"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">9,185 وظائف</div>
                                        <a href="job-detail.html">المحاسبة والمالية</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 6 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-user"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">3,205 وظائف</div>
                                        <a href="job-detail.html">تسويق</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 7 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-computer"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">2,100 وظائف</div>
                                        <a href="job-detail.html">التصميم والفن</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 8 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-coding"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">1,500 وظائف</div>
                                        <a href="job-detail.html">تطوير الشبكة</a>
                                    </div>
                                </div>
                            </div>


                            <!-- COLUMNS 9 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-hr"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">9,185 وظائف</div>
                                        <a href="job-detail.html">الموارد البشرية</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 10 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-healthcare"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">3,205 وظائف</div>
                                        <a href="job-detail.html">الصحة والرعاية </a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 11 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-repair"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">2,100 وظائف</div>
                                        <a href="job-detail.html">وظائف السيارات</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 12 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-teacher"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">1,500 وظائف</div>
                                        <a href="job-detail.html">التدريس / التعليم</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 13 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-bank"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">9,185 وظائف</div>
                                        <a href="job-detail.html">الخدمات المصرفية</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 14 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-deal"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">3,205 وظائف</div>
                                        <a href="job-detail.html">تسويق المبيعات</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 15 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-tray"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">2,100 وظائف</div>
                                        <a href="job-detail.html">مطعم / طعام</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 16 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-tower"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">1,500 وظائف</div>
                                        <a href="job-detail.html">الاتصالات السلكية واللاسلكية</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 17 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-lotus"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">9,185 وظائف</div>
                                        <a href="job-detail.html">مدرب لياقة</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 18 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-camera-tripod"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">3,205 وظائف</div>
                                        <a href="job-detail.html">التصوير</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 19 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-multimedia"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">2,100 وظائف</div>
                                        <a href="job-detail.html">الصوت + الموسيقى</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 20 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-contract"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">1,500 وظائف</div>
                                        <a href="job-detail.html">العقارات</a>
                                    </div>
                                </div>
                            </div>

                            <!-- COLUMNS 21 -->
                            <div class="item ">
                                <div class="job-categories-block">
                                    <div class="twm-media">
                                        <div class="flaticon-engineer"></div>
                                    </div>
                                    <div class="twm-content">
                                        <div class="twm-jobs-available">9,185 وظائف</div>
                                        <a href="job-detail.html">بناء</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="text-right job-categories-btn">
                        <a href=" {{url('jobs')}} " class=" site-button"> جميع الوظائف  </a>
                    </div>

                </div>

            </div>

        </div>


        <!-- PRICING TABLE SECTION START -->
{{--        <div class="section-full p-t120 p-b90 site-bg-white tw-pricing-area">--}}

{{--            <div class="container">--}}

{{--                <!-- TITLE START-->--}}
{{--                <div class="section-head left wt-small-separator-outer">--}}
{{--                    <div class="wt-small-separator site-text-primary">--}}
{{--                        <div>اختر خطتك</div>--}}
{{--                    </div>--}}
{{--                    <h2 class="wt-title"> حدد الخطة المناسبة لك </h2>--}}
{{--                </div>--}}
{{--                <!-- TITLE END-->--}}
{{--                <div class="section-content">--}}
{{--                    <div class="twm-tabs-style-1">--}}
{{--                        <div class="tab-content" id="myTab3Content">--}}
{{--                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="Monthly">--}}
{{--                                <div class="pricing-block-outer">--}}
{{--                                    <div class="row justify-content-center">--}}
{{--                                        <div class="col-lg-4 col-md-6 m-b30">--}}
{{--                                            <div class="pricing-table-1">--}}
{{--                                                <div class="p-table-title">--}}
{{--                                                    <h4 class="wt-title">--}}
{{--                                                        أساسي--}}
{{--                                                    </h4>--}}
{{--                                                </div>--}}
{{--                                                <div class="p-table-inner">--}}
{{--                                                    <div class="p-table-price">--}}
{{--                                                        <span>$90/</span>--}}
{{--                                                        <p>شهريا</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-table-list">--}}
{{--                                                        <ul>--}}
{{--                                                            <li><i class="feather-check"></i>1 نشر الوظيفة</li>--}}
{{--                                                            <li class="disable"><i class="feather-x"></i>0 وظيفة مميزة--}}
{{--                                                            </li>--}}
{{--                                                            <li class="disable"><i class="feather-x"></i>عرض الوظيفة--}}
{{--                                                                لمدة 20 يومًا--}}
{{--                                                            </li>--}}
{{--                                                            <li class="disable"><i class="feather-x"></i>دعم قسط 24/7--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-table-btn">--}}
{{--                                                        <a href="about-1.html" class="site-button">شراء الآن</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-lg-4 col-md-6 p-table-highlight m-b30">--}}
{{--                                            <div class="pricing-table-1 circle-yellow">--}}
{{--                                                <div class="p-table-recommended">Recommended</div>--}}
{{--                                                <div class="p-table-title">--}}
{{--                                                    <h4 class="wt-title">--}}
{{--                                                        معيار--}}
{{--                                                    </h4>--}}
{{--                                                </div>--}}
{{--                                                <div class="p-table-inner">--}}

{{--                                                    <div class="p-table-price">--}}
{{--                                                        <span>$248/</span>--}}
{{--                                                        <p>شهريا</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-table-list">--}}
{{--                                                        <ul>--}}
{{--                                                            <li><i class="feather-check"></i>1 نشر الوظيفة</li>--}}
{{--                                                            <li><i class="feather-check"></i>0 وظيفة مميزة</li>--}}
{{--                                                            <li><i class="feather-check"></i>عرض الوظيفة لمدة 20 يومًا--}}
{{--                                                            </li>--}}
{{--                                                            <li class="disable"><i class="feather-x"></i>دعم قسط 24/7--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-table-btn">--}}
{{--                                                        <a href="about-1.html" class="site-button">شراء الآن</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-lg-4 col-md-6 m-b30">--}}
{{--                                            <div class="pricing-table-1 circle-pink">--}}
{{--                                                <div class="p-table-title">--}}
{{--                                                    <h4 class="wt-title">--}}
{{--                                                        ممتد--}}
{{--                                                    </h4>--}}
{{--                                                </div>--}}
{{--                                                <div class="p-table-inner">--}}
{{--                                                    <div class="p-table-price">--}}
{{--                                                        <span>$499/</span>--}}
{{--                                                        <p>شهريا</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-table-list">--}}
{{--                                                        <ul>--}}
{{--                                                            <li><i class="feather-check"></i>1 نشر الوظيفة</li>--}}
{{--                                                            <li><i class="feather-check"></i>0 وظيفة مميزة</li>--}}
{{--                                                            <li><i class="feather-check"></i>عرض الوظيفة لمدة 20 يومًا--}}
{{--                                                            </li>--}}
{{--                                                            <li><i class="feather-check"></i>دعم قسط 24/7</li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-table-btn">--}}
{{--                                                        <a href="about-1.html" class="site-button">شراء الآن</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="annual">--}}
{{--                                <div class="pricing-block-outer">--}}
{{--                                    <div class="row justify-content-center">--}}
{{--                                        <div class="col-lg-4 col-md-6 m-b30">--}}
{{--                                            <div class="pricing-table-1">--}}
{{--                                                <div class="p-table-title">--}}
{{--                                                    <h4 class="wt-title">--}}
{{--                                                        Basic--}}
{{--                                                    </h4>--}}
{{--                                                </div>--}}
{{--                                                <div class="p-table-inner">--}}
{{--                                                    <div class="p-table-price">--}}
{{--                                                        <span>$149/</span>--}}
{{--                                                        <p>شهريا</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-table-list">--}}
{{--                                                        <ul>--}}
{{--                                                            <li><i class="feather-check"></i>1 نشر الوظيفة</li>--}}
{{--                                                            <li class="disable"><i class="feather-x"></i>0 وظيفة مميزة--}}
{{--                                                            </li>--}}
{{--                                                            <li class="disable"><i class="feather-x"></i>عرض الوظيفة--}}
{{--                                                                لمدة 20 يومًا--}}
{{--                                                            </li>--}}
{{--                                                            <li class="disable"><i class="feather-x"></i>دعم قسط 24/7--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-table-btn">--}}
{{--                                                        <a href="about-1.html" class="site-button">شراء الآن</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-lg-4 col-md-6 p-table-highlight m-b30">--}}
{{--                                            <div class="pricing-table-1 circle-yellow">--}}
{{--                                                <div class="p-table-recommended">مُستَحسَن</div>--}}
{{--                                                <div class="p-table-title">--}}
{{--                                                    <h4 class="wt-title">--}}
{{--                                                        معيار--}}
{{--                                                    </h4>--}}
{{--                                                </div>--}}
{{--                                                <div class="p-table-inner">--}}

{{--                                                    <div class="p-table-price">--}}
{{--                                                        <span>$499/</span>--}}
{{--                                                        <p>شهريا</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-table-list">--}}
{{--                                                        <ul>--}}
{{--                                                            <li><i class="feather-check"></i>1 نشر الوظيفة</li>--}}
{{--                                                            <li><i class="feather-check"></i>0 وظيفة مميزة</li>--}}
{{--                                                            <li><i class="feather-check"></i>عرض الوظيفة لمدة 20 يومًا--}}
{{--                                                            </li>--}}
{{--                                                            <li class="disable"><i class="feather-x"></i>دعم قسط 24/7--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-table-btn">--}}
{{--                                                        <a href="about-1.html" class="site-button">شراء الآن</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-lg-4 col-md-6 m-b30">--}}
{{--                                            <div class="pricing-table-1 circle-pink">--}}
{{--                                                <div class="p-table-title">--}}
{{--                                                    <h4 class="wt-title">--}}
{{--                                                        ممتد--}}
{{--                                                    </h4>--}}
{{--                                                </div>--}}
{{--                                                <div class="p-table-inner">--}}
{{--                                                    <div class="p-table-price">--}}
{{--                                                        <span>$1499/</span>--}}
{{--                                                        <p>شهريا</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-table-list">--}}
{{--                                                        <ul>--}}
{{--                                                            <li><i class="feather-check"></i>1 نشر الوظيفة</li>--}}
{{--                                                            <li><i class="feather-check"></i>0 وظيفة مميزة</li>--}}
{{--                                                            <li><i class="feather-check"></i>عرض الوظيفة لمدة 20 يومًا--}}
{{--                                                            </li>--}}
{{--                                                            <li><i class="feather-check"></i>دعم قسط 24/7</li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-table-btn">--}}
{{--                                                        <a href="about-1.html" class="site-button">شراء الآن</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}


{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
        <!-- PRICING TABLE SECTION END -->


        <!-------------- Start Faqs Section --------------->


        <!-- FAQ START -->
        <div class="section-full p-t120  p-b90 site-bg-white">

            <div class="container">

                <!-- TITLE START-->
                <div class="section-head center wt-small-separator-outer">
                    <div class="wt-small-separator site-text-primary">
                        <div>
                            <h2 class="sec_title"> الاسئلة الشائعة  </h2>
                        </div>
                    </div>

                </div>
                <!-- TITLE END-->
                <div class="section-content">
                    <div class="twm-tabs-style-1 center">

                        <div class="tab-content" id="myTabContent">

                            <!--Tabs content two-->
                            <div class="tab-pane fade show active" id="Payment" role="tabpanel">
                                <div class="tw-faq-section">
                                    <div class="accordion tw-faq" id="sf-faq-accordion-2">
                                        <!--One-->
                                        @foreach($employesfaqs as $faq)
                                            <div class="accordion-item">

                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" aria-expanded="false"
                                                        data-bs-target="#FAQ{{$faq['id']}}">
                                                    {{$faq['title']}}
                                                </button>

                                                <div id="FAQ{{$faq['id']}}" class="accordion-collapse collapse"
                                                     data-bs-parent="#sf-faq-accordion">
                                                    <div class="accordion-body">
                                                        {{$faq['desc']}}
                                                    </div>
                                                </div>

                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>

            </div>

        </div>
        <!-- FAQ END -->




        <!------------- End Faqs Section ------------------->


    </div>
    <!-- CONTENT END -->

@endsection
