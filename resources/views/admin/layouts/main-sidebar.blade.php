<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'admin/dashboard')) }}">
            لوحة التحكم
            {{--            <img--}}
            {{--                src="{{ URL::asset('assets/admin/img/brand/logo.png') }}" class="main-logo" alt="logo">--}}
        </a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/admin/img/brand/logo-white.png') }}" class="main-logo dark-theme"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/admin/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/admin/img/brand/favicon-white.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    @if(!empty(Auth::guard('admin')->user()->image))
                        <img alt="user-img" class="avatar avatar-xl brround"
                             src="{{\Illuminate\Support\Facades\Storage::url(Auth::guard('admin')->user()->image)}}">
                        <span
                            class="avatar-status profile-status bg-green"></span>
                    @else
                        <img alt="user-img" class="avatar avatar-xl brround"
                             src="{{ URL::asset('assets/admin/img/faces/6.jpg') }}"><span
                            class="avatar-status profile-status bg-green"></span>
                    @endif

                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0"> {{Auth::guard('admin')->user()->name}}  </h4>
                    <span class="mb-0 text-muted"> {{Auth::guard('admin')->user()->email}} </span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category"> الرئيسية</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/dashboard')) }}">
                    <svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/>
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/>
                    </svg>
                    <span class="side-menu__label">الرئيسية </span></a>
            </li>
            {{--             //////////////////////// Admin ///////////////////--}}
            <li class="side-item side-item-category"> ادارة الشركات</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-package"></i>
                    <span class="side-menu__label">   ادارة الشركات   </span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{url('admin/companies')}}"> مشاهدة الشركات </a>
                    </li>
                    <li><a class="slide-item" href="{{url('admin/company/store')}}"> اضف شركة </a>
                    </li>
                </ul>
            </li>
            <li class="side-item side-item-category"> الموظفين   </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-user"></i>
                    <span class="side-menu__label">   الموظفين </span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{url('admin/users')}}"> الموظفين  </a></li>
                </ul>
            </li>
            <li class="side-item side-item-category"> ادارة الخطط والباقات</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <i style="font-size: 22px;margin-left: 10px" class="bx bxl-paypal"></i>
                    <span class="side-menu__label">   ادارة الخطط والباقات  </span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{url('admin/plans')}}"> الخطط والباقات </a>
                    </li>
                    <li><a class="slide-item" href="{{url('admin/plan/store')}}"> اضف خطة </a>
                    </li>
                </ul>
            </li>

            <li class="side-item side-item-category"> ادارة الاعلانات</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-package"></i>
                    <span class="side-menu__label">   ادارة الاعلانات   </span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{url('admin/advertisements')}}"> مشاهدة الاعلانات </a>
                    </li>
                    <li><a class="slide-item" href="{{url('admin/advertisement/store')}}"> اضف اعلان </a>
                    </li>
                </ul>
            </li>


            <li class="side-item side-item-category">  الاسئلة الشائعه  </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-package"></i>
                    <span class="side-menu__label">  الاسئلة الشائعة    </span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{url('admin/faqs')}}"> جميع الاسئلة  </a>
                    </li>
                    <li><a class="slide-item" href="{{url('admin/faq/store')}}"> اضف سؤال </a>
                    </li>
                </ul>
            </li>

            <li class="side-item side-item-category">  المدونة  </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-package"></i>
                    <span class="side-menu__label">   المدونة  </span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{url('admin/blog')}}">  المقالات   </a>
                    </li>
                    <li><a class="slide-item" href="{{url('admin/blog/add')}}"> اضافة مقال جديد  </a>
                    </li>
                </ul>
            </li>

            <li class="side-item side-item-category">  المسميات الوظيفية والتصنيفات   </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-package"></i>
                    <span class="side-menu__label">  التصنيفات    </span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{url('admin/JobCategories')}}">  جميع التصنيفات   </a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-package"></i>
                    <span class="side-menu__label">   المسميات الوظيفية  </span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{url('admin/jobs_name')}}">  جميع المسميات   </a>
                </ul>
            </li>



            <li class="side-item side-item-category">   التخصصات الوظيفية والمسميات   </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-package"></i>
                    <span class="side-menu__label">  التصنيفات    </span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{url('admin/SpecialCategories')}}">  جميع التصنيفات   </a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-package"></i>
                    <span class="side-menu__label">   التخصصات المهنية   </span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{url('admin/specialists')}}">  التخصصات المهنية    </a>
                </ul>
            </li>



{{--            <li class="side-item side-item-category">  اعدادات اضافية   </li>--}}
{{--            <li class="slide">--}}
{{--                <a class="side-menu__item" data-toggle="slide" href="">--}}
{{--                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-package"></i>--}}
{{--                    <span class="side-menu__label"> اعدادات اضافية   </span><i--}}
{{--                        class="angle fe fe-chevron-down"></i></a>--}}
{{--                <ul class="slide-menu">--}}
{{--                    <li><a class="slide-item" href="{{url('admin/jobs_name')}}"> المسميات الوظيفية   </a>--}}
{{--                    <li><a class="slide-item" href="{{url('admin/specialists')}}">  التخصصات المهنية    </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            <li class="side-item side-item-category">  الشروط والاحكام  </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-package"></i>
                    <span class="side-menu__label">  الشروط والاحكام    </span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{url('admin/terms')}}"> الشروط والاحكام    </a>
                    </li>
                </ul>
            </li>
            <li class="side-item side-item-category"> حسابي</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-cog"></i>
                    <span class="side-menu__label">  الاعدادات الشخصية </span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{url('admin/update_admin_password')}}"> تعديل كلمة المرور </a>
                    </li>
                    <li><a class="slide-item" href="{{url('admin/update_admin_details')}}"> تعديل البيانات </a></li>
                </ul>
            </li>
{{--            <li class="side-item side-item-category"> اعدادات الموقع</li>--}}
{{--            <li class="slide">--}}
{{--                <a class="side-menu__item" data-toggle="slide" href="">--}}
{{--                    <i style="font-size: 22px;margin-left: 10px" class="bx bx-home"></i>--}}
{{--                    <span class="side-menu__label">  الصفحه الرئيسيه  </span><i--}}
{{--                        class="angle fe fe-chevron-down"></i></a>--}}
{{--                <ul class="slide-menu">--}}
{{--                    <li><a class="slide-item" href="{{url('admin/banners')}}"> البانرز </a>--}}
{{--                    </li>--}}
{{--                    <li><a class="slide-item" href="{{url('admin/website_advantage')}}"> مميزات المتجر </a>--}}
{{--                    <li><a class="slide-item" href="{{url('admin/front_titles')}}"> التحكم في العناوين الرئيسية </a>--}}
{{--                    <li><a class="slide-item" href="{{url('admin/under_banner')}}"> البانر الاساسي </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
