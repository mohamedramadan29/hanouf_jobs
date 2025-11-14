@extends('admin.layouts.master')
@section('title')
    اعدادات محتوي الموقع
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اعدادات
                    محتوي الموقع </span>
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
                    <div class="mb-4 main-content-label"> اعدادات محتوي الموقع </div>
                    <form class="form-horizontal" method="post" action="{{ route('update_content') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <h6> القسم الرئيسي </h6>
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div>
                                    <label class="form-label"> العنوان </label>
                                    <input type="text" name="hero_title" class="form-control" required
                                        value="{{ $content['hero_title'] }}">
                                </div>
                                <div>
                                    <label class="form-label"> الوصف </label>
                                    <input type="text" name="hero_desc" class="form-control" required
                                        value="{{ $content['hero_desc'] }}">
                                </div>
                                <div>
                                    <label class="form-label"> الصورة الرئيسية </label>
                                    <input type="file" name="hero_image" class="form-control">
                                     <img width="50px" height="50px" src="{{ asset('assets/uploads/contents/'.$content['hero_image']) }}" alt="">
                                </div>
                            </div>
                        </div>

                        <h6> قسم من نحن </h6>

                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div>
                                    <label class="form-label"> العنوان </label>
                                    <input type="text" name="about_title" class="form-control" required
                                        value="{{ $content['about_title'] }}">
                                </div>

                                <label class="form-label"> المحتوي </label>
                                <textarea name="about_section" id="" class="form-control tinymce">{{ $content['about_section'] ?? '' }}</textarea>

                                <div>
                                    <label class="form-label"> صورة القسم </label>
                                    <input type="file" name="about_image" class="form-control">
                                    <img width="50px" height="50px" src="{{ asset('assets/uploads/contents/'.$content['about_image']) }}" alt="">
                                </div>
                            </div>
                        </div>

                        <h6> قسم كيف تتقدم للوظائف </h6>
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <label class="form-label"> الخطوة الاولى </label>

                                <div>
                                    <label for=""> العنوان </label>
                                    <input type="text" name="job_step1_title" class="form-control" required
                                        value="{{ $content['job_step1_title'] }}">
                                </div>
                                <div>
                                    <label for=""> المحتوي </label>
                                    <input type="text" name="job_step1_desc" class="form-control" required
                                        value="{{ $content['job_step1_desc'] }}">
                                </div>

                            </div>

                            <div class="col-lg-12 col-12">
                                <label class="form-label"> الخطوة الثانية </label>


                                <div>
                                    <label for=""> العنوان </label>
                                    <input type="text" name="job_step2_title" class="form-control" required
                                        value="{{ $content['job_step2_title'] }}">
                                </div>
                                <div>
                                    <label for=""> المحتوي </label>
                                    <input type="text" name="job_step2_desc" class="form-control" required
                                        value="{{ $content['job_step2_desc'] }}">
                                </div>

                            </div>

                            <div class="col-lg-12 col-12">
                                <label class="form-label"> الخطوة الثالثة </label>

                                <div>
                                    <label for=""> العنوان </label>
                                    <input type="text" name="job_step3_title" class="form-control" required
                                        value="{{ $content['job_step3_title'] }}">
                                </div>
                                <div>
                                    <label for=""> المحتوي </label>
                                    <input type="text" name="job_step3_desc" class="form-control" required
                                        value="{{ $content['job_step3_desc'] }}">
                                </div>

                            </div>

                        </div>

                        <h6> قسم كيف تحصل على الكفاءات </h6>
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <label class="form-label"> الخطوة الاولى </label>

                                <div>
                                    <label for=""> العنوان </label>
                                    <input type="text" name="exper_step1_title" class="form-control" required
                                        value="{{ $content['exper_step1_title'] }}">
                                </div>
                                <div>
                                    <label for=""> المحتوي </label>
                                    <input type="text" name="exper_step1_desc" class="form-control" required
                                        value="{{ $content['exper_step1_desc'] }}">
                                </div>

                            </div>

                            <div class="col-lg-12 col-12">
                                <label class="form-label"> الخطوة الثانية </label>


                                <div>
                                    <label for=""> العنوان </label>
                                    <input type="text" name="exper_step2_title" class="form-control" required
                                        value="{{ $content['exper_step2_title'] }}">
                                </div>
                                <div>
                                    <label for=""> المحتوي </label>
                                    <input type="text" name="exper_step2_desc" class="form-control" required
                                        value="{{ $content['exper_step2_desc'] }}">
                                </div>

                            </div>

                            <div class="col-lg-12 col-12">
                                <label class="form-label"> الخطوة الثالثة </label>

                                <div>
                                    <label for=""> العنوان </label>
                                    <input type="text" name="exper_step3_title" class="form-control" required
                                        value="{{ $content['exper_step3_title'] }}">
                                </div>
                                <div>
                                    <label for=""> المحتوي </label>
                                    <input type="text" name="exper_step3_desc" class="form-control" required
                                        value="{{ $content['exper_step3_desc'] }}">
                                </div>

                            </div>

                        </div>

                        {{-- <div class="row">
                    <div class="col-12">
                        <div>
                            <label for=""> قسم لماذا نحن ( افصل بين كل نقطة والاخري ب , ) </label>
                            <textarea name="why_section" id="" required class="form-control">{{ $content['why_section'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div>
                            <label for=""> رسالتنا </label>
                            <textarea name="message_section" id="" required class="form-control">{{ $content['message_section'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div> --}}
                        <div class="card-footer text-left">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">تعديل البيانات
                            </button>
                        </div>
                    </form>
                </div>
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
