@extends('website.layouts.master_login')
@section('title')
    حساب جديد
@endsection
@section('content')
    <!-- CONTENT START -->
    <div class="page-content">
        <!-- Login Section Start -->
        <div class="section-full site-bg-white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-7 col-lg-6 col-md-5 twm-log-reg-media-wrap">
                        <div class="twm-log-reg-media">
                            <div class="twm-l-media">
                                <img src="{{ asset('assets/website/images/register.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-7">
                        <div class="twm-log-reg-form-wrap">
                            <div class="twm-log-reg-logo-head">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('assets/website/images/logo.png') }}" alt="" class="logo">
                                </a>
                            </div>

                            <div class="twm-log-reg-inner">
                                <div class="twm-tabs-style-2">

                                    <ul class="nav nav-tabs" id="myTab2" role="tablist">

                                        <!--Login Candidate-->
                                        <li class="nav-item">
                                            <a href="{{ url('register') }}" class="nav-link" type="button"><i
                                                    class="fas fa-user-tie"></i> موظف
                                            </a>
                                        </li>
                                        <!--Login Employer-->
                                        <li class="nav-item">
                                            <a href="{{ url('company/register') }}" class="nav-link active" type="button"><i
                                                    class="fas fa-building"></i>صاحب العمل
                                            </a>
                                        </li>

                                    </ul>

                                    <div class="twm-log-reg-head">
                                        <div class="twm-log-reg-logo">
                                            <span class="log-reg-form-title" style="font-size:18px"> حساب جديد صاحب عمل </span>
                                        </div>
                                    </div>

                                    <div class="tab-content" id="myTab2Content">

                                        <div class="col-lg-12">
                                            <div>
                                                <div class="google_login">

                                                    <a href="{{ route('auth.google.redirect', ['type' => 'user']) }}">
                                                        <i class="fab fa-google"></i> </a>
                                                </div>
                                                <br>
                                            </div>
                                        </div>

                                        <!--Login Employer Content-->
                                        <div class="tab-pane fade show active" id="twm-login-Employer">
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
                                            <form id="CompanyRegister" action="{{ url('company/register') }}"
                                                method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <input name="name" type="text" required=""
                                                                class="form-control" placeholder=" الاسم  *"
                                                                value="{{ old('name') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <input name="email" type="email" required=""
                                                                class="form-control" placeholder=" البريد الالكتروني   *"
                                                                value="{{ old('email') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <input name="mobile" type="text" required=""
                                                                class="form-control" placeholder=" رقم الهاتف  *"
                                                                value="{{ old('mobile') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <input name="password" type="password" class="form-control"
                                                                required="" placeholder="كلمة المرور*">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <input name="confirm_password" type="password"
                                                                class="form-control" required=""
                                                                placeholder=" تاكيد كلمة المرور  *">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <select class="wt-select-box selectpicker" name="wherelisting"
                                                                data-live-search="true" title="" id="j-category"
                                                                data-bv-field="size">
                                                                <option disabled selected value=""> حدد مصدر المعرفة
                                                                </option>
                                                                <option value="تلجرام">تلجرام</option>
                                                                <option @if (old('wherelisting') == 'لينكدان') selected @endif
                                                                    value="لينكدان">لينكدان
                                                                </option>
                                                                <option @if (old('wherelisting') == 'تويتر') selected @endif
                                                                    value="تويتر">تويتر
                                                                </option>
                                                                <option @if (old('wherelisting') == 'فيسبوك') selected @endif
                                                                    value="فيسبوك">فيسبوك
                                                                </option>
                                                                <option @if (old('wherelisting') == 'انستجرام') selected @endif
                                                                    value="انستجرام">انستجرام
                                                                </option>
                                                                <option @if (old('wherelisting') == 'يوتيوب') selected @endif
                                                                    value="يوتيوب">يوتيوب
                                                                </option>
                                                                <option @if (old('wherelisting') == 'من الاصدقاء') selected @endif
                                                                    value="من الاصدقاء">من الاصدقاء
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check d-flex">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="flexCheckChecked" checked>
                                                            <label class="form-check-label" for="flexCheckChecked">
                                                                الموافقة علي <a target="_blank"
                                                                    href="{{ url('terms') }}"
                                                                    style="color:var(--main-color)"> الشروط والاحكام </a>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <button id="submitBtncompany" type="submit" class="site-button">
                                                            حساب جديد
                                                        </button>
                                                        <span class="loader" id="loaderCompany"
                                                            style="display: none;">جاري الإرسال...</span>
                                                    </div>
                                                </div>
                                            </form>


                                            <script>
                                                document.getElementById('CompanyRegister').addEventListener('submit', function(event) {
                                                    document.getElementById('submitBtncompany').disabled = true; // تعطيل زر الإرسال
                                                    document.getElementById('submitBtncompany').style.display = 'none'; // إخفاء زر الإرسال
                                                    document.getElementById('loaderCompany').style.display = 'inline'; // إظهار مؤشر التحميل
                                                });
                                            </script>


                                            <style>
                                                .loader {
                                                    font-size: 16px;
                                                    color: var(--main-color);
                                                }
                                            </style>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Section End -->


    </div>
    <!-- CONTENT END -->
@endsection
