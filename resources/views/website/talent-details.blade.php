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
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="section-content">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-9 col-md-12">
                            <!-- Candidate detail START -->
                            <div class="cabdidate-de-info">
                                <h4 style="font-weight: bold" class="twm-s-title m-t0">ْعَنِّي</h4>
                                <p> {{$talent['info']}} </p>
                                <br>
                                @if(Auth::check())
                                    @if($talent['cv'] !='')
                                        <h4 style="font-weight: bold" class="twm-s-title m-t0"> السيرة الذاتية </h4>
                                        <a target="_blank" href="{{asset('assets/uploads/userscv/'.$talent->cv)}}"
                                           type="button"
                                           class="btn btn-primary uploadFiles"> مشاهدة السيرة الذاتية <i
                                                class="fa fa-download"></i>
                                        </a>
                                        <style>
                                            .uploadFiles {
                                                padding: 10px 20px;
                                                border-radius: 5px;
                                                cursor: pointer;
                                                background: transparent;
                                                color: var(--main-color);
                                                border-color: var(--main-color);
                                                outline: none;
                                            }

                                            .uploadFiles:hover {
                                                background: transparent;
                                                color: var(--main-color);
                                                border-color: var(--main-color);
                                            }
                                        </style>
                                    @endif
                                @endif

                                <div class="twm-s-info-wrap mb-5">
                                    <br>
                                    <h4 style="font-weight: bold" class="section-head-small mb-4"> معلومات الموظف </h4>
                                    <div class="twm-s-info-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">
                                                    <span class="twm-title"> المسمي الوظيفي  </span>
                                                    <div
                                                        class="twm-s-info-discription"> {{$talent['jobs_name']['title']}} </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">
                                                    <span class="twm-title"> التخصص </span>
                                                    <div
                                                        class="twm-s-info-discription"> {{$talent['specialist']['name']}} </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">

                                                    <span class="twm-title">  الجنسية  </span>
                                                    <div
                                                        class="twm-s-info-discription"> {{$talent['nationality']}} </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">

                                                    <span class="twm-title">جنس</span>
                                                    <div class="twm-s-info-discription"> {{$talent['sex']}} </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">
                                                    <span class="twm-title"> المدينة  </span>
                                                    <div
                                                        class="twm-s-info-discription">  {{$talent['location']['name']}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">
                                                    <span class="twm-title">
إمكانية التنقل من مدينة أخرى للعمل   </span>
                                                    <div
                                                        class="twm-s-info-discription">
                                                        @if($talent['can_placed_from_to_another'] == 1)
                                                            نعم
                                                        @else
                                                            لا
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">

                                                    <span class="twm-title"> طبيعة العمل  </span>
                                                    @php
                                                        $work_types = explode(',',$talent['work_type']);
                                                    @endphp
                                                    <div class="twm-s-info-discription">
                                                        @foreach($work_types as $work_type)
                                                            {{$work_type}} |
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">
                                                    <span class="twm-title"> اللغة   </span>
                                                    @php
                                                        $languages = explode(',',$talent['language']);
                                                    @endphp
                                                    <div class="twm-s-info-discription">
                                                        @foreach($languages as $lang)
                                                            {{$lang}} |
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">
                                                    <span class="twm-title">  مستوي اللغة  </span>
                                                    <div class="twm-s-info-discription">
                                                        {{$talent['language_level']}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">

                                                    <span class="twm-title">عرض الراتب</span>
                                                    <div class="twm-s-info-discription"> {{$talent['salary']}} </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="twm-s-info-inner">

                                                    <span class="twm-title">خبرة</span>
                                                    <div class="twm-s-info-discription">{{ $talent['experience']  }}
                                                        سنوات
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

        </div>
        <!-- Candidate Detail V2 END -->


    </div>
    <!-- CONTENT END -->

@endsection
