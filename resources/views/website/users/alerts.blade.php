@extends('website.layouts.master')
@section('title')
    التنبيهات
@endsection
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">
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
        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center"
             style="background-image:url({{asset('assets/website/images/banner/1.jpg')}});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title"> {{ Auth::user()->name }} </h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li> التنبيهات</li>
                        </ul>
                    </div>

                    <!-- BREADCRUMB ROW END -->
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->


        <!-- OUR BLOG START -->
        <div class="section-full p-t120  p-b90 site-bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-12 rightSidebar m-b30">
                        <div class="side-bar-st-1">
                            <div class="twm-candidate-profile-pic">
                                @if(\Illuminate\Support\Facades\Auth::user()->logo !='')
                                    <img
                                        src="{{asset('assets/uploads/users/'.Auth::user()->logo)}}"
                                        alt="">
                                @else
                                    <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="">
                                @endif

                            </div>

                            <div class="twm-mid-content text-center" style="margin-bottom: 15px">
                                <a href="{{url('user/dashboard')}}" class="twm-job-title">
                                    <h4 style="margin-bottom: 10px">  {{Auth::user()->name}} </h4>
                                </a>
                                <p> {{Auth::user()->email}} </p>
                            </div>

                            <div class="twm-nav-list-1">
                                <ul>
                                    <li><a href="{{url('user/dashboard')}}"><i class="fa fa-user"></i>
                                            حسابي
                                        </a></li>
                                    <li><a href="{{url('user/update')}}"><i class="fa fa-edit"></i> تعديل الملف الشخصي
                                        </a></li>

                                    <li><a href="{{url('chat-main')}}"><i class="fa fa-comments"></i> المحادثات </a>
                                    </li>


                                    <li class="active"><a href="{{url('user/alerts')}}"><i class="fa fa-bell"></i>
                                            تنبيهات مهمة
                                        </a></li>


                                    <li><a href="{{url('user/change-password')}}"><i class="fa fa-fingerprint"></i>
                                            تغيير كلمة المرور</a></li>
                                    <li><a href="{{url('user/logout')}}"><i class="fa fa-share-square"></i> تسجيل
                                            خروج</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>


                    <div class="col-xl-9 col-lg-8 col-md-12 m-b30">

                        <div class="twm-right-section-panel candidate-save-job site-bg-gray">
                            <!--Filter Short By-->
                            <div class="product-filter-wrap d-flex justify-content-between align-items-center">
                                <span class="woocommerce-result-count-left">تنبيهات مهمة</span>
                            </div>

                            @if(Auth::user()->unreadNotifications->count() > 0)
                                <div class="table-responsive">
                                    <table class="table twm-table table-striped table-borderless">
                                        <thead>
                                        <tr>
                                            <th> التنبية</th>
                                            <th> التوقيت</th>
                                            <th>أجراءات</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @forelse (\Illuminate\Support\Facades\Auth::user()->Notifications as $notification)
                                            @if($notification['type'] == 'App\Notifications\SendNewSujestJob')
                                                <tr>
                                                    <td> {{$notification['data']['title']}}
                                                        : {{$notification['data']['adv_name']}} </td>
                                                    <td>  {{$notification->created_at->diffForHumans()}}   </td>
                                                    <td>
                                                        <a href="{{url('job/'.$notification['data']['adv_id'].'-'.$notification['data']['adv_slug'])}}"
                                                           role="button" class="custom-toltip">
                                                            <span class="fa fa-eye"></span>
                                                            <span class="custom-toltip-block"> مشاهدة التفاصيل  </span>
                                                        </a>
                                                        <a onclick="confirm('هل انت تاكد من عملية الحذف !!')"
                                                           href="{{url('user/alert/delete/'.$notification['id'])}}"
                                                           title="حذف " data-bs-toggle="tooltip"
                                                           data-bs-placement="top"><i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @elseif($notification['type'] == 'App\Notifications\SendUnaccepedOfferToUser')
                                                <tr>
                                                    <td>  {{$notification['data']['title']}}
                                                        : {{$notification['data']['adv_name']}}
                                                        <br>
                                                        @if(isset($notification['data']['refuse_reason']))
                                                            <span class="badge badge-danger bg-danger"> سبب الرفض  </span>
                                                             {{$notification['data']['refuse_reason']}}
                                                        @endif
                                                        <br>
                                                        @if(isset($notification['data']['more_refuse_info']))
                                                            <span class="badge badge-danger bg-danger">  تفاصيل اضافية عن سبب الرفض   </span>
                                                            {{$notification['data']['more_refuse_info']}}
                                                        @endif

                                                    </td>
                                                    <td>  {{$notification->created_at->diffForHumans()}}   </td>
                                                    <td>
                                                        <a href="{{url('job/'.$notification['data']['adv_id'].'-'.$notification['data']['adv_slug'])}}"
                                                           role="button" class="custom-toltip">
                                                            <span class="fa fa-eye"></span>
                                                            <span class="custom-toltip-block"> مشاهدة التفاصيل  </span>
                                                        </a>
                                                        <a onclick="confirm('هل انت تاكد من عملية الحذف !!')"
                                                           href="{{url('user/alert/delete/'.$notification['id'])}}"
                                                           title="حذف " data-bs-toggle="tooltip"
                                                           data-bs-placement="top"><i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            @endif

                                        @empty
                                            <a class="dropdown-item"> لا يوجد لديك اشعارات في الوقت الحالي </a>

                                            <hr>
                                        @endforelse


                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info"> لا يوجد لديك اشعارات في الوقت الحالي !!</div>
                            @endif


                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- OUR BLOG END -->


    </div>
    <!-- CONTENT END -->
@endsection
