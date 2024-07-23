<div class="page-wraper">
    <!-- HEADER START -->
    <header class="site-header header-style-3 mobile-sider-drawer-menu">

        <div class="sticky-header main-bar-wraper  navbar-expand-lg">
            <div class="main-bar color-fill">

                <div class="container-fluid clearfix">

                    <div class="logo-header">
                        <div class="logo-header-inner logo-header-one">
                            <a href="{{url('/')}}">
                                <img width="85px" src="{{asset('assets/website/images/logo.png')}}" alt="">
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
                            <li class="has-child"><a href="{{url('talents')}}"> ابحث عن خبراء </a></li>
                            <li class="has-child"><a href="{{url('employers')}}"> لاصحاب الوظائف </a></li>
                            <li class="has-child"><a href="{{url('contact')}}"> اتصل بنا </a></li>
                        </ul>

                    </div>

                    <!-- Header Right Section-->
                    <div class="extra-nav header-2-nav">
                        <div class="extra-cell">
                            <div class="header-nav-btn-section">
                                <!------------------------------ Login As Company  -------------------------->
                                @if(Auth::guard('company')->user())
                                    <!----------------- Message Alerts --------------->

                                    <div class="dropdown notificaion-alerts">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            @if(Auth::guard('company')->user()->unreadNotifications->where('type','App\Notifications\NewMessage')->count() > 0 )
                                                <span
                                                    class="counter"> {{Auth::guard('company')->user()->unreadNotifications->count()}} </span>
                                            @endif
                                            <i class="fa fa-envelope"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            @if(Auth::guard('company')->user()->unreadNotifications->where('type','App\Notifications\NewMessage')->count() > 0 )
                                                @foreach(\Illuminate\Support\Facades\Auth::guard('company')->user()->unreadNotifications as $notification)

                                                    <li><a class="dropdown-item"
                                                           href="{{url('chat-main')}}"> {{$notification['data']['title']}}
                                                            {{$notification['data']['sender_username']}}
                                                            <br>
                                                            <span class="timer"> <i class="fa fa-clock"></i>  {{$notification->created_at->diffForHumans()}}  </span>
                                                        </a>
                                                    </li>
                                                    <hr>

                                                @endforeach
                                            @else
                                                <li><a class="dropdown-item"> لا يوجد لديك رسائل في الوقت
                                                        الحالي </a>
                                                </li>
                                                <hr>
                                            @endif
                                        </ul>
                                    </div>

                                    <!------------------------ Notification Alerts For Company  --------------->
                                    <div class="dropdown notificaion-alerts">

                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            @if(Auth::guard('company')->user()->unreadNotifications->count() > 0)
                                                <span
                                                    class="counter"> {{Auth::guard('company')->user()->unreadNotifications->count()}} </span>
                                            @endif

                                            <i class="fa fa-bell"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            @forelse (\Illuminate\Support\Facades\Auth::guard('company')->user()->unreadNotifications as $notification)
                                                @if($notification['type'] == 'App\Notifications\SendJobAcceptedFromAdmin')
                                                    <li><a class="dropdown-item"
                                                           href="{{url('job/'.$notification['data']['adv_id'].'-'.$notification['data']['slug'])}}"> {{$notification['data']['title']}}
                                                            : {{$notification['data']['title_name']}}
                                                            <br>
                                                            <span class="timer"> <i class="fa fa-clock"></i>  {{$notification->created_at->diffForHumans()}}  </span>
                                                        </a>

                                                    </li>
                                                    <hr>
                                                @elseif($notification['type'] == 'App\Notifications\NewOfferRequestToCompanyJob')
                                                    <li><a class="dropdown-item"
                                                           href="{{url('company/job/offers/'.$notification['data']['adv_id'])}}"> {{$notification['data']['title']}}
                                                            : {{$notification['data']['adv_title']}}
                                                            <br>
                                                            <span class="timer"> <i class="fa fa-clock"></i>  {{$notification->created_at->diffForHumans()}}  </span>
                                                        </a>

                                                    </li>
                                                    <hr>
                                                @elseif($notification['type'] == 'App\Notifications\NewMessage')
                                                    <li><a class="dropdown-item"
                                                           href="{{url('chat-main')}}"> {{$notification['data']['title']}}
                                                            {{$notification['data']['sender_username']}}
                                                            <br>
                                                            <span class="timer"> <i class="fa fa-clock"></i>  {{$notification->created_at->diffForHumans()}}  </span>
                                                        </a>
                                                    </li>
                                                    <hr>

                                                @endif

                                            @empty
                                                <li><a class="dropdown-item"> لا يوجد لديك اشعارات في الوقت الحالي </a>
                                                </li>
                                                <hr>
                                            @endforelse
                                        </ul>
                                    </div>

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
                                    <!----------------- Message Alerts --------------->

                                    <div class="dropdown notificaion-alerts">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            @if(Auth::user()->unreadNotifications->where('type','App\Notifications\NewMessage')->count() > 0 )
                                                <span
                                                    class="counter"> {{Auth::user()->unreadNotifications->count()}} </span>
                                            @endif
                                            <i class="fa fa-envelope"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            @if(Auth::user()->unreadNotifications->where('type','App\Notifications\NewMessage')->count() > 0 )
                                                @forelse (\Illuminate\Support\Facades\Auth::user()->unreadNotifications as $notification)

                                                    <li><a class="dropdown-item"
                                                           href="{{url('chat-main')}}"> {{$notification['data']['title']}}
                                                            {{$notification['data']['sender_username']}}
                                                            <br>
                                                            <span class="timer"> <i class="fa fa-clock"></i>  {{$notification->created_at->diffForHumans()}}  </span>
                                                        </a>
                                                    </li>
                                                    <hr>
                                                @empty
                                                    <li><a class="dropdown-item"> لا يوجد لديك رسائل في الوقت
                                                            الحالي </a>
                                                    </li>
                                                    <hr>
                                                @endforelse
                                            @else
                                                <li><a class="dropdown-item"> لا يوجد لديك رسائل في الوقت
                                                        الحالي </a>
                                                </li>
                                                <hr>
                                            @endif
                                        </ul>
                                    </div>
                                    <!------------------------ Notification Alerts For Users  --------------->
                                    <div class="dropdown notificaion-alerts">

                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            @if(Auth::user()->unreadNotifications->count() > 0 )
                                                <span
                                                    class="counter"> {{Auth::user()->unreadNotifications->count()}} </span>
                                            @endif
                                            <i class="fa fa-bell"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            @forelse (\Illuminate\Support\Facades\Auth::user()->unreadNotifications as $notification)
                                                @if($notification['type'] == 'App\Notifications\SendNewSujestJob')
                                                    <li><a class="dropdown-item"
                                                           href="{{url('job/'.$notification['data']['adv_id'].'-'.$notification['data']['adv_slug'])}}"> {{$notification['data']['title']}}
                                                            : {{$notification['data']['adv_name']}}
                                                            <br>
                                                            <span class="timer"> <i class="fa fa-clock"></i>  {{$notification->created_at->diffForHumans()}}  </span>
                                                        </a>

                                                    </li>
                                                    <hr>
                                                @elseif($notification['type'] == 'App\Notifications\SendUnaccepedOfferToUser')
                                                    <li><a class="dropdown-item"
                                                           href="{{url('job/'.$notification['data']['adv_id'].'-'.$notification['data']['adv_slug'])}}"> {{$notification['data']['title']}}
                                                            : {{$notification['data']['adv_name']}}
                                                            <br>
                                                            <span class="timer"> <i class="fa fa-clock"></i>  {{$notification->created_at->diffForHumans()}}  </span>
                                                        </a>

                                                    </li>
                                                    <hr>
                                                @elseif($notification['type'] == 'App\Notifications\NewMessage')
                                                    <li><a class="dropdown-item"
                                                           href="{{url('chat-main')}}"> {{$notification['data']['title']}}
                                                            {{$notification['data']['sender_username']}}
                                                            <br>
                                                            <span class="timer"> <i class="fa fa-clock"></i>  {{$notification->created_at->diffForHumans()}}  </span>
                                                        </a>
                                                    </li>
                                                    <hr>
                                                @endif

                                            @empty
                                                <li><a class="dropdown-item"> لا يوجد لديك اشعارات في الوقت الحالي </a>
                                                </li>
                                                <hr>
                                            @endforelse
                                        </ul>
                                    </div>

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
