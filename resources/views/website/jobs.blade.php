@extends('website.layouts.master')
@section('title')
    الوظائف
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
                        <h2 class="wt-title"> الوظائف </h2>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2">
                        <li><a href="{{url('/')}}"> الرئيسية </a></li>
                        <li>قائمة الوظائف</li>
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

                <div class="col-lg-4 col-md-12 rightSidebar">

                    <div class="side-bar">

                        <div class="sidebar-elements search-bx">

                            <form>

                                <div class="form-group mb-4">
                                    <h4 class="section-head-small mb-4">فئة</h4>
                                    <select class="wt-select-bar-large selectpicker" data-live-search="true" data-bv-field="size">
                                        <option>كل الفئة</option>
                                        <option>مصمم الويب</option>
                                        <option>مطور</option>
                                        <option>محاسب</option>
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <h4 class="section-head-small mb-4">الكلمة الرئيسية</h4>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="عنوان الوظيفة أو الكلمة الرئيسية">
                                        <button class="btn" type="button"><i class="feather-search"></i></button>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <h4 class="section-head-small mb-4">موقع</h4>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="موقع البحث">
                                        <button class="btn" type="button"><i class="feather-map-pin"></i></button>
                                    </div>
                                </div>
                                <div class="twm-sidebar-ele-filter">
                                    <h4 class="section-head-small mb-4"> تاريخ نشر الاعلان </h4>
                                    <ul>
                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleradio1">
                                                <label class="form-check-label" for="exampleradio1">الساعة الأخيرة</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleradio2">
                                                <label class="form-check-label" for="exampleradio2">أخر 24 ساعه</label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleradio3">
                                                <label class="form-check-label" for="exampleradio3">اخر 7 ايام</label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleradio4">
                                                <label class="form-check-label" for="exampleradio4">آخر 14 يومًا</label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleradio5">
                                                <label class="form-check-label" for="exampleradio5">آخر 30 يومًا</label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleradio6">
                                                <label class="form-check-label" for="exampleradio6">الجميع</label>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <!--Filter Short By-->
                    <div class="product-filter-wrap d-flex justify-content-between align-items-center m-b30">
                        <span class="woocommerce-result-count-left">عرض 2150 وظيفة</span>

                        <form class="woocommerce-ordering twm-filter-select" method="get">
                            <span class="woocommerce-result-count"> رتب حسب </span>
                            <select class="wt-select-bar-2 selectpicker" data-live-search="true" data-bv-field="size">
                                <option>الأحدث</option>
                                <option>الاقدم </option>

                            </select>
                        </form>

                    </div>

                    <div class="twm-jobs-list-wrap">
                        <ul>
                            <li>
                                <div class="twm-jobs-list-style1 mb-5">
                                    <div class="twm-media">
                                        <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="#">
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="job-detail.html" class="twm-job-title">
                                            <h4>مصمم ويب كبير<span class="twm-job-post-duration">/ منذ يوم واحد</span></h4>
                                        </a>
                                        <p class="twm-job-address">1363-1385 غروب الشمس الجادة لوس أنجلوس ، كاليفورنيا 90026 ، الولايات المتحدة الأمريكية</p>
                                    </div>
                                    <div class="twm-right-content">
                                        <div class="twm-jobs-category green"><span class="twm-bg-green">جديد</span></div>
                                        <br>
                                        <a href="job-detail.html" class="twm-jobs-browse site-text-primary"> تقدم للوظيفة </a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="twm-jobs-list-style1 mb-5">
                                    <div class="twm-media">
                                        <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="#">
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="job-detail.html" class="twm-job-title">
                                            <h4>مصمم ويب كبير<span class="twm-job-post-duration">/ منذ يوم واحد</span></h4>
                                        </a>
                                        <p class="twm-job-address">1363-1385 غروب الشمس الجادة لوس أنجلوس ، كاليفورنيا 90026 ، الولايات المتحدة الأمريكية</p>
                                    </div>
                                    <div class="twm-right-content">
                                        <div class="twm-jobs-category green"><span class="twm-bg-green">جديد</span></div>
                                        <br>
                                        <a href="job-detail.html" class="twm-jobs-browse site-text-primary"> تقدم للوظيفة </a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="twm-jobs-list-style1 mb-5">
                                    <div class="twm-media">
                                        <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="#">
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="job-detail.html" class="twm-job-title">
                                            <h4>مصمم ويب كبير<span class="twm-job-post-duration">/ منذ يوم واحد</span></h4>
                                        </a>
                                        <p class="twm-job-address">1363-1385 غروب الشمس الجادة لوس أنجلوس ، كاليفورنيا 90026 ، الولايات المتحدة الأمريكية</p>
                                    </div>
                                    <div class="twm-right-content">
                                        <div class="twm-jobs-category green"><span class="twm-bg-green">جديد</span></div>
                                        <br>
                                        <a href="job-detail.html" class="twm-jobs-browse site-text-primary"> تقدم للوظيفة </a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="twm-jobs-list-style1 mb-5">
                                    <div class="twm-media">
                                        <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="#">
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="job-detail.html" class="twm-job-title">
                                            <h4>مصمم ويب كبير<span class="twm-job-post-duration">/ منذ يوم واحد</span></h4>
                                        </a>
                                        <p class="twm-job-address">1363-1385 غروب الشمس الجادة لوس أنجلوس ، كاليفورنيا 90026 ، الولايات المتحدة الأمريكية</p>
                                    </div>
                                    <div class="twm-right-content">
                                        <div class="twm-jobs-category green"><span class="twm-bg-green">جديد</span></div>
                                        <br>
                                        <a href="job-detail.html" class="twm-jobs-browse site-text-primary"> تقدم للوظيفة </a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="twm-jobs-list-style1 mb-5">
                                    <div class="twm-media">
                                        <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="#">
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="job-detail.html" class="twm-job-title">
                                            <h4>مصمم ويب كبير<span class="twm-job-post-duration">/ منذ يوم واحد</span></h4>
                                        </a>
                                        <p class="twm-job-address">1363-1385 غروب الشمس الجادة لوس أنجلوس ، كاليفورنيا 90026 ، الولايات المتحدة الأمريكية</p>
                                    </div>
                                    <div class="twm-right-content">
                                        <div class="twm-jobs-category green"><span class="twm-bg-green">جديد</span></div>
                                        <br>
                                        <a href="job-detail.html" class="twm-jobs-browse site-text-primary"> تقدم للوظيفة </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="twm-jobs-list-style1 mb-5">
                                    <div class="twm-media">
                                        <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="#">
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="job-detail.html" class="twm-job-title">
                                            <h4>مصمم ويب كبير<span class="twm-job-post-duration">/ منذ يوم واحد</span></h4>
                                        </a>
                                        <p class="twm-job-address">1363-1385 غروب الشمس الجادة لوس أنجلوس ، كاليفورنيا 90026 ، الولايات المتحدة الأمريكية</p>
                                    </div>
                                    <div class="twm-right-content">
                                        <div class="twm-jobs-category green"><span class="twm-bg-green">جديد</span></div>
                                        <br>
                                        <a href="job-detail.html" class="twm-jobs-browse site-text-primary"> تقدم للوظيفة </a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="twm-jobs-list-style1 mb-5">
                                    <div class="twm-media">
                                        <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="#">
                                    </div>
                                    <div class="twm-mid-content">
                                        <a href="job-detail.html" class="twm-job-title">
                                            <h4>مصمم ويب كبير<span class="twm-job-post-duration">/ منذ يوم واحد</span></h4>
                                        </a>
                                        <p class="twm-job-address">1363-1385 غروب الشمس الجادة لوس أنجلوس ، كاليفورنيا 90026 ، الولايات المتحدة الأمريكية</p>
                                    </div>
                                    <div class="twm-right-content">
                                        <div class="twm-jobs-category green"><span class="twm-bg-green">جديد</span></div>
                                        <br>
                                        <a href="job-detail.html" class="twm-jobs-browse site-text-primary"> تقدم للوظيفة </a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>

                    <div class="pagination-outer">
                        <div class="pagination-style1">
                            <ul class="clearfix">
                                <li class="prev"><a href="javascript:;"><span> <i class="fa fa-angle-left"></i> </span></a></li>
                                <li><a href="javascript:;">1</a></li>
                                <li class="active"><a href="javascript:;">2</a></li>
                                <li><a href="javascript:;">3</a></li>
                                <li><a class="javascript:;" href="javascript:;"><i class="fa fa-ellipsis-h"></i></a></li>
                                <li><a href="javascript:;">5</a></li>
                                <li class="next"><a href="javascript:;"><span> <i class="fa fa-angle-right"></i> </span></a></li>
                            </ul>
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
