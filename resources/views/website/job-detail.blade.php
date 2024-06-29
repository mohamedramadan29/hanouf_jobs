@extends('website.layouts.master')
@section('title')
{{--   {{$adv['title']}}--}}
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
                            <h2 class="wt-title"> {{$adv['title']}} </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li><a href="{{url('jobs')}}">  الوظائف </a></li>
                            <li> {{$adv['title']}}</li>
                        </ul>
                    </div>

                    <!-- BREADCRUMB ROW END -->
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->


        <!-- OUR BLOG START -->
        <div class="section-full  p-t120 p-b90 bg-white">
            <div class="container">

                <!-- BLOG SECTION START -->
                <div class="section-content">
                    <div class="row d-flex justify-content-center">

                        <div class="col-lg-8 col-md-12">
                            <!-- Candidate detail START -->
                            <div class="cabdidate-de-info">
                                <div class="twm-job-self-wrap">
                                    <div class="twm-job-self-info">
                                        <div class="twm-job-self-top">
                                            <div class="twm-mid-content">
                                                <div class="twm-media">
                                                    @if($adv['company']['logo'] !='')
                                                        <img src="{{asset('assets/uploads/companies/'.$adv['company']['logo'])}}" alt="#">
                                                    @else
                                                        <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="#">
                                                    @endif

                                                </div>
                                                <h4 class="twm-job-title"> {{$adv['title']}}  <span
                                                        class="twm-job-post-duration">/  {{$adv['created_at']}}</span></h4>

                                                <div class="twm-job-self-mid">
                                                    <div class="twm-job-self-mid-left">
                                                        <div class="twm-jobs-amount">$ {{$adv['salary']}} <span>/ شهر</span>
                                                        </div>
                                                    </div>
                                                    <div class="twm-job-apllication-area">ينتهي التطبيق:
                                                        <span class="twm-job-apllication-date">1 أكتوبر 2025</span>
                                                    </div>
                                                </div>

                                                <div class="twm-job-self-bottom">
                                                    <a class="site-button" data-bs-toggle="modal"
                                                       href="#apply_job_popup" role="button">
                                                        قدم الآن
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <h4 class="twm-s-title">المسمى الوظيفي:</h4>

                                <p>على سبيل المثال ، إلى العفو الصغير ، من هو تمريننا أي من الجسم يتلقى شاقة ، ولكن
                                    للقيام بشيء من ميزة العواقب؟ واحد أو له حق في إيجاد من دواعي سروري أن يكون أكثر من
                                    عدم الراحة
                                    عواقب ، أو أن ألمه للفرار إلى متعة لا أحد ليكون مستعدًا؟
                                </p>

                                <p>لكنهم سوف يتهمون الكراهية المنتظمة لأولئك الذين يعانون من التخلص من الملذات وفساد
                                    الألم والترحيب بالمشاكل التي ترحب بها هي رغبة أعمى في عدم توفيرها ، على غرار خطأ
                                    المسؤوليات.</p>


                                <h4 class="twm-s-title">متطلبات:</h4>
                                <ul class="description-list-2">
                                    <li>
                                        <i class="feather-check"></i>
                                        يجب أن تكون قادرة على التواصل مع الآخرين لنقل المعلومات بفعالية.
                                    </li>
                                    <li>
                                        <i class="feather-check"></i>
                                        شخصيا شغوف وحتى الآن مع الاتجاهات والتقنيات الحالية ، ملتزمة بالجودة والمريحة
                                        العمل مع وسائل الإعلام البالغة.
                                    </li>
                                    <li>
                                        <i class="feather-check"></i>
                                        بكالوريوس أو درجة الماجستير الخلفية التعليمية.
                                    </li>
                                    <li>
                                        <i class="feather-check"></i>
                                        4 سنوات ذات صلة تجربة PHP Dev.
                                    </li>
                                    <li>
                                        <i class="feather-check"></i>
                                        استكشاف الأخطاء وإصلاحها واختبارها وصيانتها لبرامج المنتجات الأساسية وقواعد
                                        البيانات.
                                    </li>

                                </ul>

                                <h4 class="twm-s-title">المسؤوليات:</h4>
                                <ul class="description-list-2">
                                    <li>
                                        <i class="feather-check"></i>
                                        إنشاء وتشجيع إرشادات التصميم وأفضل الممارسات والمعايير.
                                    </li>
                                    <li>
                                        <i class="feather-check"></i>
                                        تقدير بدقة تذاكر التصميم خلال جلسات التخطيط.
                                    </li>
                                    <li>
                                        <i class="feather-check"></i>
                                        الشراكة مع المنتج والهندسة لترجمة أهداف الأعمال والمستخدم إلى تصميمات أنيقة
                                        وعملية. يمكن أن تفي بمقاييس الأعمال والمستخدم الرئيسية.
                                    </li>
                                    <li>
                                        <i class="feather-check"></i>
                                        قم بإنشاء إطارات الأسلاك ، وألواح القصص ، وتدفقات المستخدم ، وتدفقات العملية
                                        وخرائط الموقع لتوصيل التفاعل والتصميم.
                                    </li>
                                    <li>
                                        <i class="feather-check"></i>
                                        الحاضر والدفاع عن التصميمات والتسليمات الرئيسية للأقران وأصحاب المصلحة على
                                        المستوى التنفيذي.
                                    </li>
                                    <li>
                                        <i class="feather-check"></i>
                                        تنفيذ جميع مراحل التصميم البصري من المفهوم إلى التسليم النهائي للهندسة.
                                    </li>

                                </ul>

                                <!--Basic Information-->
                                <div class="panel panel-default">
                                    <div class="panel-heading wt-panel-heading p-a20">
                                        <h4 class="panel-tittle m-a0"><i class="fa fa-suitcase"></i> التقدم للوظيفة
                                        </h4>
                                    </div>
                                    <div class="panel-body wt-panel-body p-a20 m-b30 ">
                                        <form>
                                            <div class="row">
                                                <!--Description-->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> خطاب التوظيف </label>
                                                        <textarea style="height: 150px;" class="form-control" rows="10"
                                                                  placeholder=" خطاب التوظيف  "></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="text-left">
                                                        <button type="submit" class="site-button m-r5"> ارسل</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 rightSidebar">

                            <div class="side-bar mb-4">
                                <div class="twm-s-info2-wrap mb-5">
                                    <div class="twm-s-info2">
                                        <h4 class="section-head-small mb-4">معلومات مهمة</h4>
                                        <ul class="twm-job-hilites">
                                            <li>
                                                <i class="fas fa-calendar-alt"></i>
                                                <span class="twm-title">تاريخ الإعلان</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-eye"></i>
                                                <span class="twm-title">8160 الآراء</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-file-signature"></i>
                                                <span class="twm-title">6 المتقدمون</span>
                                            </li>
                                        </ul>
                                        <ul class="twm-job-hilites2">

                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    <span class="twm-title">تاريخ الإعلان</span>
                                                    <div class="twm-s-info-discription">22 أبريل 2023</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <span class="twm-title">موقع</span>
                                                    <div class="twm-s-info-discription">مونشن ، ألمانيا</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-user-tie"></i>
                                                    <span class="twm-title">مسمى وظيفي</span>
                                                    <div class="twm-s-info-discription">مطور ويب</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-clock"></i>
                                                    <span class="twm-title">خبرة</span>
                                                    <div class="twm-s-info-discription">3 سنة</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-suitcase"></i>
                                                    <span class="twm-title">مؤهل</span>
                                                    <div class="twm-s-info-discription">درجة البكالوريوس</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-venus-mars"></i>
                                                    <span class="twm-title">جنس</span>
                                                    <div class="twm-s-info-discription">كلاهما</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="twm-s-info-inner">

                                                    <i class="fas fa-money-bill-wave"></i>
                                                    <span class="twm-title">عرض الراتب</span>
                                                    <div class="twm-s-info-discription">$2000-$2500 / شهر</div>
                                                </div>
                                            </li>

                                        </ul>

                                    </div>
                                </div>

                                <div class="widget tw-sidebar-tags-wrap">
                                    <h4 class="section-head-small mb-4">مهارات العمل</h4>

                                    <div class="tagcloud">
                                        <a href="javascript:void(0)">لغة البرمجة</a>
                                        <a href="javascript:void(0)">بيثون</a>
                                        <a href="javascript:void(0)">وورد</a>
                                        <a href="javascript:void(0)">جافا سكريبت</a>
                                        <a href="javascript:void(0)">فيجما</a>
                                        <a href="javascript:void(0)">زاوي</a>
                                        <a href="javascript:void(0)">يتفاعل</a>
                                        <a href="javascript:void(0)">دروبال</a>
                                        <a href="javascript:void(0)">جملة</a>
                                    </div>
                                </div>

                            </div>

                            <div class="twm-s-info3-wrap mb-5">
                                <div class="twm-s-info3">
                                    <div class="twm-s-info-logo-section">
                                        <div class="twm-media">
                                            <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="#">
                                        </div>
                                        <h4 class="twm-title">مصمم ويب كبير ، مطور</h4>
                                    </div>
                                    <ul>

                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-building"></i>
                                                <span class="twm-title">شركة</span>
                                                <div class="twm-s-info-discription">تطوير البرمجيات</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-mobile-alt"></i>
                                                <span class="twm-title">هاتف</span>
                                                <div class="twm-s-info-discription">+291 560 56456</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-at"></i>
                                                <span class="twm-title">بريد إلكتروني</span>
                                                <div class="twm-s-info-discription">thewebmaxdemo@gmail.com</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-desktop"></i>
                                                <span class="twm-title">موقع إلكتروني</span>
                                                <div class="twm-s-info-discription">https://themeforest.net</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span class="twm-title">عنوان</span>
                                                <div class="twm-s-info-discription">1363-1385 غروب الشمس الجادة أنجلوس,
                                                    كاليفورنيا
                                                    90026 ، الولايات المتحدة الأمريكية
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                    <a href="about-1.html" class=" site-button">عرض الصفحة الشخصية</a>

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
