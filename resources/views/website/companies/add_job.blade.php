@extends('website.layouts.master')
@section('title')
    اضف وظيفة جديدة
@endsection
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        @if (Session::has('Success_message'))
            @php
                toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
            @endphp
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @php
                    toastify()->error($error);
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
                                    <li><a href="{{url('chat-main')}}"><i class="fa fa-credit-card"></i> المحادثات
                                        </a></li>
                                    {{--                                    <li><a href="{{url('company/plan')}}"><i class="fa fa-credit-card"></i> ادارة الخطة--}}
                                    {{--                                        </a></li>--}}
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

                                            <div class="col-xl-12 col-lg-12 col-12">
                                                <div class="form-group">
                                                    <label> عنوان الإعلان الوظيفي </label>
                                                    <div class="ls-inputicon-box">
                                                        <input required class="form-control" name="title" type="text"
                                                               value="{{old('title')}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <input type="hidden" name="company_id"
                                                       value="{{\Illuminate\Support\Facades\Auth::guard('company')->user()->id}}">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> حدد الجنسية </label>
                                                    <div class="ls-inputicon-box">

                                                        <select required class="wt-select-box selectpicker"
                                                                name="nationality" data-live-search="true" title=""
                                                                id="j-category" data-bv-field="size">
                                                            <option disabled
                                                                    {{ old('nationality') == '' ? 'selected' : '' }} value="">
                                                                حدد الجنسية
                                                            </option>
                                                            <option
                                                                value="مصري" {{ old('nationality') == 'مصري' ? 'selected' : '' }}>
                                                                مصري
                                                            </option>
                                                            <option
                                                                value="سعودي" {{ old('nationality') == 'سعودي' ? 'selected' : '' }}>
                                                                سعودي
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> حدد الجنس </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker" name="sex"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled
                                                                    {{ old('sex') == '' ? 'selected' : '' }} value="">
                                                                حدد الجنس
                                                            </option>
                                                            <option
                                                                value="ذكر" {{ old('sex') == 'ذكر' ? 'selected' : '' }}>
                                                                ذكر
                                                            </option>
                                                            <option
                                                                value="انثى" {{ old('sex') == 'انثى' ? 'selected' : '' }}>
                                                                انثى
                                                            </option>
                                                            <option
                                                                value="كلاهما" {{ old('sex') == 'كلاهما' ? 'selected' : '' }}>
                                                                كلاهما
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
                                                            <option disabled
                                                                    {{ old('city') == '' ? 'selected' : '' }} value="">
                                                                حدد المدينة
                                                            </option>
                                                            @foreach($citizen as $city)
                                                                <option
                                                                    value="{{ $city['id'] }}" {{ old('city') == $city['id'] ? 'selected' : '' }}>{{ $city['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> هل ترغب في من يسكن في منطقة اخرى وليس لدية مانع
                                                        بالعمل في مدينتك ؟ </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                                name="available_work_from_another_place"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                            <option disabled
                                                                    {{ old('available_work_from_another_place') == '' ? 'selected' : '' }} value="">
                                                                حدد
                                                            </option>
                                                            <option
                                                                value="1" {{ old('available_work_from_another_place') == 1 ? 'selected' : '' }}>
                                                                نعم
                                                            </option>
                                                            <option
                                                                value="2" {{ old('available_work_from_another_place') == 2 ? 'selected' : '' }}>
                                                                لا
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label> المؤهل العلمي </label>
                                                    <select class="wt-select-box selectpicker" data-live-search="true"
                                                            name="academy_certificate">
                                                        <option selected disabled>-- حدد --</option>
                                                        <option
                                                            value="ثانوي" {{ old('academy_certificate') == 'ثانوي' ? 'selected' : '' }}>
                                                            ثانوي
                                                        </option>
                                                        <option
                                                            value="دبلوم" {{ old('academy_certificate') == 'دبلوم' ? 'selected' : '' }}>
                                                            دبلوم
                                                        </option>
                                                        <option
                                                            value="بكالوريوس" {{ old('academy_certificate') == 'بكالوريوس' ? 'selected' : '' }}>
                                                            بكالوريوس
                                                        </option>
                                                        <option
                                                            value="ماستر" {{ old('academy_certificate') == 'ماستر' ? 'selected' : '' }}>
                                                            ماستر
                                                        </option>
                                                        <option
                                                            value="دكتوراة" {{ old('academy_certificate') == 'دكتوراة' ? 'selected' : '' }}>
                                                            دكتوراة
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> تصنيف المسمى الوظيفي </label>
                                                    <div class="ls-inputicon-box">
                                                        <select class="wt-select-box selectpicker"
                                                                name="job-category"
                                                                data-live-search="true" title="" id="job-category"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            @foreach($nameJobsCategories as $jobcategory)
                                                                <option
                                                                    value="{{$jobcategory['id']}}" {{ old('job-category') == $jobcategory['id'] ? 'selected' : '' }}>
                                                                    {{$jobcategory['name']}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> المسمى الوظيفي </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="form-control" name="job_name" title=""
                                                                id="job-name">
                                                            <option disabled selected value=""> حدد</option>
                                                            <!-- Options will be populated dynamically -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                document.addEventListener('DOMContentLoaded', function () {
                                                    const jobCategorySelect = document.getElementById('job-category');
                                                    const jobNameSelect = document.getElementById('job-name');
                                                    const oldJobName = "{{ old('job_name') }}";

                                                    // Fetch job names on page load if there's an old value for job-category
                                                    if (jobCategorySelect.value) {
                                                        fetchJobs(jobCategorySelect.value);
                                                    }

                                                    jobCategorySelect.addEventListener('change', function () {
                                                        fetchJobs(this.value);
                                                    });

                                                    function fetchJobs(categoryId) {
                                                        fetch(`/get-jobs-by-category/${categoryId}`)
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                jobNameSelect.innerHTML = '<option disabled selected value=""> حدد</option>';
                                                                data.forEach(job => {
                                                                    let option = document.createElement('option');
                                                                    option.value = job.id;
                                                                    option.textContent = job.title;

                                                                    // Set the old selected value if it matches
                                                                    if (job.id == oldJobName) {
                                                                        option.selected = true;
                                                                    }

                                                                    jobNameSelect.appendChild(option);
                                                                });

                                                                // Optional: Refresh the selectpicker to apply changes
                                                                // $('.selectpicker').selectpicker('refresh');
                                                            })
                                                            .catch(error => console.error('Error:', error));
                                                    }
                                                });
                                            </script>


                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> تصنيف التخصص المهني </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                                name="special_category"
                                                                data-live-search="true" title="" id="specialistCategory"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            @foreach($specialistsCategories as $specialcategory)
                                                                <option
                                                                    value="{{$specialcategory['id']}}" {{ old('special_category') == $specialcategory['id'] ? 'selected' : '' }}>
                                                                    {{$specialcategory['name']}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> التخصص المهني المطلوب ؟ </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="form-control"
                                                                name="profession_specialist" title=""
                                                                id="specialist_name">
                                                            <option disabled selected value=""> حدد</option>
                                                            <!-- Options will be populated dynamically -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                document.addEventListener('DOMContentLoaded', function () {
                                                    const specialistCategorySelect = document.getElementById('specialistCategory');
                                                    const specialistNameSelect = document.getElementById('specialist_name');
                                                    const oldSpecialist = "{{ old('profession_specialist') }}";

                                                    // Fetch specialist names on page load if there's an old value for special_category
                                                    if (specialistCategorySelect.value) {
                                                        fetchSpecialists(specialistCategorySelect.value);
                                                    }

                                                    specialistCategorySelect.addEventListener('change', function () {
                                                        fetchSpecialists(this.value);
                                                    });

                                                    function fetchSpecialists(categoryId) {
                                                        fetch(`/get-specialist-by-category/${categoryId}`)
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                specialistNameSelect.innerHTML = '<option disabled selected value=""> حدد</option>';
                                                                data.forEach(special => {
                                                                    let option = document.createElement('option');
                                                                    option.value = special.id;
                                                                    option.textContent = special.name;

                                                                    // Set the old selected value if it matches
                                                                    if (special.id == oldSpecialist) {
                                                                        option.selected = true;
                                                                    }

                                                                    specialistNameSelect.appendChild(option);
                                                                });

                                                                // Optional: Refresh the selectpicker to apply changes
                                                                // $('.selectpicker').selectpicker('refresh');
                                                            })
                                                            .catch(error => console.error('Error:', error));
                                                    }
                                                });
                                            </script>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> عدد سنوات الخبرة </label>
                                                    <div class="ls-inputicon-box">
                                                        <input required class="form-control" min="1" name="experience"
                                                               type="number" value="{{ old('experience') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> اللغة المطلوبة </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker" multiple
                                                                name="language[]"
                                                                data-live-search="true" title="حدد اللغة المطلوبة" id="language-select"
                                                                data-bv-field="size" >
                                                            <option
                                                                value="عربي" {{ in_array('عربي', old('language', [])) ? 'selected' : '' }}>
                                                                عربي
                                                            </option>
                                                            <option
                                                                value="انجليزي" {{ in_array('انجليزي', old('language', [])) ? 'selected' : '' }}>
                                                                انجليزي
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> مستوي اللغة </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                                name="language_level"
                                                                data-live-search="true" title=""
                                                                id="language-level-select"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            <option
                                                                value="مبتدأ" {{ old('language_level') == 'مبتدأ' ? 'selected' : '' }}>
                                                                مبتدأ
                                                            </option>
                                                            <option
                                                                value="متوسط" {{ old('language_level') == 'متوسط' ? 'selected' : '' }}>
                                                                متوسط
                                                            </option>
                                                            <option
                                                                value="متقدم" {{ old('language_level') == 'متقدم' ? 'selected' : '' }}>
                                                                متقدم
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> الراتب المحدد </label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" min="1" name="salary"
                                                               type="number" value="{{ old('salary') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>موقع العمل <span class="badge badge-danger bg-danger"> [ دولة ، مدينة  ] </span></label>
                                                    <div class="ls-inputicon-box">
                                                        <input required class="form-control" name="new_work_place"
                                                               type="text" value="{{ old('new_work_place') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> نوع العمل </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                                name="new_work_time"
                                                                data-live-search="true" title="" id="work-type-select"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            <option
                                                                value="جزئي" {{ old('new_work_time') == 'جزئي' ? 'selected' : '' }}>
                                                                جزئي
                                                            </option>
                                                            <option
                                                                value="كامل" {{ old('new_work_time') == 'كامل' ? 'selected' : '' }}>
                                                                كامل
                                                            </option>
                                                            <option
                                                                value="مؤقت" {{ old('new_work_time') == 'مؤقت' ? 'selected' : '' }}>
                                                                مؤقت
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> العمر المطلوب </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                                name="new_age"
                                                                data-live-search="true" title="" id="age-select"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            <option
                                                                value="18-24" {{ old('new_age') == '18-24' ? 'selected' : '' }}>
                                                                18-24
                                                            </option>
                                                            <option
                                                                value="25-29" {{ old('new_age') == '25-29' ? 'selected' : '' }}>
                                                                25-29
                                                            </option>
                                                            <option
                                                                value="30-39" {{ old('new_age') == '30-39' ? 'selected' : '' }}>
                                                                30-39
                                                            </option>
                                                            <option
                                                                value="+40" {{ old('new_age') == '+40' ? 'selected' : '' }}>
                                                                +40
                                                            </option>
                                                            <option
                                                                value="لايهم" {{ old('new_age') == 'لايهم' ? 'selected' : '' }}>
                                                                لايهم
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> متى احتياجك لأغلاق الشاغر </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                                name="notification_timeslot"
                                                                data-live-search="true" title=""
                                                                id="notification_timeslot"
                                                                data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            <option
                                                                value="فوري" {{ old('notification_timeslot') == 'فوري' ? 'selected' : '' }}>
                                                                فوري
                                                            </option>
                                                            <option
                                                                value="خلال شهر" {{ old('notification_timeslot') == 'خلال شهر' ? 'selected' : '' }}>
                                                                خلال شهر
                                                            </option>
                                                            <option
                                                                value="خلال شهرين" {{ old('notification_timeslot') == 'خلال شهرين' ? 'selected' : '' }}>
                                                                خلال شهرين
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> الوصف الوظيفي </label>
                                                    <textarea required class="form-control" rows="3"
                                                              name="description">{{ old('description') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> المهام الوظيفية <span class="badge badge-danger bg-danger"> افصل بين كل نقطة والاخري ب (,) </span>
                                                    </label>
                                                    <textarea class="form-control" rows="3"
                                                              name="job_requirements">{{ old('job_requirements') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> المؤهلات والخبرات <span
                                                            class="badge badge-danger bg-danger"> افصل بين كل نقطة والاخري ب (,) </span>
                                                    </label>
                                                    <textarea class="form-control" rows="3"
                                                              name="job_experience">{{ old('job_experience') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> مميزات العمل <span class="badge badge-danger bg-danger"> افصل بين كل نقطة والاخري ب (,) </span>
                                                    </label>
                                                    <textarea class="form-control" rows="3"
                                                              name="job_advantage">{{ old('job_advantage') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> البيانات المطلوبة للتقديم <span
                                                            class="badge badge-danger bg-danger"> افصل بين كل نقطة والاخري ب (,) </span>
                                                    </label>
                                                    <textarea class="form-control" rows="3"
                                                              name="job_needed">{{ old('job_needed') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="text-left">
                                                    <button type="submit" class="site-button m-r5">نشر الوظيفة</button>

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


