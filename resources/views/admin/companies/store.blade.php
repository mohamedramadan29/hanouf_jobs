@extends('admin.layouts.master')
@section('title')
    اضافة شركة جديدة
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                   اضافة شركة جديدة</span>
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


                    <form class="form-horizontal" method="post" action="{{ url('admin/company/store') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> الأسم </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required type="text" class="form-control" name="name"
                                                   value="{{old('name')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> البريد الالكتروني </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required type="text" class="form-control" name="email"
                                                   value="{{old('email')}}">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> رقم الهاتف </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required type="tel" class="form-control" name="mobile"
                                                   value="{{old('mobile')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> كلمة المرور </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required type="password" min="8" class="form-control" name="password"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> تاكيد كلمة المرور </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required type="password" min="8" class="form-control"
                                                   name="confirm_password" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> لوجو الشركة </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="file" accept="image/*" class="form-control"
                                                   name="logo" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> حدد الخطة </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="plan_selected" id="" class="form-control">
                                                <otpion> -- حدد الخطة --</otpion>
                                                <option value="0"> لا يوجد</option>
                                                @foreach($plans as $plan)
                                                    <option @if(old('plan_selected') == $plan['id']) selected
                                                            @endif value="{{$plan['id']}}"> {{$plan['name']}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> معلومات عن الشركة </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea required class='form-control' name='info'
                                                      rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> مصدر المعرفة </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="wherelisting" id="" class="form-control select2">
                                                <otpion> -- حدد مصدر المعرفة --</otpion>
                                                <option value="تلجرام">تلجرام</option>
                                                <option @if(old('wherelisting') == 'لينكدان') selected
                                                        @endif value="لينكدان">لينكدان
                                                </option>
                                                <option @if(old('wherelisting') == 'تويتر') selected
                                                        @endif value="تويتر">تويتر
                                                </option>
                                                <option @if(old('wherelisting') == 'فيسبوك') selected
                                                        @endif value="فيسبوك">فيسبوك
                                                </option>
                                                <option @if(old('wherelisting') == 'انستجرام') selected
                                                        @endif value="انستجرام">انستجرام
                                                </option>
                                                <option @if(old('wherelisting') == 'يوتيوب') selected
                                                        @endif value="يوتيوب">يوتيوب
                                                </option>
                                                <option @if(old('wherelisting') == 'من الاصدقاء') selected @endif value="من الاصدقاء">من الاصدقاء</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class='btn btn-primary' type='submit'> اضف شركة <i class="fa fa-plus"></i></button>
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
