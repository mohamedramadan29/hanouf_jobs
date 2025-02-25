@extends('website.layouts.master')
@section('title')
    اتصل بنا
@endsection
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center"
            style="background-image:url({{ asset('assets/website/images/banner/1.jpg') }});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title">اتصل بنا</h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{ url('/') }}"> الرئيسية </a></li>
                            <li>اتصل بنا</li>
                        </ul>
                    </div>

                    <!-- BREADCRUMB ROW END -->
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->

        <!-- CONTACT FORM -->
        <div class="section-full twm-contact-one">
            <div class="section-content">
                <div class="container">
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
                    <!-- CONTACT FORM-->
                    <div class="contact-one-inner">
                        <div class="row">

                            <div class="col-lg-6 col-md-12">
                                <div class="contact-form-outer">

                                    <!-- TITLE START-->
                                    <div class="section-head left wt-small-separator-outer">
                                        <h2 class="wt-title">أرسل لنا رسالة</h2>
                                        <p>لا تتردد في الاتصال بنا وسنعود إليك في أقرب وقت ممكن.</p>
                                    </div>
                                    <!-- TITLE END-->

                                    <form class="cons-contact-form" method="post"
                                        action="{{ url('add_contact_message') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-3">
                                                    <input name="name" type="text" required class="form-control"
                                                        placeholder="اسم" value="{{ old('name') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-3">
                                                    <input name="email" type="email" class="form-control" required
                                                        placeholder="بريد إلكتروني" value="{{ old('email') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-3">
                                                    <input name="phone" type="text" class="form-control" required id="phone"
                                                    placeholder="مثال: 0500000000" value="{{ old('phone') }}"  maxlength="10" oninput="validatePhoneNumber(this)">
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

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-3">
                                                    <input name="subject" type="text" class="form-control" required
                                                        placeholder="موضوع" value="{{ old('subject') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <textarea name="message" class="form-control" rows="3" placeholder="رسالة">{{ old('message') }}</textarea>
                                                </div>
                                                <input type="text" name="honeypot" style="display: none;">
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
                                                <button type="submit" class="site-button">أرسل الآن</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="contact-info-wrap">

                                    <div class="contact-info">
                                        <div class="contact-info-section">

                                            <div class="c-info-column">
                                                <div class="c-info-icon custome-size"><i class="fas fa-mobile-alt"></i>
                                                </div>
                                                <h3 class="twm-title">لا تتردد في الاتصال بنا</h3>
                                                <p><a href="tel:+966731 9189"> 731 9189 966</a></p>
                                            </div>

                                            <div class="c-info-column">
                                                <div class="c-info-icon"><i class="fas fa-envelope"></i></div>
                                                <h3 class="twm-title"> البريد الالكتروني </h3>
                                                <p> info@takhair.site </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT END -->
@endsection
