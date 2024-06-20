@extends('website.layouts.master')
@section('title')
     اضف وظيفة جديدة
@endsection
@section('content')


    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center" style="background-image:url({{asset('assets/website/images/banner/1.jpg')}});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title">الشركة تنشر وظيفة</h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{url('/')}}"> الرئيسية  </a></li>
                            <li> اضافة وظيفة  </li>
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
                                    <li><a href="{{url('company/dashboard')}}"><i class="fa fa-user"></i>ملف الشركة</a></li>
                                    <li><a href="{{url('company/jobs')}}"><i class="fa fa-suitcase"></i> إدارة الوظائف</a></li>
                                    <li class="active"><a href="{{url('company/add-job')}}"><i class="fa fa-user"></i> اضف وظيفة جديدة  </a></li>
                                    <li><a href="{{url('company/chat')}}"><i class="fa fa-credit-card"></i> المحادثات   </a></li>
                                    <li><a href="{{url('company/plan')}}"><i class="fa fa-credit-card"></i> ادارة الخطة  </a></li>
                                    <li><a href="{{url('company/change-password')}}"><i class="fa fa-fingerprint"></i> تغيير كلمة المرور</a></li>
                                    <li><a href="{{url('company/logout')}}"><i class="fa fa-share-square"></i> تسجيل خروج</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                        <!--Filter Short By-->
                        <div class="twm-right-section-panel site-bg-gray">
                            <form>
                                <!--Basic Information-->
                                <div class="panel panel-default">
                                    <div class="panel-heading wt-panel-heading p-a20">
                                        <h4 class="panel-tittle m-a0"><i class="fa fa-suitcase"></i>تفاصيل الوظيفة</h4>
                                    </div>
                                    <div class="panel-body wt-panel-body p-a20 m-b30 ">

                                        <div class="row">
                                            <!--Job title-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>مسمى وظيفي</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_name" type="text" placeholder="ديفيد سميث">
                                                        <i class="fs-input-icon fa fa-address-card"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Job Category-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>تصنيف الوظيفة</label>
                                                    <div class="ls-inputicon-box">
                                                        <select class="wt-select-box selectpicker"  data-live-search="true" title="" id="j-category" data-bv-field="size">
                                                            <option disabled selected value="">اختر الفئة</option>
                                                            <option>المحاسبة والتمويل</option>
                                                            <option> كتابي &amp;ادخال بيانات</option>
                                                            <option>تقديم المشورة</option>
                                                            <option>إدارة المحكمة</option>
                                                            <option>الموارد البشرية</option>
                                                            <option>التحقيق</option>
                                                            <option>وأجهزة الكمبيوتر</option>
                                                            <option>تطبيق القانون</option>
                                                            <option>إدارة</option>
                                                            <option>متنوع</option>
                                                            <option>العلاقات العامة</option>
                                                        </select>
                                                        <i class="fs-input-icon fa fa-border-all"></i>
                                                    </div>

                                                </div>
                                            </div>

                                            <!--Job Type-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>نوع الوظيفة</label>
                                                    <div class="ls-inputicon-box">
                                                        <select class="wt-select-box selectpicker"  data-live-search="true" title="" id="s-category" data-bv-field="size">
                                                            <option class="bs-title-option" value="">اختر الفئة</option>
                                                            <option>بدوام كامل </option>
                                                            <option>مستقل </option>
                                                            <option>دوام جزئى</option>
                                                            <option>التدريب الداخلي</option>
                                                            <option>مؤقت</option>
                                                        </select>
                                                        <i class="fs-input-icon fa fa-file-alt"></i>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--Offered Salary-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>عرض الراتب</label>
                                                    <div class="ls-inputicon-box">
                                                        <select class="wt-select-box selectpicker"  data-live-search="true" title="" id="salary" data-bv-field="size">
                                                            <option class="bs-title-option" value=""> الراتب</option>
                                                            <option>$500</option>
                                                            <option>$1000</option>
                                                            <option>$1500</option>
                                                            <option>$2000</option>
                                                            <option>$2500</option>
                                                        </select>
                                                        <i class="fs-input-icon fa fa-dollar-sign"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Experience-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>خبرة</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_Email" type="email" placeholder="على سبيل المثال الحد الأدنى 3 سنوات">
                                                        <i class="fs-input-icon fa fa-user-edit"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Qualification-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>مؤهل</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_Email" type="email" placeholder="المؤهل / العنوان">
                                                        <i class="fs-input-icon fa fa-user-graduate"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Gender-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> الجنس</label>
                                                    <div class="ls-inputicon-box">
                                                        <select class="wt-select-box selectpicker"  data-live-search="true" title="" id="gender" data-bv-field="size">
                                                            <option class="bs-title-option" value=""> الجنس</option>
                                                            <option>ذكر</option>
                                                            <option>أنثى</option>
                                                            <option>آخر</option>
                                                        </select>
                                                        <i class="fs-input-icon fa fa-venus-mars"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Country-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label> البلد</label>
                                                    <div class="ls-inputicon-box">
                                                        <select class="wt-select-box selectpicker"  data-live-search="true" title="" id="country" data-bv-field="size">
                                                            <option class="bs-title-option" value=""> البلد </option>
                                                            <option>أفغانستان</option>
                                                            <option>ألبانيا</option>
                                                            <option>الجزائر</option>
                                                            <option>أندورا</option>
                                                            <option>أنغولا</option>
                                                            <option>أنتيغوا وبربودا</option>
                                                            <option>الأرجنتين</option>
                                                            <option>أرمينيا</option>
                                                            <option>أستراليا</option>
                                                            <option>النمسا</option>
                                                            <option>أذربيجان </option>
                                                            <option> جزر البهاما</option>
                                                            <option>البحرين</option>
                                                            <option>بنغلاديش</option>
                                                            <option>بربادوس</option>
                                                        </select>
                                                        <i class="fs-input-icon fa fa-globe-americas"></i>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--City-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>مدينة</label>
                                                    <div class="ls-inputicon-box">
                                                        <select class="wt-select-box selectpicker"  data-live-search="true" title="" id="city" data-bv-field="size">
                                                            <option class="bs-title-option" value="">مدينة</option>
                                                            <option>سيدني</option>
                                                            <option>ملبورن</option>
                                                            <option>بريسبان</option>
                                                            <option>بيرث</option>
                                                            <option>أدليد</option>
                                                            <option>الساحل الذهبي</option>
                                                            <option>كرانبورن</option>
                                                            <option>نيوكاسل</option>
                                                            <option> ولونجونج</option>
                                                            <option> جيلونج</option>
                                                            <option>هوبارت</option>
                                                            <option>تاونزفيل</option>
                                                            <option>إبسويتش</option>
                                                        </select>
                                                        <i class="fs-input-icon fa fa-map-marker-alt"></i>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--Location-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>موقع</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_Email" type="email" placeholder="اكتب العنوان">
                                                        <i class="fs-input-icon fa fa-map-marker-alt"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Latitude-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>خط العرض</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_Email" type="email" placeholder="الملائكة">
                                                        <i class="fs-input-icon fa fa-map-pin"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--longitude-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>خط الطول</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_Email" type="email" placeholder="الملائكة">
                                                        <i class="fs-input-icon fa fa-map-pin"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Email Address-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>عنوان البريد الإلكتروني</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_Email" type="email" placeholder="Devid@example.com">
                                                        <i class="fs-input-icon fas fa-at"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Website-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>الموقع </label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_website" type="text" placeholder="https://.../">
                                                        <i class="fs-input-icon fa fa-globe-americas"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Est. Since-->
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>شرق. قديم الطراز</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="منذ...">
                                                        <i class="fs-input-icon fa fa-clock"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Complete Address-->
                                            <div class="col-xl-12 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>عنوان كامل</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="1363-1385 غروب الشمس الجادة لوس أنجلوس, كاليفورنيا 90026 ، الولايات المتحدة الأمريكية">
                                                        <i class="fs-input-icon fa fa-home"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Description-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>وصف</label>
                                                    <textarea class="form-control" rows="3" placeholder="تحيات! نحن شركة Galaxy التنمية التنمية. نأمل أن تستمتع بخدماتنا وجودةنا."></textarea>
                                                </div>
                                            </div>

                                            <!--Start Date-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>تاريخ البدء</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                        <i class="fs-input-icon far fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--End Date-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>تاريخ الانتهاء</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                        <i class="fs-input-icon far fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="text-left">
                                                    <button type="submit" class="site-button m-r5">نشر الوظيفة</button>
                                                    <button type="submit" class="site-button outline-primary">حفظ المسودة</button>
                                                </div>
                                            </div>




                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- OUR BLOG END -->



    </div>
    <!-- CONTENT END -->
@endsection
