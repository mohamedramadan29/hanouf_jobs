@extends('admin.layouts.master')
@section('title')
    الرئيسية
@endsection

@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/admin/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet"/>
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/admin/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا ,  {{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}} </h2>
                <p class="mg-b-0"> لوحة التحكم الخاصة بك </p>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">

        <!--======================================================== Admin Dashboard ==================================================-->
        @if(\Illuminate\Support\Facades\Auth::guard('admin'))
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white"> جميع المنتجات  </h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white"> 3 </h4>
                                    <a href="{{url('admin/products')}}" class="mb-0 tx-12 text-white op-7"> مشاهدة التفاصيل  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white"> جميع  الباقات   </h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white"> 3 </h4>
                                    <a href="{{url('admin/plans')}}" class="mb-0 tx-12 text-white op-7"> مشاهدة التفاصيل  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/admin/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/admin/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/admin/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/admin/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/admin/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/jquery.vmap.sampledata.js') }}"></script>
@endsection

