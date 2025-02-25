@extends('website.layouts.master_login')
@section('title')
    حساب جديد
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
                                            <a href="{{ url('register') }}" class="nav-link active" type="button"><i
                                                    class="fas fa-user-tie"></i> موظف
                                            </a>
                                        </li>
                                        <!--Login Employer-->
                                        <li class="nav-item">
                                            <a href="{{ url('company/register') }}" class="nav-link" type="button"><i
                                                    class="fas fa-building"></i>صاحب العمل
                                            </a>
                                        </li>

                                    </ul>

                                    <div class="twm-log-reg-head">
                                        <div class="twm-log-reg-logo">
                                            <span class="log-reg-form-title" style="font-size:18px"> حساب جديد موظف </span>
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
                                        <!--Login Candidate Content-->
                                        <div class="tab-pane fade show active" id="twm-login-candidate">
                                            <form id="UserRegister" action="{{ url('user/register') }}" method="post">
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
                                                            <input name="mobile" type="text" required="" id="phone"
                                                                class="form-control" placeholder="مثال: 0500000000"
                                                                value="{{ old('mobile') }}" maxlength="10" oninput="validatePhoneNumber(this)">
                                                                <small id="phone-error" class="text-danger"
                                                                style="display: none;">يجب أن يكون الرقم مكونًا من 10 أرقام
                                                                ويبدأ بـ 0</small>
                                                        </div>

                                                        <script>
                                                            function validatePhoneNumber(input) {
                                                                let phone = input.value;
                                                                let errorMsg = document.getElementById("phone-error");

                                                                // السماح فقط بالأرقام
                                                                input.value = input.value.replace(/\D/g, '');

                                                                // التأكد من أن الرقم يبدأ بـ 0
                                                                if (input.value.length > 0 && input.value.charAt(0) !== '0') {
                                                                    input.value = '0';
                                                                }

                                                                // منع تجاوز 10 أرقام
                                                                if (input.value.length > 10) {
                                                                    input.value = input.value.slice(0, 10);
                                                                }

                                                                // إظهار رسالة الخطأ إن لم يكن الرقم صحيحًا
                                                                if (!/^0\d{9}$/.test(input.value)) {
                                                                    errorMsg.style.display = "block";
                                                                } else {
                                                                    errorMsg.style.display = "none";
                                                                }
                                                            }
                                                        </script>
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
                                                        <input type="text" name="honeypot" style="display: none;">
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
                                                    <div class="col-12">
                                                        {!! NoCaptcha::display() !!}
                                                        @if ($errors->has('g-recaptcha-response'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button id="submitBtnUser" type="submit"
                                                                class="site-button"> حساب جديد
                                                            </button>
                                                            <span class="loader" id="loaderUser"
                                                                style="display: none;">جاري الإرسال...</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>

                                        </div>

                                        <script>
                                            document.getElementById('UserRegister').addEventListener('submit', function(event) {
                                                document.getElementById('submitBtnUser').disabled = true; // تعطيل زر الإرسال
                                                document.getElementById('submitBtnUser').style.display = 'none'; // إخفاء زر الإرسال
                                                document.getElementById('loaderUser').style.display = 'inline'; // إظهار مؤشر التحميل
                                            });
                                        </script>


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
