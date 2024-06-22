@extends('website.layouts.master')
@section('title')
   404
@endsection
@section('content')

<div class="page-wraper">
    <!-- CONTENT START -->
    <div class="page-content">
        <!-- OUR BLOG START -->
        <div class="section-full p-t120  p-b90 site-bg-white">
            <div class="container">
                <div class="twm-error-wrap">
                    <div class="row">

                        <div class="col-lg-6 col-md-12">
                            <div class="twm-error-image">
                                <img src="{{asset('assets/website/images/error-404.png')}}" alt="#">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="twm-error-content">
                                <h2 class="twm-error-title">404</h2>
                                <h4 class="twm-error-title2 site-text-primary">نحن آسفون ، الصفحة لم يتم العثور عليها</h4>
                                <p>قد تمت إزالة الصفحة التي تبحث عنها لو تم تغيير اسمها أو غير متوفرة مؤقتًا.</p>
                                <a href="{{url('/')}}" class="site-button"> الرئيسية  </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- CONTENT END -->
@endsection
