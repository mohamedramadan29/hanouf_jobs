@extends('website.layouts.master')
@section('title')
     ادارة خطة الشركة
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
                            <h2 class="wt-title"> الخطط  </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية  </a></li>
                            <li> خطط الشركات  </li>
                        </ul>
                    </div>

                    <!-- BREADCRUMB ROW END -->
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->

        <!-- PRICING TABLE SECTION START -->
        <div class="section-full p-t120 p-b90 site-bg-white tw-pricing-area">

            <div class="container">

                <!-- TITLE START-->
                <div class="section-head left wt-small-separator-outer">
                    <div class="wt-small-separator site-text-primary">
                        <div>اختر خطتك</div>
                    </div>
                </div>
                <!-- TITLE END-->
                <div class="section-content">
                    <div class="twm-tabs-style-1">
                        <div class="tab-content" id="myTab3Content">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="Monthly">
                                <div class="pricing-block-outer">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 col-md-6 m-b30">
                                            <div class="pricing-table-1">
                                                <div class="p-table-title">
                                                    <h4 class="wt-title">
                                                        أساسي
                                                    </h4>
                                                </div>
                                                <div class="p-table-inner">
                                                    <div class="p-table-price">
                                                        <span>$90/</span>
                                                        <p>شهريا</p>
                                                    </div>
                                                    <div class="p-table-list">
                                                        <ul>
                                                            <li><i class="feather-check"></i>1 نشر الوظيفة</li>
                                                            <li class="disable"><i class="feather-x"></i>0 وظيفة مميزة</li>
                                                            <li class="disable"><i class="feather-x"></i>عرض الوظيفة لمدة 20 يومًا</li>
                                                            <li class="disable"><i class="feather-x"></i>دعم قسط 24/7</li>
                                                        </ul>
                                                    </div>
                                                    <div class="p-table-btn">
                                                        <a href="#" class="site-button">شراء الآن</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 p-table-highlight m-b30">
                                            <div class="pricing-table-1 circle-yellow">
                                                <div class="p-table-recommended">مُستَحسَن</div>
                                                <div class="p-table-title">
                                                    <h4 class="wt-title">
                                                        معيار
                                                    </h4>
                                                </div>
                                                <div class="p-table-inner">

                                                    <div class="p-table-price">
                                                        <span>$248/</span>
                                                        <p>شهريا</p>
                                                    </div>
                                                    <div class="p-table-list">
                                                        <ul>
                                                            <li><i class="feather-check"></i>1 نشر وظيفة</li>
                                                            <li><i class="feather-check"></i>0 وظيفة مميزة</li>
                                                            <li><i class="feather-check"></i>عرض الوظيفة لمدة 20 يومًا</li>
                                                            <li class="disable"><i class="feather-x"></i>دعم قسط 24/7</li>
                                                        </ul>
                                                    </div>
                                                    <div class="p-table-btn">
                                                        <a href="#" class="site-button">شراء الآن</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 m-b30">
                                            <div class="pricing-table-1 circle-pink">
                                                <div class="p-table-title">
                                                    <h4 class="wt-title">
                                                        ممتد
                                                    </h4>
                                                </div>
                                                <div class="p-table-inner">
                                                    <div class="p-table-price">
                                                        <span>$499/</span>
                                                        <p>شهريا</p>
                                                    </div>
                                                    <div class="p-table-list">
                                                        <ul>
                                                            <li><i class="feather-check"></i>1 نشر وظيفة</li>
                                                            <li><i class="feather-check"></i>0 وظيفة مميزة</li>
                                                            <li><i class="feather-check"></i>عرض الوظيفة لمدة 20 يومًا</li>
                                                            <li><i class="feather-check"></i>دعم قسط 24/7</li>
                                                        </ul>
                                                    </div>
                                                    <div class="p-table-btn">
                                                        <a href="#" class="site-button">شراء الآن</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="annual">
                                <div class="pricing-block-outer">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 col-md-6 m-b30">
                                            <div class="pricing-table-1">
                                                <div class="p-table-title">
                                                    <h4 class="wt-title">
                                                        أساسي
                                                    </h4>
                                                </div>
                                                <div class="p-table-inner">
                                                    <div class="p-table-price">
                                                        <span>$149/</span>
                                                        <p>شهريا</p>
                                                    </div>
                                                    <div class="p-table-list">
                                                        <ul>
                                                            <li><i class="feather-check"></i>1 نشر وظيفة</li>
                                                            <li class="disable"><i class="feather-x"></i>0 وظيفة مميزة</li>
                                                            <li class="disable"><i class="feather-x"></i>عرض الوظيفة لمدة 20 يومًا</li>
                                                            <li class="disable"><i class="feather-x"></i>دعم قسط 24/7</li>
                                                        </ul>
                                                    </div>
                                                    <div class="p-table-btn">
                                                        <a href="about-1.html" class="site-button">شراء الآن</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 p-table-highlight m-b30">
                                            <div class="pricing-table-1 circle-yellow">
                                                <div class="p-table-recommended">Recommended</div>
                                                <div class="p-table-title">
                                                    <h4 class="wt-title">
                                                        معيار
                                                    </h4>
                                                </div>
                                                <div class="p-table-inner">

                                                    <div class="p-table-price">
                                                        <span>$499/</span>
                                                        <p>شهريا</p>
                                                    </div>
                                                    <div class="p-table-list">
                                                        <ul>
                                                            <li><i class="feather-check"></i>1 نشر الوظيفة</li>
                                                            <li><i class="feather-check"></i>0 وظيفة مميزة</li>
                                                            <li><i class="feather-check"></i>عرض الوظيفة لمدة 20 يومًا</li>
                                                            <li class="disable"><i class="feather-x"></i>دعم قسط 24/7</li>
                                                        </ul>
                                                    </div>
                                                    <div class="p-table-btn">
                                                        <a href="about-1.html" class="site-button">شراء الآن</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 m-b30">
                                            <div class="pricing-table-1 circle-pink">
                                                <div class="p-table-title">
                                                    <h4 class="wt-title">
                                                        ممتد
                                                    </h4>
                                                </div>
                                                <div class="p-table-inner">
                                                    <div class="p-table-price">
                                                        <span>$1499/</span>
                                                        <p>شهريا</p>
                                                    </div>
                                                    <div class="p-table-list">
                                                        <ul>
                                                            <li><i class="feather-check"></i>1 نشر وظيفة</li>
                                                            <li><i class="feather-check"></i>0 وظيفة مميزة</li>
                                                            <li><i class="feather-check"></i>عرض الوظيفة لمدة 20 يومًا</li>
                                                            <li><i class="feather-check"></i>دعم قسط 24/7</li>
                                                        </ul>
                                                    </div>
                                                    <div class="p-table-btn">
                                                        <a href="about-1.html" class="site-button">شراء الآن</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>

            </div>
        </div>
        <!-- PRICING TABLE SECTION END -->



    </div>
    <!-- CONTENT END -->
@endsection
