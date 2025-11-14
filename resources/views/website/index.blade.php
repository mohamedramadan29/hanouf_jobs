@extends('website.layouts.master')
@section('title')
    الرئيسية | تخير
@endsection
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        <!--Banner Start-->
        <div class="twm-home3-banner-section site-bg-white bg-cover"
             style="background-image:url({{asset('assets/uploads/contents/'.$content->hero_image)}})">
            <div class="twm-home3-inner-section">
                <div class="twm-bnr-mid-section">
                    <div class="twm-bnr-title-large"> {{ $content['hero_title'] }} </div>
                    <div class="twm-bnr-title-light">  {{ $content->hero_desc }} </div>
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
                                        <div>  {{ $content->about_title }} </div>
                                    </div>

                                    <p> {{ $content->about_section }} </p>
                                    {{-- <h2 class="wt-title"> لأصحاب الأعمال: أحصل على المرشحين المثاليين لمتطلبات شركتك. </h2>
                                    <h2 class="wt-title"> للباحثين عن العمل: أكتشف فرصًا جديدة وقدم عليها بسهولة من خلال حسابك </h2>
                                --}}
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
                                    <img src="{{asset('assets/uploads/contents/'.$content->about_image)}}" alt="#">
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
                                    <h4 class="twm-title">  {{ $content->job_step1_title }} </h4>
                                </div>
                                <p>  {{ $content->job_step1_desc }} </p>
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
                                    <h4 class="twm-title">  {{ $content->job_step2_title }} </h4>
                                </div>
                                <p>  {{ $content->job_step2_desc }}  </p>
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
                                    <h4 class="twm-title"> {{ $content->job_step3_title }} </h4>
                                </div>
                                <p>  {{ $content->job_step3_desc }} </p>
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
                                    <h4 class="twm-title"> {{ $content->exper_step1_title }} </h4>
                                </div>
                                <p> {{ $content->exper_step1_desc }} </p>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="twm-w-process-steps">
                                <span class="twm-large-number">02</span>
                                <div class="twm-w-pro-top bg-clr-pink">
                                    <div class="twm-media">
                                        <span><img src="{{asset('assets/website/images/work-process/icon2.png')}}" alt="icon1"></span>
                                    </div>
                                    <h4 class="twm-title">  {{ $content->exper_step2_title }}  </h4>
                                </div>
                                <p>  {{ $content->exper_step2_desc }} </p>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="twm-w-process-steps">
                                <span class="twm-large-number">03</span>
                                <div class="twm-w-pro-top bg-clr-green">
                                    <div class="twm-media">
                                        <span><img src="{{asset('assets/website/images/work-process/icon3.png')}}" alt="icon1"></span>
                                    </div>
                                    <h4 class="twm-title">  {{ $content->exper_step3_title }}   </h4>
                                </div>
                                <p>  {{ $content->exper_step3_desc }} </p>
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

                            @foreach($specialists as $specialist)
                                <!-- COLUMNS 1 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-media">
                                            <div class="flaticon-dashboard"></div>
                                        </div>
                                        <div class="twm-content">
{{--                                            <div class="twm-jobs-available">9,185 وظائف</div>--}}
                                            <a href="{{url('jobs')}}"> {{$specialist['name']}} </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="text-right job-categories-btn">
                        <a href="{{url('jobs')}}" class=" site-button"> جميع الوظائف  </a>
                    </div>

                </div>

            </div>

        </div>

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
