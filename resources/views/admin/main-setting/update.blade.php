@extends('admin.layouts.master')
@section('title')
    الاعدادات العامة للموقع
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الاعدادات
                    العامة للموقع </span>
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
                    <div class="mb-4 main-content-label"> الاعدادات العامة للموقع </div>
                    <form class="form-horizontal" method="post" action="{{ route('update_main_setting') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> الاسم </label>
                                </div>
                                <div class="col-md-9">
                                    <input required type="text" name="name" class="form-control"
                                        value="{{ $setting['name'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> البريد الالكتروني </label>
                                </div>
                                <div class="col-md-9">
                                    <input required type="email" class="form-control" name="email"
                                        value="{{ $setting['email'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">رقم الهاتف</label>
                                </div>
                                <div class="col-md-9">
                                    <input required type="text" name="phone" class="form-control"
                                        value="{{ $setting['phone'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> العنوان </label>
                                </div>
                                <div class="col-md-9">
                                    <input required type="text" name="address" class="form-control"
                                        value="{{ $setting['address'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> وصف مختصر عن الموقع  </label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="description" id="" class="form-control" required>{{ $setting['description'] }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> لوجو الموقع </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="logo" accept="image/*">
                                </div>
                                @if (!empty($setting->logo))
                                    <img width="80px" src="{{ $setting->getLogo() }}"
                                        class="img-fluid img-thumbnail">
                                @endif

                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> الصورة المصغرة </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="favicon" accept="image/*">
                                </div>
                                @if (!empty($setting->favicon))
                                    <img width="80px" src="{{ $setting->getFavicon() }}"
                                        class="img-fluid img-thumbnail">
                                @endif
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> رابط الفيسبوك </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="url" name="facebook" class="form-control"
                                        value="{{ $setting['facebook'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> رابط تويتر </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="url" name="twitter" class="form-control"
                                        value="{{ $setting['twitter'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> رابط انستجرام </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="url" name="instagram" class="form-control"
                                        value="{{ $setting['instagram'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> رابط يوتيوب </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="url" name="youtube" class="form-control"
                                        value="{{ $setting['youtube'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> رابط الواتساب </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="url" name="whatsapp" class="form-control"
                                        value="{{ $setting['whatsapp'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> رابط لينكدان </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="url" name="linkedin" class="form-control"
                                        value="{{ $setting['linkedin'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-left">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">تعديل البيانات
                            </button>
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
