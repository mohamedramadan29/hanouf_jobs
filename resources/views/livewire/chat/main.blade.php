<div>
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
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-12 rightSidebar m-b30">
                            <div class="side-bar-st-1">
                                <div class="twm-candidate-profile-pic">
                                    <img src="{{asset('assets/website/images/jobs-company/pic1.jpg')}}" alt="">
                                    <div class="upload-btn-wrapper">

                                        <div id="upload-image-grid"></div>
                                        <button class="site-button button-sm">حمل الصورة</button>
                                        <input type="file" name="myfile" id="file-uploader" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>

                                <div class="twm-mid-content text-center">
                                    <a href="{{url('company/dashboard')}}" class="twm-job-title">
                                        <h4>استوديو الفنان </h4>
                                    </a>
                                    <p>مقاول تكنولوجيا المعلومات</p>
                                </div>

                                <div class="twm-nav-list-1">
                                    <ul>
                                        <li><a href="{{url('company/dashboard')}}"><i class="fa fa-user"></i>ملف الشركة</a>
                                        </li>
                                        <li><a href="{{url('company/jobs')}}"><i class="fa fa-suitcase"></i> إدارة
                                                الوظائف</a></li>
                                        <li><a href="{{url('company/add-job')}}"><i class="fa fa-user"></i> اضف وظيفة
                                                جديدة
                                            </a></li>
                                        <li class="active"><a href="{{url('chat-main')}}"><i
                                                    class="fa fa-credit-card"></i> المحادثات </a></li>
                                        <li><a href="{{url('company/plan')}}"><i class="fa fa-credit-card"></i> ادارة
                                                الخطة
                                            </a></li>
                                        <li><a href="{{url('company/change-password')}}"><i
                                                    class="fa fa-fingerprint"></i>
                                                تغيير كلمة المرور</a></li>
                                        <li><a href="{{url('company/logout')}}"><i class="fa fa-share-square"></i> تسجيل
                                                خروج</a></li>
                                    </ul>
                                </div>

                            </div>

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
