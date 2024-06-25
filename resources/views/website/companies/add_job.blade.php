@extends('website.layouts.master')
@section('title')
    اضف وظيفة جديدة
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
                            <h2 class="wt-title"> اضافة وظيفة جديدة </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li> اضافة وظيفة جديدة</li>
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
                                @if(\Illuminate\Support\Facades\Auth::guard('company')->user()->logo !='')
                                    <img
                                        src="{{asset('assets/uploads/companies/'.Auth::guard('company')->user()->logo)}}"
                                        alt="">
                                @else
                                    <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="">
                                @endif

                            </div>

                            <div class="twm-mid-content text-center" style="margin-bottom: 15px">
                                <a href="{{url('company/dashboard')}}" class="twm-job-title">
                                    <h4 style="margin-bottom: 10px">  {{Auth::guard('company')->user()->name}} </h4>
                                </a>
                                <p> {{Auth::guard('company')->user()->email}} </p>
                            </div>
                            <div class="twm-nav-list-1">
                                <ul>
                                    <li><a href="{{url('company/dashboard')}}"><i class="fa fa-user"></i>ملف الشركة</a>
                                    </li>
                                    <li><a href="{{url('company/jobs')}}"><i class="fa fa-suitcase"></i> إدارة
                                            الوظائف</a></li>
                                    <li class="active"><a href="{{url('company/add-job')}}"><i class="fa fa-user"></i>
                                            اضف وظيفة جديدة </a></li>
                                    <li><a href="{{url('company/chat')}}"><i class="fa fa-credit-card"></i> المحادثات
                                        </a></li>
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
                            <form method="post" action="{{url('company/add-job')}}">
                                @csrf
                                <!--Basic Information-->
                                <div class="panel panel-default">
                                    <div class="panel-heading wt-panel-heading p-a20">
                                        <h4 class="panel-tittle m-a0"><i class="fa fa-suitcase"></i>تفاصيل الوظيفة</h4>
                                    </div>
                                    <div class="panel-body wt-panel-body p-a20 m-b30 ">

                                        <div class="row">

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <input type="hidden" name="company_id"
                                                       value="{{\Illuminate\Support\Facades\Auth::guard('company')->user()->id}}">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> حدد الجنسية </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker" name="nationality"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد الجنسية</option>
                                                            <option value="مصري"> مصري</option>
                                                            <option value="سعودي"> سعودي</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> حدد الجنس </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker" name="sex"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد الجنس</option>
                                                            <option value="ذكر"> ذكر</option>
                                                            <option value="انثي"> انثي</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> المدينة </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker" name="city"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد المدينة</option>
                                                            @foreach($citizen as $city)

                                                                <option
                                                                    value="{{$city['id']}}"> {{$city['name']}} </option>

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-xl-8 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> هل ترغب في من يسكن في منطقة اخرى وليس لدية مانع
                                                        بالعمل في مدينتك ؟  </label>
                                                    <div class="ls-inputicon-box">
                                                        <select  required class="wt-select-box selectpicker" name="available_work_from_another_place"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد  </option>
                                                            <option value="1">نعم</option>
                                                            <option value="2">لا</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>  مسمى الوظيفي للمبيعات </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker" name="job_name"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد  </option>
                                                            <option value="١">١</option>
                                                            <option value="٢">٢</option>
                                                            <option value="٣">٣</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>  طبيعة العمل  </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required multiple class="wt-select-box selectpicker" name="work_type[]"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">

                                                            <option value="هاتفي">هاتفي</option>
                                                            <option value="ميداني">ميداني</option>
                                                            <option value="مكتبي">مكتبي</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>  عدد سنوات الخبرة </label>
                                                    <div class="ls-inputicon-box">
                                                        <input  required class="form-control" min="1" name="experience" type="number">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> اللغة المطلوبة </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker" multiple name="language[]"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option value="عربي">عربي</option>
                                                            <option value="انجليزي">انجليزي</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> مستوي اللغة </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker" name="language_level"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد  </option>
                                                            <option value="مبتدأ">مبتدأ</option>
                                                            <option value="متوسط">متوسط</option>
                                                            <option value="متقدم">متقدم</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> ماهو التخصص المهني المطلوب ؟ </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker" name="profession_specialist"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد  </option>
                                                            <option value="التخصص الاول"> التخصص الاول</option>
                                                            <option value="التخصص الاول"> التخصص الاول</option>
                                                            <option value="التخصص الاول"> التخصص الاول</option>
                                                            <option value="التخصص الاول"> التخصص الاول</option>
                                                            <option value="التخصص الاول"> التخصص الاول</option>
                                                            <option value="التخصص الاول"> التخصص الاول</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> الراتب المحدد </label>
                                                    <div class="ls-inputicon-box">
                                                        <input required class="form-control" min="1" name="salary" type="number">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>  يوجد لدينا مرشحين على رأس العمل ويملكون فترة
                                                        اشعار
                                                        محدده , أختر الفترة المناسبة لك </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker" name="notification_timeslot"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد  </option>
                                                            <option value="فوري"> فوري</option>
                                                            <option value="خلال شهر">خلال شهر</option>
                                                            <option value="خلال شهرين">خلال شهرين</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> الوصف الوظيفي </label>
                                                    <textarea required class="form-control" rows="3" name="description"></textarea>
                                                </div>
                                            </div>


                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>  العنوان </label>
                                                    <div class="ls-inputicon-box">
                                                        <input required class="form-control" name="title" type="text">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> اسم المنشور </label>
                                                    <div class="ls-inputicon-box">
                                                        <input required class="form-control" name="title_name" type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="text-left">
                                                    <button type="submit" class="site-button m-r5">نشر الوظيفة</button>
{{--                                                    <button type="submit" class="site-button outline-primary">حفظ--}}
{{--                                                        المسودة--}}
{{--                                                    </button>--}}
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
