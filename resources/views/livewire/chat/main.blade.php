<div>
    @section('title') المحادثات   @endsection
    @section('content')

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
                                <h2 class="wt-title"> المحادثات  </h2>
                            </div>
                        </div>
                        <!-- BREADCRUMB ROW -->

                        <div>
                            <ul class="wt-breadcrumb breadcrumb-style-2">
                                <li><a href="{{'/'}}"> الرئيسية </a></li>
                                <li> المحادثات  </li>
                            </ul>
                        </div>
                        <!-- BREADCRUMB ROW END -->
                    </div>
                </div>
            </div>
            <!-- INNER PAGE BANNER END -->

            <!-- OUR BLOG START -->
            <div class="section-full p-t120  p-b90 site-bg-white">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-12 rightSidebar m-b30">
                            @if(\Illuminate\Support\Facades\Auth::guard('company')->user())
                                <div class="side-bar-st-1">
                                    <div class="twm-candidate-profile-pic">
                                        @if(\Illuminate\Support\Facades\Auth::guard('company')->user()->logo !='')
                                            <img
                                                src="{{asset('assets/uploads/companies/'.Auth::guard('company')->user()->logo)}}"
                                                alt="">
                                        @else
                                            <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="">
                                        @endif

                                    </div>

                                    <div class="twm-mid-content text-center" style="margin-bottom: 15px">
                                        <a href="{{url('company/dashboard')}}" class="twm-job-title">
                                            <h4 style="margin-bottom: 10px">  {{Auth::guard('company')->user()->name}} </h4>
                                        </a>
                                        <p> {{Auth::guard('company')->user()->email}} </p>
                                    </div>

                                    <div class="twm-nav-list-1">
                                        <ul>
                                            <li><a href="{{url('company/dashboard')}}"><i class="fa fa-user"></i>ملف
                                                    الشركة</a></li>
                                            <li><a href="{{url('company/jobs')}}"><i class="fa fa-suitcase"></i> إدارة
                                                    الوظائف</a></li>
                                            <li><a href="{{url('company/add-job')}}"><i class="fa fa-user"></i> اضف وظيفة جديدة
                                                </a></li>
                                            <li class="active"><a href="{{url('chat-main')}}"><i class="fa fa-comments"></i> المحادثات </a>
                                            </li>
                                            <li><a href="{{url('company/change-password')}}"><i class="fa fa-fingerprint"></i>
                                                    تغيير كلمة المرور</a></li>
                                            <li><a href="{{url('company/logout')}}"><i class="fa fa-share-square"></i> تسجيل
                                                    خروج</a></li>
                                        </ul>
                                    </div>

                                </div>

                            @else
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
                                                    تعديل النبذة شخصية
                                                </a></li>
                                            <li><a href="{{url('user/update')}}"><i class="fa fa-edit"></i>  تعديل معلوماتي المهنية   </a></li>
                                            <li class="active"><a href="{{url('chat-main')}}"><i class="fa fa-comments"></i> المحادثات </a>
                                            </li>


                                            <li><a href="{{url('user/alerts')}}"><i class="fa fa-bell"></i>   تنبيهات مهمة
                                                </a></li>


                                            <li><a href="{{url('user/change-password')}}"><i class="fa fa-fingerprint"></i>
                                                    تغيير كلمة المرور</a></li>
                                            <li><a href="{{url('user/logout')}}"><i class="fa fa-share-square"></i> تسجيل
                                                    خروج</a></li>
                                        </ul>
                                    </div>

                                </div>

                            @endif
                        </div>

                        <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                            <!--Filter Short By-->
                            <div class="twm-right-section-panel site-bg-gray">
                                <div class="wt-admin-dashboard-msg-2  twm-dashboard-style-2">
                                    <!--Left Msg section-->
                                    <div class="wt-dashboard-msg-user-list">
                                        <div class="user-msg-list-btn-outer">
                                            <button class="user-msg-list-btn-close">يغلق</button>
                                            <button class="user-msg-list-btn-open">رسالة المستخدم</button>
                                        </div>
                                        <!-- user msg list start-->
                                        @livewire('chat.chatlist')
                                        <!-- user msg list End-->

                                    </div>

                                    <!--Right Msg section-->
                                    <div class="wt-dashboard-msg-box">
                                        <!-------- Chat Content  -->
                                        @livewire('chat.chatbox')
                                        @livewire('chat.sendmessage')
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
</div>
