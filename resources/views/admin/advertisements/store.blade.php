@extends('admin.layouts.master')
@section('title')
    اضافة اعلان جديد
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     اضافة اعلان جديد  </span>
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


                    <form class="form-horizontal" method="post" action="{{ url('admin/advertisement/store') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> حدد الشركة </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="company_id" id="" class="form-control select2">
                                                <option value=""> -- حدد الشركة --</option>
                                                @foreach($companies as $company)
                                                    <option value="{{$company['id']}}"> {{$company['name']}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> ماهي الجنسية </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="nationality" id="" class="form-control select2">
                                                <option value=""> -- حدد الجنسية --</option>
                                                <option value="مصري"> مصري</option>
                                                <option value="سعودي"> سعودي</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> الجنس </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="sex" id="" class="form-control select2">
                                                <option value=""> -- حدد الجنس --</option>
                                                <option value="ذكر"> ذكر</option>
                                                <option value="انثي"> انثي</option>
                                                <option value="كلاهما"> كلاهما </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> المدينة </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="city" id="" class="form-control select2">
                                                <option value=""> -- حدد المدينة --</option>
                                                @foreach($citizen as $city)

                                                    <option value="{{$city['id']}}"> {{$city['name']}} </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">هل ترغب في من يسكن في منطقة اخرى وليس لدية مانع
                                                بالعمل في مدينتك ؟ </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="available_work_from_another_place" id=""
                                                    class="form-control select2">
                                                <option value=""> -- حدد --</option>
                                                <option value="1">نعم</option>
                                                <option value="2">لا</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> مسمى الوظيفي للمبيعات
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="job_name" id="" class="form-control select2">
                                                <option value=""> -- حدد --</option>
                                                @foreach($JobsNames as $jobname)
                                                    <option value="{{$jobname['id']}}"> {{$jobname['title']}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> طبيعة العمل
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="work_type[]" id="" class="form-control select2" multiple>
                                                <option value=""> -- حدد --</option>
                                                <option value="هاتفي">هاتفي</option>
                                                <option value="ميداني">ميداني</option>
                                                <option value="مكتبي">مكتبي</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> عدد سنوات الخبرة </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required type="number" min="1" class="form-control" name="experience"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> اللغة المطلوبة
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="language[]" id="" class="form-control select2" multiple>
                                                <option value=""> -- حدد --</option>
                                                <option value="عربي">عربي</option>
                                                <option value="انجليزي">انجليزي</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> مستوي اللغة
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="language_level" id="" class="form-control select2">
                                                <option value=""> -- حدد --</option>
                                                <option value="مبتدأ">مبتدأ</option>
                                                <option value="متوسط">متوسط</option>
                                                <option value="متقدم">متقدم</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-12">


                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> ماهو التخصص المهني المطلوب ؟
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="profession_specialist" id="" class="form-control select2">
                                                <option value=""> -- حدد --</option>
                                                @foreach($specialists as $special)
                                                    <option value="{{$special['id']}}"> {{$special['name']}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label> موقع العمل  </label>
                                        <div class="ls-inputicon-box">
                                            <input required class="form-control" name="new_work_place" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label> نوع العمل  </label>
                                        <div class="ls-inputicon-box">
                                            <select required class="wt-select-box selectpicker" name="new_work_time"
                                                    data-live-search="true" title="" id="j-category"
                                                    data-bv-field="size">
                                                <option disabled selected value=""> حدد  </option>
                                                <option value="جزئي">جزئي</option>
                                                <option value="كامل">كامل</option>
                                                <option value="مؤقت">مؤقت</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label> العمر المطلوب   </label>
                                        <div class="ls-inputicon-box">
                                            <select required class="wt-select-box selectpicker" name="new_age"
                                                    data-live-search="true" title="" id="j-category"
                                                    data-bv-field="size">
                                                <option disabled selected value=""> حدد  </option>
                                                <option value="18-24">18-24</option>
                                                <option value="25-29"> 25-29 </option>
                                                <option value="30-39">30-39</option>
                                                <option value="+40">+40</option>
                                                <option value="لايهم">لايهم</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> يوجد لدينا مرشحين على رأس العمل ويملكون فترة
                                                اشعار
                                                محدده , أختر الفترة المناسبة لك
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="notification_timeslot" id="" class="form-control select2">
                                                <option value=""> -- حدد --</option>
                                                <option value="فوري"> فوري</option>
                                                <option value="خلال شهر">خلال شهر</option>
                                                <option value="خلال شهرين">خلال شهرين</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> الراتب المحدد
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required type="number" min="1" class="form-control" name="salary"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">الوصف الوظيفي
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea required class='form-control' name='description'
                                                      rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> العنوان
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required type="text" class="form-control" name="title"
                                                   value="">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label> المهام الوظيفية <span class="badge badge-danger bg-danger"> افصل بين كل نقطة والاخري ب (,) </span> </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="3" name="job_requirements"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label> المؤهلات والخبرات  <span class="badge badge-danger bg-danger"> افصل بين كل نقطة والاخري ب (,) </span> </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea  class="form-control" rows="3" name="job_experience"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>   مميزات العمل    <span class="badge badge-danger bg-danger"> افصل بين كل نقطة والاخري ب (,) </span> </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea  class="form-control" rows="3" name="job_advantage"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>     المعلومات المطلوبة  <span class="badge badge-danger bg-danger"> افصل بين كل نقطة والاخري ب (,) </span> </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="3" name="job_needed"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> حالة الاعلان </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select required class='form-control select2' name='status'>
                                                <option> -- حدد حالة --</option>
                                                <option value='1'> فعال</option>
                                                <option value='0'> غير فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class='btn btn-primary' type='submit'> اضف اعلان جديد <i class="fa fa-plus"></i>
                        </button>
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
