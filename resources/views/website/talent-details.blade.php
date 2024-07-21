@extends('website.layouts.master')
@section('title')
    {{$talent['name']}}
    | خبير
@endsection
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">


        <!-- Candidate Detail V2 START -->
        <div class="section-full p-b90 bg-white">
            <div class="twm-candi-self-wrap-2 overlay-wraper"
                 style="background-image:url({{asset('assets/website/images/candidates/candidate-bg2.jpg')}});">
                <div class="overlay-main site-bg-primary opacity-01"></div>
                <div class="container">
                    <div class="twm-candi-self-info-2">
                        <div class="twm-candi-self-top">
                            <div class="twm-media">
                                <img src="{{asset('assets/uploads/users/'.$talent['logo'])}}" alt="#">
                            </div>
                            <div class="twm-mid-content">

                                <h4 class="twm-job-title"> {{$talent['name']}} </h4>

                                <p> {{$talent['jobs_name']['title']}} </p>
                                <p class="twm-candidate-address"><i
                                        class="feather-map-pin"></i> {{$talent['location']['name']}} </p>

                            </div>
                        </div>
                        <br>
                        @if(\Illuminate\Support\Facades\Auth::guard('company')->user())
                            <div class="twm-ep-detail-tags">
                                <button class="de-info twm-bg-green"><i class="fa fa-comment"></i> محاثة</button>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="container">


                <div class="section-content">

                    <div class="row d-flex justify-content-center">

                        <div class="col-lg-9 col-md-12">
                            <!-- Candidate detail START -->
                            <div class="cabdidate-de-info">

                                <div class="twm-s-info-wrap mb-5">
                                    <h4 class="section-head-small mb-4">معلومات الشخصي</h4>
                                    <div class="twm-s-info-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-money-bill-wave"></i>
                                                    <span class="twm-title">عرض الراتب</span>
                                                    <div class="twm-s-info-discription"> {{$talent['salary']}} </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-clock"></i>
                                                    <span class="twm-title">خبرة</span>
                                                    <div class="twm-s-info-discription">{{ $talent['experience']  }}
                                                        سنوات
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-venus-mars"></i>
                                                    <span class="twm-title">جنس</span>
                                                    <div class="twm-s-info-discription"> {{$talent['sex']}} </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-mobile-alt"></i>
                                                    <span class="twm-title">  الجنسية  </span>
                                                    <div
                                                        class="twm-s-info-discription"> {{$talent['nationality']}} </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-at"></i>
                                                    <span class="twm-title"> التخصص </span>
                                                    <div
                                                        class="twm-s-info-discription"> {{$talent['specialist']['name']}} </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="twm-s-info-inner">

                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <span class="twm-title">عنوان</span>
                                                    <div
                                                        class="twm-s-info-discription">  {{$talent['location']['name']}}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <h4 class="twm-s-title m-t0">ْعَنِّي</h4>
                                <p> {{$talent['info']}} </p>
                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>
        <!-- Candidate Detail V2 END -->


    </div>
    <!-- CONTENT END -->

@endsection
