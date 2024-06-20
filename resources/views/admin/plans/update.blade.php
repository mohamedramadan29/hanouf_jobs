@extends('admin.layouts.master')
@section('title')
     تعديل الخطة
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     تعديل الخطة  </span>
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


                    <form class="form-horizontal" method="post" action="{{ url('admin/plan/update/'.$plan['id']) }}"
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
                                            <input required type="text" class="form-control" name="name" value="{{$plan['name']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> الفترة الزمنية  <span class="badge badge-danger"> شهر  </span>  </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required type="number" min="1" max="12" class="form-control" name="timeslot" value="{{$plan['timeslot']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> السعر </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required type="number" min="1"  class="form-control" name="price" value="{{$plan['price']}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label"> مميزات الخطة <span class="badge badge-danger"> افصل بين كل ميزة والاخري ب (,) </span> </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea required class='form-control' name='advantage' rows="10">{{$plan['advantage']}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">حالة الخطة  </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select required class='form-control select2' name='status'>
                                                <option> -- حدد حالة   --</option>
                                                <option @if($plan['status'] == 1) selected @endif value='1'> فعال</option>
                                                <option @if($plan['status'] == 0) selected @endif value='0'> غير فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class='btn btn-primary' type='submit'> تعديل  <i class="fa fa-edit"></i> </button>
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
