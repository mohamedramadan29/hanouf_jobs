@extends('admin.layouts.master')
@section('title')
    تفاصيل الموظف
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                   تفاصيل الموظف </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <!-- row -->
    <div class="row row-sm">
        <!-- Col -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('Success_message'))
                        <div class="alert alert-success"> {{ Session::get('Success_message') }} </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form class="form-horizontal" method="post" action=""
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">

                                <div class="form-group ">
                                    <label class="form-label"> الأسم </label>
                                    <input disabled readonly type="text" class="form-control" name="name"
                                           value="{{$user['name']}}">
                                </div>

                                <div class="form-group ">
                                    <label class="form-label"> البريد الالكتروني </label>
                                    <input disabled readonly type="text" class="form-control" name="email"
                                           value="{{$user['email']}}">
                                </div>


                                <div class="form-group ">

                                    <label class="form-label"> رقم الهاتف </label>
                                    <input type="text" readonly disabled class="form-control" name="mobile"
                                           value="{{$user['mobile']}}">

                                </div>
                                <div class="form-group ">

                                    <label class="form-label"> رقم الهاتف </label>
                                    <input type="text" readonly disabled class="form-control" name="mobile"
                                           value="{{$user['mobile']}}">

                                </div>
                                <div class="form-group">
                                    <label> حدد الجنسية </label>
                                    <div class="ls-inputicon-box">
                                        <select disabled readonly="" required class="form-control"
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
                                <div class="form-group city-outer-bx has-feedback">
                                    <label> حدد الجنس </label>
                                    <div class="ls-inputicon-box">
                                        <select disabled readonly="" required class="form-control"
                                                name="sex"
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
                                <div class="form-group city-outer-bx has-feedback">
                                    <label> المدينة </label>
                                    <div class="ls-inputicon-box">
                                        <select disabled readonly="" required class="form-control" name="city"
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
                                <div class="form-group city-outer-bx has-feedback">
                                    <label> إمكانية التنقل من مدينة أخرى للعمل </label>
                                    <div class="ls-inputicon-box">
                                        <select disabled required class="form-control"
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
                            <div class="col-lg-6 col-12">
                                <div class="form-group city-outer-bx has-feedback">
                                    <label> حدد تصنيف المسمي الوظيفي </label>
                                    <div class="ls-inputicon-box">
                                        <select disabled class="form-control"
                                                name="job_category"
                                                data-live-search="true" title="" id="job-category"
                                                data-bv-field="size">
                                            <option disabled selected value=""> حدد</option>
                                            @foreach($nameJobsCategories as $jobcategory)
                                                <option @if($user['job_category'] == $jobcategory['id']) selected @endif
                                                value="{{$jobcategory['id']}}">{{$jobcategory['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group city-outer-bx has-feedback">
                                    <label> المسمي الوظيفي </label>
                                    <div class="ls-inputicon-box">
                                        <select readonly="" disabled required class="form-control"
                                                name="job_name" title="" id="job-name">
                                            @if($user['job_name'] !='')
                                                <option selected
                                                        value="{{$user['job_name']}}">{{$user['jobs_name']['title']}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group city-outer-bx has-feedback">
                                    <label> حدد تصنيف التخصص المهني </label>
                                    <div class="ls-inputicon-box">
                                        <select disabled readonly="" required class="form-control"
                                                name="special_category"
                                                data-live-search="true" title="" id="specialistCategory"
                                                data-bv-field="size">
                                            <option disabled selected value=""> حدد</option>
                                            @foreach($specialistsCategories as $specialcategory)
                                                <option
                                                    @if($user['special_category'] == $specialcategory['id']) selected
                                                    @endif
                                                    value="{{$specialcategory['id']}}"> {{$specialcategory['name']}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group city-outer-bx has-feedback">
                                    <label> ماهي تخصصك المهني ؟ </label>
                                    <div class="ls-inputicon-box">
                                        <select disabled readonly="" required class="form-control"
                                                name="profession_specialist" id="specialist_name">
                                            @if($user['profession_specialist'] !='')
                                                <option selected
                                                        value="{{$user['profession_specialist']}}">{{$user['specialist']['name']}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <label class="form-label"> مصدر المعرفة </label>


                                    <select disabled readonly="" name="wherelisting" id="" class="form-control select2">
                                        <otpion> -- حدد مصدر المعرفة --</otpion>
                                        <option value="تلجرام">تلجرام</option>
                                        <option @if($user['wherelisting'] == 'لينكدان') selected
                                                @endif value="لينكدان">لينكدان
                                        </option>
                                        <option @if($user['wherelisting'] == 'تويتر') selected
                                                @endif value="تويتر">تويتر
                                        </option>
                                        <option @if($user['wherelisting'] == 'فيسبوك') selected
                                                @endif value="فيسبوك">فيسبوك
                                        </option>
                                        <option @if($user['wherelisting'] == 'انستجرام') selected
                                                @endif value="انستجرام">انستجرام
                                        </option>
                                        <option @if($user['wherelisting'] == 'يوتيوب') selected
                                                @endif value="يوتيوب">يوتيوب
                                        </option>
                                        <option @if($user['wherelisting'] == 'من الاصدقاء') selected
                                                @endif value="من الاصدقاء">من الاصدقاء
                                        </option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label> عدد سنوات الخبرة </label>
                                    <div class="ls-inputicon-box">
                                        <input disabled readonly required class="form-control" min="1" name="experience"
                                               type="number" value="{{$user['experience']}}">
                                    </div>
                                </div>
                                <div class="ls-inputicon-box">
                                    @php
                                        $languages = explode(',',$user['language']);
                                    @endphp
                                    <label> حدد اللغة </label>
                                    <select readonly="" disabled required class="form-control select2" multiple
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

                                <div class="form-group city-outer-bx has-feedback">
                                    <label> مستوي اللغة </label>
                                    <div class="ls-inputicon-box">
                                        <select required class="form-control" readonly="" disabled
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

                                <div class="form-group">
                                    <label> الراتب المحدد </label>
                                    <div class="ls-inputicon-box">
                                        <input required disabled readonly class="form-control" min="1" name="salary"
                                               type="number" value="{{$user['salary']}}">
                                    </div>
                                </div>

                                <div class="form-group city-outer-bx has-feedback">
                                    <label> هل انت مستعد للعمل ؟ </label>
                                    <div class="ls-inputicon-box">
                                        <select disabled readonly="" required class="form-control"
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
                        </div>
                    </form>

                </div>

            </div>
        </div>
        <!-- /Col -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
