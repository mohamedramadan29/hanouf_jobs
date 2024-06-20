@extends('admin.layouts.master')
@section('title')
    تعديل الاعلان
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                      تعديل الاعلان   </span>
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


                    <form class="form-horizontal" method="post"
                          action="{{ url('admin/advertisement/update/'.$adv['id']) }}"
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
                                                    <option @if($adv['company_id'] == $company['id']) selected
                                                            @endif value="{{$company['id']}}"> {{$company['name']}} </option>
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
                                                <option @if($adv['nationality'] == 'مصري') selected @endif value="مصري">
                                                    مصري
                                                </option>
                                                <option @if($adv['nationality'] == 'سعودي') selected
                                                        @endif value="سعودي"> سعودي
                                                </option>
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
                                                <option @if($adv['sex'] == 'ذكر') selected @endif value="ذكر"> ذكر
                                                </option>
                                                <option @if($adv['sex'] == 'انثي') selected @endif value="انثي"> انثي
                                                </option>
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
                                                    <option @if($adv['city'] == $city['id']) selected
                                                            @endif value="{{$city['id']}}"> {{$city['name']}} </option>
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
                                                <option @if($adv['available_work_from_another_place'] == 1) selected
                                                        @endif value="1">نعم
                                                </option>
                                                <option @if($adv['available_work_from_another_place'] == 2) selected
                                                        @endif value="2">لا
                                                </option>
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
                                                <option selected value="١">١</option>
                                                <option value="٢">٢</option>
                                                <option value="٣">٣</option>
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
                                            @php
                                                $work_types = explode(',',$adv['work_type']);
                                            @endphp
                                            <select name="work_type[]" id="" class="form-control select2" multiple>
                                                <option value=""> -- حدد --</option>
                                                <option @if(in_array('هاتفي',$work_types)) selected
                                                        @endif value="هاتفي">هاتفي
                                                </option>
                                                <option value="ميداني"
                                                        @if(in_array('ميداني', $work_types)) selected @endif>ميداني
                                                </option>
                                                <option value="مكتبي"
                                                        @if(in_array('مكتبي', $work_types)) selected @endif>مكتبي
                                                </option>
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
                                                   value="{{$adv['experience']}}">
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
                                            @php
                                                $languages = explode(',',$adv['language']);
                                            @endphp
                                            <select name="language[]" id="" class="form-control select2" multiple>
                                                <option value=""> -- حدد --</option>
                                                <option @if(in_array('عربي',$languages)) selected @endif value="عربي">
                                                    عربي
                                                </option>
                                                <option @if(in_array('انجليزي',$languages)) selected
                                                        @endif value="انجليزي">انجليزي
                                                </option>
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
                                                <option @if($adv['language_level'] == 'مبتدأ') selected
                                                        @endif value="مبتدأ">مبتدأ
                                                </option>
                                                <option @if($adv['language_level'] == 'متوسط') selected
                                                        @endif value="متوسط">متوسط
                                                </option>
                                                <option @if($adv['language_level'] == 'متقدم') selected
                                                        @endif value="متقدم">متقدم
                                                </option>
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
                                                <option @if($adv['profession_specialist'] == 'التخصص الاول') selected
                                                        @endif value="التخصص الاول"> التخصص الاول
                                                </option>
                                                <option @if($adv['profession_specialist'] == 'التخصص الاول') selected
                                                        @endif value="التخصص الاول"> التخصص الاول
                                                </option>

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
                                                <option @if($adv['notification_timeslot'] == 'فوري') selected @endif value="فوري"> فوري</option>
                                                <option @if($adv['notification_timeslot'] == 'خلال شهر') selected @endif value="خلال شهر">خلال شهر</option>
                                                <option @if($adv['notification_timeslot'] == 'خلال شهرين') selected @endif value="خلال شهرين">خلال شهرين</option>
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
                                                   value="{{$adv['salary']}}">
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
                                                      rows="10">{{$adv['description']}}</textarea>
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
                                                   value="{{$adv['title']}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> اسم المنشور
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required type="text" class="form-control" name="title_name"
                                                   value="{{$adv['title_name']}}">
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
                                                <option @if($adv['status'] == 1) selected @endif value='1'> فعال</option>
                                                <option @if($adv['status'] == 0) selected @endif value='0'> غير فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class='btn btn-primary' type='submit'> تعديل الاعلان  <i class="fa fa-edit"></i>
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
