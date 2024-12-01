@extends('admin.layouts.master')
@section('title')
    اضافة مقال جديد
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة مقال جديد </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <!-- row -->
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


                <form class="form-horizontal" method="post" action="{{ url('admin/blog/add') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-12 ">
                                <div class="mb-3">
                                    <label for="name" class="form-label"> العنوان <span class="star"
                                            style="color: red"> *
                                        </span>
                                    </label>
                                    <input required type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="col-lg-12 col-12 ">
                                <div class="mb-3">
                                    <label for="short_desc" class="form-label"> الوصف المختصر <span class="star"
                                            style="color: red"> * </span>
                                    </label>
                                    <textarea class="form-control" name="short_desc">{{ old('short_desc') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="short_desc" class="form-label"> محتوي المقال <span class="star"
                                        style="color: red"> * </span></label>
                                <input type="hidden" name="content" id="content">
                                <!-- Quill Editors -->
                                <div id="snow-editor" style="height: 300px;">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label"> الصورة <span class="star"
                                            style="color: red"> *
                                        </span>
                                    </label>
                                    <input required type="file" accept="image/*" id="image" class="form-control"
                                        name="image" value="{{ old('image') }}">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> معلومات السيو ومحركات البحث </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="meta_keywords" class="form-label"> الكلمات المفتاحية </label>
                                <input type="text" id="meta_keywords" name="meta_keywords" class="form-control"
                                    placeholder="" value="{{ old('meta_keywords') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 bg-light mb-3 rounded">
                <div class="row justify-content-end g-2">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-outline-secondary w-100"> حفظ <i
                                class='bx bxs-save'></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
    <!-- End Container Fluid -->


    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->
@endsection

@section('js')
    <!-- Quill Editor js -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // تهيئة محرر Quill مع دعم الكتابة RTL
            var quill = new Quill('#snow-editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['link', 'image', 'video'],
                        [{ 'direction': 'rtl' }], // زر تغيير الاتجاه
                        ['clean'] // إزالة التنسيقات
                    ]
                }
            });

            // ضبط الاتجاه الافتراضي لـ RTL
            var editor = document.querySelector('#snow-editor .ql-editor');
            editor.setAttribute('dir', 'rtl'); // اتجاه من اليمين إلى اليسار
            editor.style.textAlign = 'right'; // محاذاة النص لليمين

            // تعبئة المحتوى السابق
            var oldContent = `{!! addslashes(old('content')) !!}`;
            quill.root.innerHTML = oldContent;

            // تحديث الحقل المخفي عند تقديم النموذج
            var form = document.querySelector('form');
            form.addEventListener('submit', function () {
                document.querySelector('input[name=content]').value = quill.root.innerHTML;
            });
        });
    </script>

@endsection
