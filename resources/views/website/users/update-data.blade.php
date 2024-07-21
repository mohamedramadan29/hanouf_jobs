@extends('website.layouts.master')
@section('title')

    تخير
    |
    تعديل البيانات
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
                            <li> تعديل البيانات</li>
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
                                <a href="{{url('company/dashboard')}}" class="twm-job-title">
                                    <h4 style="margin-bottom: 10px">  {{Auth::user()->name}} </h4>
                                </a>
                                <p> {{Auth::user()->email}} </p>
                            </div>

                            <div class="twm-nav-list-1">
                                <ul>
                                    <li><a href="{{url('user/dashboard')}}"><i class="fa fa-user"></i>
                                            حسابي
                                        </a></li>
                                    <li class="active"><a href="{{url('user/update')}}"><i class="fa fa-edit"></i>
                                            تعديل الملف الشخصي </a></li>

                                    <li><a href="{{url('user/alerts')}}"><i class="fa fa-bell"></i> تنبيهات مهمة
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
                        <div class="twm-right-section-panel site-bg-gray">
                            <form method="post" action="{{url('user/update')}}" enctype="multipart/form-data">
                                @csrf
                                <!--Another  Information-->
                                <div class="panel panel-default">
                                    <div class="panel-heading wt-panel-heading p-a20">
                                        <h4 class="panel-tittle m-a0"> من فضلك ادخل جميع البيانات بشكل صحيح </h4>
                                    </div>
                                    <div class="panel-body wt-panel-body p-a20 m-b30 ">

                                        <div class="row">

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> حدد الجنسية </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                                name="nationality"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد الجنسية</option>
                                                            <option @if($user['nationality'] == 'مصري') selected
                                                                    @endif value="مصري">
                                                                مصري
                                                            </option>
                                                            <option @if($user['nationality'] == 'سعودي') selected
                                                                    @endif value="سعودي"> سعودي
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> حدد الجنس </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker سثمث" name="sex"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد الجنس</option>
                                                            <option @if($user['sex'] == 'ذكر') selected
                                                                    @endif value="ذكر"> ذكر
                                                            </option>
                                                            <option @if($user['sex'] == 'انثي') selected
                                                                    @endif value="انثي"> انثي
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> المدينة </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker" name="city"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد المدينة</option>
                                                            @foreach($citizen as $city)
                                                                <option @if($user['city'] == $city['id']) selected
                                                                        @endif value="{{$city['id']}}"> {{$city['name']}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> إمكانية التنقل من مدينة أخرى للعمل </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                                name="can_placed_from_to_another"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            <option
                                                                @if($user['can_placed_from_to_another'] == '1') selected
                                                                @endif value="1">نعم
                                                            </option>
                                                            <option
                                                                @if($user['can_placed_from_to_another'] == '2') selected
                                                                @endif value="2">لا
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> مسمى الوظيفي للمبيعات </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                                name="job_name"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            @foreach($nameJobs as  $job)
                                                                <option @if($job['id'] == $user['job_name']) selected
                                                                        @endif value="{{$job['id']}}">{{$job['title']}}</option>
                                                            @endforeach
                                                        </select>


                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> طبيعة العمل </label>
                                                    <div class="ls-inputicon-box">
                                                        @php
                                                            $work_types = explode(',',$user['work_type']);
                                                        @endphp
                                                        <select required multiple class="wt-select-box selectpicker"
                                                                name="work_type[]"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option @if(in_array('هاتفي',$work_types)) selected
                                                                    @endif value="هاتفي">هاتفي
                                                            </option>
                                                            <option value="ميداني"
                                                                    @if(in_array('ميداني', $work_types)) selected @endif>
                                                                ميداني
                                                            </option>
                                                            <option value="مكتبي"
                                                                    @if(in_array('مكتبي', $work_types)) selected @endif>
                                                                مكتبي
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> عدد سنوات الخبرة </label>
                                                    <div class="ls-inputicon-box">
                                                        <input required class="form-control" min="1" name="experience"
                                                               type="number" value="{{$user['experience']}}">
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="ls-inputicon-box">
                                                    @php
                                                        $languages = explode(',',$user['language']);
                                                    @endphp
                                                    <label> حدد اللغة </label>
                                                    <select required class="wt-select-box selectpicker" multiple
                                                            name="language[]"
                                                            data-live-search="true" title="" id="j-category"
                                                            data-bv-field="size">
                                                        <option @if(in_array('عربي',$languages)) selected
                                                                @endif value="عربي">
                                                            عربي
                                                        </option>
                                                        <option @if(in_array('انجليزي',$languages)) selected
                                                                @endif value="انجليزي">انجليزي
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> مستوي اللغة </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                                name="language_level"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            <option @if($user['language_level'] == 'مبتدأ') selected
                                                                    @endif value="مبتدأ">مبتدأ
                                                            </option>
                                                            <option @if($user['language_level'] == 'متوسط') selected
                                                                    @endif value="متوسط">متوسط
                                                            </option>
                                                            <option @if($user['language_level'] == 'متقدم') selected
                                                                    @endif value="متقدم">متقدم
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> ماهي تخصصك المهني للمبيعات ؟ </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                                name="profession_specialist"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            @foreach($specialists as $special)
                                                                <option
                                                                    @if($special['id'] == $user['profession_specialist']) selected
                                                                    @endif value="{{$special['id']}}"> {{$special['name']}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> الراتب المحدد </label>
                                                    <div class="ls-inputicon-box">
                                                        <input required class="form-control" min="1" name="salary"
                                                               type="number" value="{{$user['salary']}}">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> يوجد لدينا مرشحين على رأس العمل ويملكون فترة
                                                        اشعار
                                                        محدده , أختر الفترة المناسبة لك </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                                name="notification_timeslot"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            <option
                                                                @if($user['notification_timeslot'] == 'فوري') selected
                                                                @endif value="فوري"> فوري
                                                            </option>
                                                            <option
                                                                @if($user['notification_timeslot'] == 'خلال شهر') selected
                                                                @endif value="خلال شهر">خلال شهر
                                                            </option>
                                                            <option
                                                                @if($user['notification_timeslot'] == 'خلال شهرين') selected
                                                                @endif value="خلال شهرين">خلال شهرين
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="text-left">
                                                    <button type="submit" class="site-button"> تحديث البيانات</button>
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
