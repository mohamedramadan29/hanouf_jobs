<div class="page-wraper">
    <!-- HEADER START -->
    <header class="site-header header-style-3 mobile-sider-drawer-menu">

        <div class="sticky-header main-bar-wraper  navbar-expand-lg">
            <div class="main-bar color-fill">

                <div class="container-fluid clearfix">

                    <div class="logo-header">
                        <div class="logo-header-inner logo-header-one">
                            <a href="{{url('/')}}">
                                <img width="115px" src="{{asset('assets/website/images/main_logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>

                    <!-- NAV Toggle Button -->
                    <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button"
                            class="navbar-toggler collapsed">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar icon-bar-first"></span>
                        <span class="icon-bar icon-bar-two"></span>
                        <span class="icon-bar icon-bar-three"></span>
                    </button>

                    <!-- MAIN Vav -->
                    <div class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-center">

                        <ul class=" nav navbar-nav">
                            <li class="has-mega-menu"><a href="{{url('/')}}"> الرئيسية </a></li>
                            <li class="has-mega-menu"><a href="{{url('jobs')}}"> الوظائف </a></li>
                            <li class="has-child"><a href="{{url('talents')}}"> الموظفين  </a></li>
                            <li class="has-child"><a href="{{url('talent-details')}}"> تفاصيل الخبير </a></li>
                            <li class="has-child"><a href="{{url('contact')}}"> اتصل بنا </a></li>
                            <li class="has-child"><a href="{{url('faqs')}}"> الاسئلة الشائعة </a></li>
                        </ul>

                    </div>

                    <!-- Header Right Section-->
                    <div class="extra-nav header-2-nav">
                        <div class="extra-cell">
                            <div class="header-search">
                                <a href="#search" class="header-search-icon"><i class="feather-search"></i></a>
                            </div>
                        </div>
                        <div class="extra-cell">
                            <div class="header-nav-btn-section">
                                <!------------------------------ Login As Company  -------------------------->
                                @if(Auth::guard('company')->user())
                                    <div class="twm-nav-btn-left">
                                        <a class="twm-nav-sign-up" href="{{url('company/dashboard')}}" role="button">
                                            <i class="feather-user"></i> حسابي
                                        </a>
                                    </div>
                                    <div class="twm-nav-btn-right">
                                        <a href="{{url('company/add-job')}}" class="twm-nav-post-a-job">
                                            <i class="feather-briefcase"></i> اضافة وظيفة
                                        </a>
                                    </div>
                                    <!--------------------------------- Login As Employer ------------------->
                                @elseif(Auth::user())
                                    <div class="twm-nav-btn-left">
                                        <a class="twm-nav-sign-up" href="{{url('user/dashboard')}}"
                                           role="button">
                                            <i class="feather-log-in"></i> حسابي
                                        </a>
                                    </div>
                                @else
                                    <!---------------------------- Not Login Users ---------------------------->
                                    <div class="twm-nav-btn-left">
                                        <a class="twm-nav-sign-up" href="{{url('login')}}"
                                           role="button">
                                            <i class="feather-log-in"></i> تسجيل دخول
                                        </a>
                                    </div>
                                    <div class="twm-nav-btn-right">
                                        <a href="{{url('register')}}" class="twm-nav-post-a-job">
                                            <i class="feather-user"></i> حساب جديد
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>


                </div>


            </div>

            <!-- SITE Search -->
            <div id="search">
                <span class="close"></span>
                <form role="search" id="searchform" action="https://thewebmax.org/search" method="get"
                      class="radius-xl">
                    <input class="form-control" value="" name="q" type="search" placeholder="اكتب للبحث"/>
                    <span class="input-group-append">
                    <button type="button" class="search-btn">
                        <i class="fa fa-paper-plane"></i>
                    </button>
                </span>
                </form>
            </div>
        </div>

    </header>
    <!-- HEADER END -->
