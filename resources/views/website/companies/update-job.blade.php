@extends('website.layouts.master')
@section('title')
    تعديل الوظيفة
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
            style="background-image:url({{ asset('assets/website/images/banner/1.jpg') }});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title"> تعديل الوظيفة </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{ url('/') }}"> الرئيسية </a></li>
                            <li> تعديل الوظيفة</li>
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
                                @if (\Illuminate\Support\Facades\Auth::guard('company')->user()->logo != '')
                                    <img src="{{ asset('assets/uploads/companies/' . Auth::guard('company')->user()->logo) }}"
                                        alt="">
                                @else
                                    <img src="{{ asset('assets/website/images/jobs-company/pic1.jpg') }}" alt="">
                                @endif

                            </div>

                            <div class="twm-mid-content text-center" style="margin-bottom: 15px">
                                <a href="{{ url('company/dashboard') }}" class="twm-job-title">
                                    <h4 style="margin-bottom: 10px"> {{ Auth::guard('company')->user()->name }} </h4>
                                </a>
                                <p> {{ Auth::guard('company')->user()->email }} </p>
                            </div>
                            <div class="twm-nav-list-1">
                                <ul>
                                    <li><a href="{{ url('company/dashboard') }}"><i class="fa fa-user"></i>ملف الشركة</a>
                                    </li>
                                    <li><a href="{{ url('company/jobs') }}"><i class="fa fa-suitcase"></i> إدارة
                                            الوظائف</a></li>
                                    <li><a href="{{ url('company/add-job') }}"><i class="fa fa-user"></i>
                                            اضف وظيفة جديدة </a></li>
                                    <li><a href="{{ url('chat-main') }}"><i class="fa fa-credit-card"></i> المحادثات
                                        </a></li>
                                    {{--                                    <li><a href="{{url('company/plan')}}"><i class="fa fa-credit-card"></i> ادارة الخطة --}}
                                    {{--                                        </a></li> --}}
                                    <li><a href="{{ url('company/change-password') }}"><i class="fa fa-fingerprint"></i>
                                            تغيير كلمة المرور</a></li>
                                    <li><a href="{{ url('company/logout') }}"><i class="fa fa-share-square"></i> تسجيل
                                            خروج</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                        <!--Filter Short By-->
                        <div class="twm-right-section-panel site-bg-gray">
                            <form method="post" action="{{ url('company/job/' . $adv['id']) }}">
                                @csrf
                                <!--Basic Information-->
                                <div class="panel panel-default">
                                    <div class="panel-heading wt-panel-heading p-a20">
                                        <h4 class="panel-tittle m-a0"><i class="fa fa-suitcase"></i>تفاصيل الوظيفة</h4>
                                    </div>
                                    <div class="panel-body wt-panel-body p-a20 m-b30 ">

                                        <div class="row">

                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label> عنوان الإعلان الوظيفي </label>
                                                    <div class="ls-inputicon-box">
                                                        <input required class="form-control" name="title" type="text"
                                                            value="{{ $adv['title'] }}">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <input type="hidden" name="company_id"
                                                    value="{{ \Illuminate\Support\Facades\Auth::guard('company')->user()->id }}">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> حدد الجنسية </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                            name="nationality" data-live-search="true" title=""
                                                            id="j-category" data-bv-field="size">
                                                            <option disabled selected value="">حدد الجنسية</option>
                                                            <option @if ($adv['nationality'] == 'سعودي') selected @endif
                                                                value="سعودي">سعودي/ة</option>
                                                            <option @if ($adv['nationality'] == 'أردني') selected @endif
                                                                value="أردني">أردني/ة</option>
                                                            <option @if ($adv['nationality'] == 'مصري') selected @endif
                                                                value="مصري">مصري/ة</option>
                                                            <option @if ($adv['nationality'] == 'سوداني') selected @endif
                                                                value="سوداني">سوداني/ة</option>
                                                            <option @if ($adv['nationality'] == 'فلسطيني') selected @endif
                                                                value="فلسطيني">فلسطيني/ة</option>
                                                            <option @if ($adv['nationality'] == 'لبناني') selected @endif
                                                                value="لبناني">لبناني/ة</option>
                                                            <option @if ($adv['nationality'] == 'سوري') selected @endif
                                                                value="سوري">سوري/ة</option>
                                                            <option @if ($adv['nationality'] == 'يمني') selected @endif
                                                                value="يمني">يمني/ة</option>
                                                            <option @if ($adv['nationality'] == 'تونسي') selected @endif
                                                                value="تونسي">تونسي/ة</option>
                                                            <option @if ($adv['nationality'] == 'مغربي') selected @endif
                                                                value="مغربي">مغربي/ة</option>
                                                            <option @if ($adv['nationality'] == 'جزائري') selected @endif
                                                                value="جزائري">جزائري/ة</option>
                                                            <option @if ($adv['nationality'] == 'ليبي') selected @endif
                                                                value="ليبي">ليبي/ة</option>
                                                            <option @if ($adv['nationality'] == 'أرتيري') selected @endif
                                                                value="أرتيري">أرتيري/ة</option>
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
                                                            <option disabled selected value=""> حدد الجنس</option>
                                                            <option @if ($adv['sex'] == 'ذكر') selected @endif
                                                                value="ذكر"> ذكر
                                                            </option>
                                                            <option @if ($adv['sex'] == 'انثي') selected @endif
                                                                value="انثي"> انثى
                                                            </option>
                                                            <option @if ($adv['sex'] == 'كلاهما') selected @endif
                                                                value="كلاهما"> كلاهما
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
                                                            @foreach ($citizen as $city)
                                                                <option @if ($adv['city'] == $city['id']) selected @endif
                                                                    value="{{ $city['id'] }}"> {{ $city['name'] }}
                                                                </option>
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
                                                            <option disabled selected value=""> حدد</option>
                                                            <option @if ($adv['available_work_from_another_place'] == 1) selected @endif
                                                                value="1">نعم
                                                            </option>
                                                            <option @if ($adv['available_work_from_another_place'] == 2) selected @endif
                                                                value="2">لا
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label> المؤهل العلمي </label>
                                                    <select class="form-select" name="academy_certificate">
                                                        <option selected disabled> -- حدد -- </option>
                                                        <option @if ($adv['academy_certificate'] == 'ثانوي') selected @endif
                                                            value="ثانوي">ثانوي </option>
                                                        <option @if ($adv['academy_certificate'] == 'دبلوم') selected @endif
                                                            value="دبلوم">دبلوم </option>
                                                        <option @if ($adv['academy_certificate'] == 'بكالوريوس') selected @endif
                                                            value="بكالوريوس">بكالوريوس</option>
                                                        <option @if ($adv['academy_certificate'] == 'ماستر') selected @endif
                                                            value="ماستر">ماستر </option>
                                                        <option @if ($adv['academy_certificate'] == 'دكتوراة') selected @endif
                                                            value="دكتوراة">دكتوراة </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> تصنيف المسمى الوظيفي </label>
                                                    <div class="ls-inputicon-box">
                                                        <select class="wt-select-box selectpicker" name="job-category"
                                                            data-live-search="true" title="" id="job-category"
                                                            data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            @foreach ($nameJobsCategories as $jobcategory)
                                                                <option @if ($adv['job-category'] == $jobcategory['id']) selected @endif
                                                                    value="{{ $jobcategory['id'] }}">
                                                                    {{ $jobcategory['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> المسمى الوظيفي </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="form-control" name="job_name"
                                                            title="" id="job-name">
                                                            <option disabled selected value=""> حدد</option>
                                                            @foreach ($JobsNames as $jobname)
                                                                <option @if ($jobname['id'] == $adv['job_name']) selected @endif
                                                                    value="{{ $jobname['id'] }}"> {{ $jobname['title'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                document.getElementById('job-category').addEventListener('change', function() {
                                                    let categoryId = this.value;
                                                    fetch(`/get-jobs-by-category/${categoryId}`)
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            let jobNameSelect = document.getElementById('job-name');
                                                            jobNameSelect.innerHTML = '<option disabled selected value=""> حدد</option>';

                                                            data.forEach(job => {
                                                                let option = document.createElement('option');
                                                                option.value = job.id;
                                                                option.textContent = job.title;
                                                                jobNameSelect.appendChild(option);
                                                            });

                                                            // Refresh the selectpicker to apply changes
                                                            //$('.selectpicker').selectpicker('refresh');
                                                        })
                                                        .catch(error => console.error('Error:', error));
                                                });
                                            </script>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> حدد تصنيف التخصص المهني </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                            name="special_category" data-live-search="true"
                                                            title="" id="specialistCategory" data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            @foreach ($specialistsCategories as $specialcategory)
                                                                <option @if ($adv['special_category'] == $specialcategory['id']) selected @endif
                                                                    value="{{ $specialcategory['id'] }}">
                                                                    {{ $specialcategory['name'] }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> التخصص المهني المطلوب ؟ </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="form-control" name="profession_specialist"
                                                            title="" id="specialist_name">
                                                            <option disabled value=""> حدد</option>
                                                            @foreach ($specialists as $special)
                                                                <option @if ($special['id'] == $adv['profession_specialist']) selected @endif
                                                                    value="{{ $special['id'] }}"> {{ $special['name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                document.getElementById('specialistCategory').addEventListener('change', function() {
                                                    let categoryId = this.value;
                                                    fetch(`/get-specialist-by-category/${categoryId}`)
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            let specialNameSelect = document.getElementById('specialist_name');
                                                            specialNameSelect.innerHTML = '<option disabled selected value=""> حدد</option>';

                                                            data.forEach(special => {
                                                                let option = document.createElement('option');
                                                                option.value = special.id;
                                                                option.textContent = special.name;
                                                                specialNameSelect.appendChild(option);
                                                            });

                                                            // Refresh the selectpicker to apply changes
                                                            //$('.selectpicker').selectpicker('refresh');
                                                        })
                                                        .catch(error => console.error('Error:', error));
                                                });
                                            </script>



                                            {{--                                            <div class="col-xl-6 col-lg-6 col-md-12"> --}}
                                            {{--                                                <div class="form-group city-outer-bx has-feedback"> --}}
                                            {{--                                                    <label> طبيعه العمل </label> --}}
                                            {{--                                                    <div class="ls-inputicon-box"> --}}
                                            {{--                                                        @php --}}
                                            {{--                                                            $work_types = explode(',',$adv['work_type']); --}}
                                            {{--                                                        @endphp --}}
                                            {{--                                                        <select required multiple class="wt-select-box selectpicker" --}}
                                            {{--                                                                name="work_type[]" --}}
                                            {{--                                                                data-live-search="true" title="" id="j-category" --}}
                                            {{--                                                                data-bv-field="size"> --}}
                                            {{--                                                            <option @if (in_array('هاتفي', $work_types)) selected --}}
                                            {{--                                                                    @endif value="هاتفي">هاتفي --}}
                                            {{--                                                            </option> --}}
                                            {{--                                                            <option value="ميداني" --}}
                                            {{--                                                                    @if (in_array('ميداني', $work_types)) selected @endif> --}}
                                            {{--                                                                ميداني --}}
                                            {{--                                                            </option> --}}
                                            {{--                                                            <option value="مكتبي" --}}
                                            {{--                                                                    @if (in_array('مكتبي', $work_types)) selected @endif> --}}
                                            {{--                                                                مكتبي --}}
                                            {{--                                                            </option> --}}
                                            {{--                                                        </select> --}}
                                            {{--                                                    </div> --}}
                                            {{--                                                </div> --}}
                                            {{--                                            </div> --}}

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> عدد سنوات الخبرة </label>
                                                    <div class="ls-inputicon-box">
                                                        <input required class="form-control" min="1"
                                                            name="experience" type="number"
                                                            value="{{ $adv['experience'] }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> اللغة المطلوبة </label>
                                                    <div class="ls-inputicon-box">
                                                        @php
                                                            $languages = explode(',', $adv['language']);
                                                        @endphp
                                                        <select required class="wt-select-box selectpicker" multiple
                                                            name="language[]" data-live-search="true" title=""
                                                            id="j-category" data-bv-field="size">
                                                            <option @if (in_array('عربي', $languages)) selected @endif
                                                                value="عربي">
                                                                عربي
                                                            </option>
                                                            <option @if (in_array('انجليزي', $languages)) selected @endif
                                                                value="انجليزي">انجليزي
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
                                                            name="language_level" data-live-search="true" title=""
                                                            id="j-category" data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            <option @if ($adv['language_level'] == 'مبتدأ') selected @endif
                                                                value="مبتدأ">مبتدأ
                                                            </option>
                                                            <option @if ($adv['language_level'] == 'متوسط') selected @endif
                                                                value="متوسط">متوسط
                                                            </option>
                                                            <option @if ($adv['language_level'] == 'متقدم') selected @endif
                                                                value="متقدم">متقدم
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label> ماهو التخصص المهني المطلوب ؟ </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                            name="profession_specialist" data-live-search="true"
                                                            title="" id="j-category" data-bv-field="size">
                                                            <option disabled value=""> حدد</option>
                                                            @foreach ($specialists as $special)
                                                                <option @if ($special['id'] == $adv['profession_specialist']) selected @endif
                                                                    value="{{ $special['id'] }}"> {{ $special['name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> الراتب المحدد </label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" min="1" name="salary"
                                                            type="number" value="{{ $adv['salary'] }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> موقع العمل <span class="badge badge-danger bg-danger"> [ دولة ،
                                                            مدينة ] </span> </label>
                                                    <div class="ls-inputicon-box">
                                                        <input required class="form-control" name="new_work_place"
                                                            type="text" value="{{ $adv['new_work_place'] }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> نوع العمل </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker"
                                                            name="new_work_time" data-live-search="true" title=""
                                                            id="j-category" data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            <option @if ($adv['new_work_time'] == 'جزئي') selected @endif
                                                                value="جزئي">جزئي
                                                            </option>
                                                            <option @if ($adv['new_work_time'] == 'كامل') selected @endif
                                                                value="كامل">كامل
                                                            </option>
                                                            <option @if ($adv['new_work_time'] == 'مؤقت') selected @endif
                                                                value="مؤقت">مؤقت
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> العمر المطلوب </label>
                                                    <div class="ls-inputicon-box">
                                                        <select required class="wt-select-box selectpicker" name="new_age"
                                                            data-live-search="true" title="" id="j-category"
                                                            data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            <option @if ($adv['new_age'] == '18-24') selected @endif
                                                                value="18-24">18-24
                                                            </option>
                                                            <option @if ($adv['new_age'] == '25-29') selected @endif
                                                                value="25-29"> 25-29
                                                            </option>
                                                            <option @if ($adv['new_age'] == '30-39') selected @endif
                                                                value="30-39">30-39
                                                            </option>
                                                            <option @if ($adv['new_age'] == '+40') selected @endif
                                                                value="+40">+40
                                                            </option>
                                                            <option @if ($adv['new_age'] == 'لايهم') selected @endif
                                                                value="لايهم">لايهم
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
                                                            name="notification_timeslot" data-live-search="true"
                                                            title="" id="j-category" data-bv-field="size">
                                                            <option disabled selected value=""> حدد</option>
                                                            <option @if ($adv['notification_timeslot'] == 'فوري') selected @endif
                                                                value="فوري"> فوري
                                                            </option>
                                                            <option @if ($adv['notification_timeslot'] == 'خلال شهر') selected @endif
                                                                value="خلال شهر">خلال شهر
                                                            </option>
                                                            <option @if ($adv['notification_timeslot'] == 'خلال شهرين') selected @endif
                                                                value="خلال شهرين">خلال شهرين
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> الوصف الوظيفي </label>
                                                    <textarea required class="form-control" rows="3" name="description">{{ $adv['description'] }}</textarea>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> المهام الوظيفية <span class="badge badge-danger bg-danger">
                                                            افصل بين كل نقطة والاخري ب (,) </span>
                                                    </label>
                                                    <textarea class="form-control" rows="3" name="job_requirements">{{ $adv['job_requirements'] }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> المؤهلات والخبرات <span class="badge badge-danger bg-danger">
                                                            افصل بين كل نقطة والاخري ب (,) </span>
                                                    </label>
                                                    <textarea class="form-control" rows="3" name="job_experience">{{ $adv['job_experience'] }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> مميزات العمل <span class="badge badge-danger bg-danger"> افصل
                                                            بين كل نقطة والاخري ب (,) </span>
                                                    </label>
                                                    <textarea class="form-control" rows="3" name="job_advantage">{{ $adv['job_advantage'] }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> البيانات المطلوبة للتقديم <span
                                                            class="badge badge-danger bg-danger"> افصل بين كل نقطة والاخري
                                                            ب (,) </span>
                                                    </label>
                                                    <textarea class="form-control" rows="3" name="job_needed">{{ $adv['job_needed'] }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="text-left">
                                                    <button style="margin-bottom: 10px" type="submit"
                                                        class="site-button m-r5"> تعديل الوظيفة
                                                    </button>
                                                    <br>
                                                    <span class="badge badge-danger bg-danger"> عند التعديل سيتم مراجعتها
                                                        وتفعيلها بعد 24 ساعه – هل انت متأكد ؟ </span>
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
