@extends('website.layouts.master_login')
@section('title')
    تسجيل دخول الشركات
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
                                <img src="{{ asset('assets/website/images/login.svg') }}" alt="">
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
                                            <a href="{{ url('login') }}" class="nav-link" type="button"><i
                                                    class="fas fa-user-tie"></i> موظف
                                            </a>
                                        </li>
                                        <!--Login Employer-->
                                        <li class="nav-item">
                                            <a href="{{ url('company/login') }}" class="nav-link active" type="button"><i
                                                    class="fas fa-building"></i>صاحب العمل
                                            </a>
                                        </li>

                                    </ul>

                                    <div class="twm-log-reg-head">
                                        <div class="twm-log-reg-logo">
                                            <span class="log-reg-form-title" style="font-size:18px"> تسجيل دخول صاحب العمل </span>
                                        </div>
                                    </div>

                                    <div class="tab-content" id="myTab2Content">
                                        <!--Login Candidate Content-->
                                        <div class="tab-pane fade show active" id="twm-login-candidate">
                                            <form action="{{ route('company_login') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <input name="email" type="email" required=""
                                                                value="{{ old('email') }}" class="form-control"
                                                                placeholder=" البريد الالكتروني  *">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <input name="password" type="password" class="form-control"
                                                                required="" placeholder="كلمة المرور*">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="twm-forgot-wrap">
                                                            <div class="form-group mb-3">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="Password4">
                                                                    <label class="form-check-label rem-forgot"
                                                                        for="Password4">تذكرنى

                                                                        <a href="{{ url('forget-password') }}"
                                                                            class="site-text-primary">
                                                                            هل نسيت كلمة السر</a></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="site-button">تسجيل الدخول
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="google_login">
                                                        <h6> او سجل عبر </h6>
                                                        <a
                                                            href="{{ route('auth.google.redirect', ['type' => 'company']) }}">
                                                            <i class="fab fa-google"></i> </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Login Employer Content-->
                                        {{--                                        <div class="tab-pane fade" id="twm-login-Employer"> --}}
                                        {{--                                            <form action="{{route('company_login')}}" method="post"> --}}
                                        {{--                                                @csrf --}}
                                        {{--                                                <div class="row"> --}}
                                        {{--                                                    <div class="col-lg-12"> --}}
                                        {{--                                                        <div class="form-group mb-3"> --}}
                                        {{--                                                            <input name="email" type="email" required="" --}}
                                        {{--                                                                   value="{{old('email')}}" --}}
                                        {{--                                                                   class="form-control" --}}
                                        {{--                                                                   placeholder=" البريد الالكتروني  *"> --}}
                                        {{--                                                        </div> --}}
                                        {{--                                                    </div> --}}

                                        {{--                                                    <div class="col-lg-12"> --}}
                                        {{--                                                        <div class="form-group mb-3"> --}}
                                        {{--                                                            <input name="password" type="password" class="form-control" --}}
                                        {{--                                                                   required="" --}}
                                        {{--                                                                   placeholder="كلمة المرور*"> --}}
                                        {{--                                                        </div> --}}
                                        {{--                                                    </div> --}}

                                        {{--                                                    <div class="col-lg-12"> --}}
                                        {{--                                                        <div class="twm-forgot-wrap"> --}}
                                        {{--                                                            <div class="form-group mb-3"> --}}
                                        {{--                                                                <div class="form-check"> --}}
                                        {{--                                                                    <input type="checkbox" class="form-check-input" --}}
                                        {{--                                                                           id="Password4"> --}}
                                        {{--                                                                    <label class="form-check-label rem-forgot" --}}
                                        {{--                                                                           for="Password4">تذكرنى <a href="javascript:;" --}}
                                        {{--                                                                                                     class="site-text-primary">هل --}}
                                        {{--                                                                            نسيت كلمة السر</a></label> --}}
                                        {{--                                                                </div> --}}
                                        {{--                                                            </div> --}}
                                        {{--                                                        </div> --}}
                                        {{--                                                    </div> --}}

                                        {{--                                                    <div class="col-md-12"> --}}
                                        {{--                                                        <div class="form-group"> --}}
                                        {{--                                                            <button type="submit" class="site-button">تسجيل الدخول --}}
                                        {{--                                                            </button> --}}
                                        {{--                                                        </div> --}}
                                        {{--                                                    </div> --}}

                                        {{--                                                </div> --}}
                                        {{--                                            </form> --}}
                                        {{--                                        </div> --}}

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
