@extends('website.layouts.master')
@section('title')
    {{ $adv['title']}}  | تخير
@endsection
@section('content')

    @if (Session::has('Success_message'))
        @php
            emotify('success', \Illuminate\Support\Facades\Session::get('Success_message'));
        @endphp
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @php
                emotify('error', $error);
            @endphp
        @endforeach
    @endif

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center"
             style="background-image:url({{asset('assets/website/images/banner/1.jpg')}});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title"> {{$adv['title']}} </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li><a href="{{url('jobs')}}"> الوظائف </a></li>
                            <li> {{$adv['title']}}</li>
                        </ul>
                    </div>

                    <!-- BREADCRUMB ROW END -->
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->


        <!-- OUR BLOG START -->
        <div class="section-full  p-t120 p-b90 bg-white">
            <div class="container">

                <!-- BLOG SECTION START -->
                <div class="section-content job_details_page">
                    <div class="row d-flex justify-content-center">

                        <div class="col-lg-8 col-md-12">
                            <!-- Candidate detail START -->
                            <div class="cabdidate-de-info">
                                <div class="twm-job-self-wrap">
                                    <div class="twm-job-self-info">
                                        <div class="twm-job-self-top">
                                            <div class="twm-mid-content">
                                                <h4 class="twm-job-title"> {{$adv['title']}} <span
                                                        class="twm-job-post-duration">/   {{$adv->created_at->diffForHumans()}} </span>
                                                </h4>
                                                <div class="twm-job-self-bottom">
                                                    @if(\Illuminate\Support\Facades\Auth::guard('company')->user())
                                                        @if(\Illuminate\Support\Facades\Auth::guard('company')->user()->id == $adv['company_id'])
                                                            <a class="site-button"
                                                               href="{{url('company/job/'.$adv['id'])}}">
                                                                تعديل الوظيفة  <i class="fa fa-paper-plane"> </i>
                                                            </a>
                                                            <br>
                                                            <span class="badge badge-danger bg-danger"> عند التعديل سيتم مراجعتها وتفعيلها بعد 24 ساعه – هل انت متأكد ؟  </span>
                                                        @endif

                                                    @else
                                                        <a class="site-button"
                                                           href="#send_request">
                                                            قدم الآن <i class="fa fa-paper-plane"> </i>
                                                        </a>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <h4 class="twm-s-title"> وصف الوظيفة </h4>

                                <p>
                                    {{$adv['description']}}
                                </p>
                                @if(!empty($adv['job_requirements']))
                                    @php
                                        $job_requirements = explode(',', $adv['job_requirements']);
                                    @endphp
                                    <h4 class="twm-s-title"> المهام الوظيفية </h4>
                                    <ul class="description-list-2">
                                        @foreach($job_requirements as $requirement)
                                            <li>
                                                <i class="feather-check"></i>
                                                {{ $requirement }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if(!empty($adv['job_experience']))
                                    @php
                                        $job_experience = explode(',', $adv['job_experience']);
                                    @endphp
                                    <h4 class="twm-s-title"> المؤهلات والخبرات </h4>
                                    <ul class="description-list-2">
                                        @foreach($job_experience as $exper)
                                            <li>
                                                <i class="feather-check"></i>
                                                {{ $exper }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if(!empty($adv['job_advantage']))
                                    @php
                                        $job_advantage = explode(',', $adv['job_advantage']);
                                    @endphp
                                    <h4 class="twm-s-title"> مميزات العمل </h4>
                                    <ul class="description-list-2">
                                        @foreach($job_advantage as $job_adv)
                                            <li>
                                                <i class="feather-check"></i>
                                                {{ $job_adv }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif


                                @if(!empty($adv['job_needed']))
                                    @php
                                        $job_needed = explode(',', $adv['job_needed']);
                                    @endphp
                                    <h4 class="twm-s-title"> البيانات المطلوبة للتقديم </h4>
                                    <ul class="description-list-2">
                                        @foreach($job_needed as $job_need)
                                            <li>
                                                <i class="feather-check"></i>
                                                {{ $job_need }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                <!--Basic Information-->
                                <div class="panel panel-default" id="send_request">
                                    <div class="panel-heading wt-panel-heading p-a20">
                                        <h4 class="panel-tittle m-a0"><i class="fa fa-suitcase"></i> التقدم للوظيفة
                                        </h4>
                                    </div>
                                    <div class="panel-body wt-panel-body p-a20 m-b30">
                                        @if($offers > 0)
                                            <div class="alert alert-danger"> تم التقديم الي الوظيفة من قبل</div>
                                        @else
                                            @if(\Illuminate\Support\Facades\Auth::user())
                                                @if(isset($compelete_info) && $compelete_info !='')
                                                    <div class="alert alert-danger">  {{$compelete_info}} </div>
                                                @else
                                                    <form method="post" action="{{url('add-offer')}}"
                                                          enctype="multipart/form-data" id="offerForm">
                                                        @csrf
                                                        <div class="row">
                                                            <!--Description-->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="adv_id"
                                                                           value="{{$adv['id']}}">
                                                                    <input type="hidden" name="company_id"
                                                                           value="{{$adv['company_id']}}">
                                                                    <input type="hidden" name="adv_title"
                                                                           value="{{$adv['title']}}">
                                                                    <label> خطاب التوظيف <span
                                                                            style="color:red"> * </span>
                                                                    </label>
                                                                    <textarea required style="height: 150px;"
                                                                              name="cover_letter" class="form-control"
                                                                              rows="10"
                                                                              placeholder=" خطاب التوظيف  ">{{old('cover_letter')}}</textarea>
                                                                    <span class="span_info"> لماذا أنت مهتم بهذه الوظيفة، ما أهم خبراتك ومالذي تستطيع تقديمه؟ </span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>إضافة ملفات مرفقة</label>
                                                                    <br>
                                                                    <input type="file" name="cover_files[]"
                                                                           class="form-control"
                                                                           accept=".pdf, .doc, .docx"
                                                                           id="fileInput" multiple
                                                                           style="display: none;">
                                                                    <button type="button"
                                                                            class="btn btn-primary uploadFiles"
                                                                            id="uploadButton">ارفع الملفات <i
                                                                            class="fa fa-upload"></i>
                                                                    </button>
                                                                    <span id="fileNames" class="span_info">لم يتم اختيار ملفات بعد</span>
                                                                    <span class="span_info">الامتدادات المسموحة: pdf, doc, docx. الحجم الأقصى للملف 50MB</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="text-left">
                                                                    <button type="submit" class="site-button m-r5"
                                                                            id="submitBtn"> ارسل <i
                                                                            class="fa fa-paper-plane"> </i></button>
                                                                    <span id="loader"
                                                                          style="display: none;">جاري الإرسال...</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <script>
                                                        document.getElementById('offerForm').addEventListener('submit', function (event) {
                                                            document.getElementById('submitBtn').disabled = true; // تعطيل زر الإرسال
                                                            document.getElementById('submitBtn').style.display = 'none'; // إخفاء زر الإرسال
                                                            document.getElementById('loader').style.display = 'inline'; // إظهار مؤشر التحميل
                                                        });
                                                    </script>

                                                    <script>
                                                        document.getElementById('uploadButton').addEventListener('click', function () {
                                                            document.getElementById('fileInput').click();
                                                        });

                                                        document.getElementById('fileInput').addEventListener('change', function () {
                                                            var input = document.getElementById('fileInput');
                                                            var output = document.getElementById('fileNames');
                                                            var fileNames = [];
                                                            for (var i = 0; i < input.files.length; i++) {
                                                                fileNames.push(input.files[i].name);
                                                            }
                                                            output.textContent = fileNames.length > 0 ? fileNames.join(', ') : 'لم يتم اختيار ملفات بعد';
                                                        });
                                                    </script>

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

                                                        #fileNames {
                                                            display: block;
                                                            margin-top: 10px;
                                                            color: #333;
                                                            font-size: 14px
                                                        }

                                                        #loader {
                                                            font-size: 16px;
                                                            color: var(--main-color);
                                                        }
                                                    </style>
                                                @endif
                                            @else
                                                <div class="alert alert-danger"> من فضلك سجل دخولك اولا كموظف للتقديم
                                                    الي
                                                    الوظيفة
                                                </div>
                                            @endif

                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 rightSidebar">

                            <div class="side-bar mb-4">
                                <div class="twm-s-info2-wrap mb-5">
                                    <div class="twm-s-info2">
                                        <h4 class="section-head-small mb-4">معلومات مهمة</h4>
                                        <ul class="twm-job-hilites">
                                            <li>
                                                <i class="fas fa-calendar-alt"></i>
                                                <span class="twm-title">  {{$adv->created_at->diffForHumans()}}  </span>
                                            </li>
                                            <li>
                                                <i class="fas fa-file-signature"></i>
                                                <span class="twm-title">{{ $CountAllOffers  }} المتقدمون</span>
                                            </li>
                                        </ul>
                                        <ul class="twm-job-hilites2">
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <span class="twm-title">موقع</span>
                                                    <div class="twm-s-info-discription"> {{$CityName['name']}} </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-user-tie"></i>
                                                    <span class="twm-title">مسمى وظيفي</span>
                                                    <div
                                                        class="twm-s-info-discription"> {{$adv['jobs_names']['title']}} </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-clock"></i>
                                                    <span class="twm-title">خبرة</span>
                                                    <div class="twm-s-info-discription"> {{$adv['experience']}}سنة
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-suitcase"></i>
                                                    <span class="twm-title"> التخصص </span>
                                                    <div
                                                        class="twm-s-info-discription"> {{$adv['specialist']['name']}} </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="twm-s-info-inner">
                                                    <i class="fas fa-venus-mars"></i>
                                                    <span class="twm-title">جنس</span>
                                                    <div class="twm-s-info-discription"> {{$adv['sex']}} </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="twm-s-info-inner">

                                                    <i class="fas fa-money-bill-wave"></i>
                                                    <span class="twm-title">عرض الراتب</span>
                                                    <div class="twm-s-info-discription">   {{ $adv['salary']  }} / شهر
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <div class="twm-s-info3-wrap mb-5">
                                <div class="twm-s-info3">
                                    <div class="twm-s-info-logo-section">
                                        <div class="twm-media">
                                            <img src="{{asset('assets/uploads/companies/'.$adv['company']['logo'])}}"
                                                 alt="#">
                                        </div>
                                    </div>
                                    <ul>

                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-building"></i>
                                                <span class="twm-title">شركة</span>
                                                <div class="twm-s-info-discription"> {{$adv['company']['name']}} </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="{{url('companies/'.$adv['company']['username'])}}" class=" site-button">عرض
                                        الصفحة الشخصية</a>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- OUR BLOG END -->
    </div>
    <!-- CONTENT END -->
@endsection
