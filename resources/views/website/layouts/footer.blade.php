<!-- FOOTER START -->
<footer class="footer-dark" style="background-image: url({{asset('assets/website/images/f-bg.jpg')}});">
    <div class="container">

        <!-- NEWS LETTER SECTION START -->
        <div class="ftr-nw-content">
            <div class="row">
                <div class="col-md-5">
                    <div class="ftr-nw-title">
                        انضم إلى اشتراك البريد الإلكتروني الخاص بنا الآن للحصول على تحديثات الوظائف والإشعارات الجديدة
                    </div>
                </div>
                <div class="col-md-7">
                    <form>
                        <div class="ftr-nw-form">
                            <input name="news-letter" class="form-control" placeholder="أدخل بريدك الإلكتروني"
                                   type="text">
                            <button class="ftr-nw-subcribe-btn">إشترك الآن</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- NEWS LETTER SECTION END -->
        <!-- FOOTER BLOCKES START -->
        <div class="footer-top">
            <div class="row">

                <div class="col-lg-3 col-md-12">

                    <div class="widget widget_about">
                        <div class="logo-footer clearfix">
                            <a href="index.html"><img src="{{asset('assets/website/images/main_logo.png')}}" alt=""></a>
                        </div>
                        <p>العديد من حزم النشر المكتبي ومحرري صفحات الويب الآن.</p>
                        <ul class="ftr-list">
                            <li><p><span>عنوان :</span>65 برج روبن أستراليا </p></li>
                            <li><p><span>بريد إلكتروني :</span>example@max.com</p></li>
                            <li><p><span>يتصل :</span>555-555-1234</p></li>
                        </ul>
                    </div>

                </div>

                <div class="col-lg-9 col-md-12">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="widget widget_services ftr-list-center">
                                <h3 class="widget-title">للمرشح</h3>
                                <ul>
                                    <li><a href="#">لوحة تحكم المستخدم</a></li>
                                    <li><a href="#">استئناف التنبيه</a></li>
                                    <li><a href="#">مرشحين</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="widget widget_services ftr-list-center">
                                <h3 class="widget-title">لأصحاب العمل</h3>
                                <ul>
                                    <li><a href="#">نشر الوظائف</a></li>
                                    <li><a href="#">شبكة المدونة</a></li>
                                    <li><a href="#">اتصال</a></li>
                                    <li><a href="#">قائمة الوظائف</a></li>
                                    <li><a href="#">تفاصيل الوظائف</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="widget widget_services ftr-list-center">
                                <h3 class="widget-title"> روابط </h3>
                                <ul>
                                    <li><a href="#">الأسئلة الشائعة</a></li>
                                    <li><a href="#">تفاصيل صاحب العمل</a></li>
                                    <li><a href="#">حساب تعريفي</a></li>
                                    <li><a href="#">404 صفحة</a></li>
                                    <li><a href="#">التسعير</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- FOOTER COPYRIGHT -->
        <div class="footer-bottom">

            <div class="footer-bottom-info">

                <div class="footer-copy-right">
                    <span class="copyrights-text">حقوق الطبع والنشر © 2023 جميع الحقوق محفوظة.</span>
                </div>
                <ul class="social-icons">
                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                    <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                    <li><a href="javascript:void(0);" class="fab fa-instagram"></a></li>
                    <li><a href="javascript:void(0);" class="fab fa-youtube"></a></li>
                </ul>

            </div>

        </div>

    </div>

</footer>
<!-- FOOTER END -->

<!-- BUTTON TOP START -->
<button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>

<!--Model Popup Section Start-->
<!--Signup popup -->
<div class="modal fade twm-sign-up" id="sign_up_popup" aria-hidden="true" aria-labelledby="sign_up_popupLabel"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form>

                <div class="modal-header">
                    <h2 class="modal-title" id="sign_up_popupLabel">اشتراك</h2>
                    <p>اشترك والحصول على جميع ميزات جوبزيلا</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="twm-tabs-style-2">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <!--Signup Candidate-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#sign-candidate"
                                        type="button"><i class="fas fa-user-tie"></i>مُرَشَّح
                                </button>
                            </li>
                            <!--Signup Employer-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sign-Employer"
                                        type="button"><i class="fas fa-building"></i>صاحب العمل
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!--Signup Candidate Content-->
                            <div class="tab-pane fade show active" id="sign-candidate">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input name="username" type="text" required="" class="form-control"
                                                   placeholder="اسم المستخدم*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input name="email" type="text" class="form-control" required=""
                                                   placeholder="كلمة المرور*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input name="phone" type="text" class="form-control" required=""
                                                   placeholder="بريد إلكتروني*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input name="phone" type="text" class="form-control" required=""
                                                   placeholder="هاتف*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <div class=" form-check">
                                                <input type="checkbox" class="form-check-input" id="agree1">
                                                <label class="form-check-label" for="agree1">أنا أوافق على <a
                                                        href="javascript:;">الأحكام والشروط</a></label>
                                                <p>مسجل بالفعل؟
                                                    <button class="twm-backto-login" data-bs-target="#sign_up_popup2"
                                                            data-bs-toggle="modal" data-bs-dismiss="modal">تسجيل الدخول
                                                        هنا
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="site-button">اشتراك</button>
                                    </div>

                                </div>
                            </div>
                            <!--Signup Employer Content-->
                            <div class="tab-pane fade" id="sign-Employer">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input name="username" type="text" required="" class="form-control"
                                                   placeholder="اسم المستخدم*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input name="email" type="text" class="form-control" required=""
                                                   placeholder="كلمة المرور*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input name="phone" type="text" class="form-control" required=""
                                                   placeholder="بريد إلكتروني*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input name="phone" type="text" class="form-control" required=""
                                                   placeholder="هاتف*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <div class=" form-check">
                                                <input type="checkbox" class="form-check-input" id="agree2">
                                                <label class="form-check-label" for="agree2">أنا أوافق على <a
                                                        href="javascript:;">الأحكام والشروط</a></label>
                                                <p>مسجل بالفعل؟
                                                    <button class="twm-backto-login" data-bs-target="#sign_up_popup2"
                                                            data-bs-toggle="modal" data-bs-dismiss="modal">تسجيل الدخول
                                                        هنا
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="site-button">اشتراك</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <span class="modal-f-title">تسجيل الدخول أو الاشتراك مع</span>
                    <ul class="twm-modal-social">
                        <li><a href="javascript.html" class="facebook-clr"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="javascript.html" class="twitter-clr"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="javascript.html" class="linkedin-clr"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="javascript.html" class="google-clr"><i class="fab fa-google"></i></a></li>
                    </ul>
                </div>

            </form>
        </div>
    </div>

</div>
<!--Login popup -->
<div class="modal fade twm-sign-up" id="sign_up_popup2" aria-hidden="true" aria-labelledby="sign_up_popupLabel2"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form>
                <div class="modal-header">
                    <h2 class="modal-title" id="sign_up_popupLabel2">تسجيل الدخول</h2>
                    <p>تسجيل الدخول والحصول على جميع ميزات جوبزيلا</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="twm-tabs-style-2">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">

                            <!--Login Candidate-->
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#login-candidate"
                                        type="button"><i class="fas fa-user-tie"></i>مُرَشَّح
                                </button>
                            </li>
                            <!--Login Employer-->
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#login-Employer"
                                        type="button"><i class="fas fa-building"></i>صاحب العمل
                                </button>
                            </li>

                        </ul>

                        <div class="tab-content" id="myTab2Content">
                            <!--Login Candidate Content-->
                            <div class="tab-pane fade show active" id="login-candidate">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input name="username" type="text" required="" class="form-control"
                                                   placeholder="اسم المستخدم*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input name="email" type="text" class="form-control" required=""
                                                   placeholder="كلمة المرور*">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <div class=" form-check">
                                                <input type="checkbox" class="form-check-input" id="Password3">
                                                <label class="form-check-label rem-forgot" for="Password3">تذكرنى <a
                                                        href="javascript:;">هل نسيت كلمة السر</a></label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="site-button">تسجيل الدخول</button>
                                        <div class="mt-3 mb-3">ليس لديك حساب؟
                                            <button class="twm-backto-login" data-bs-target="#sign_up_popup"
                                                    data-bs-toggle="modal" data-bs-dismiss="modal">اشتراك
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--Login Employer Content-->
                            <div class="tab-pane fade" id="login-Employer">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input name="username" type="text" required="" class="form-control"
                                                   placeholder="اسم المستخدم*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input name="email" type="text" class="form-control" required=""
                                                   placeholder="كلمة المرور*">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <div class=" form-check">
                                                <input type="checkbox" class="form-check-input" id="Password4">
                                                <label class="form-check-label rem-forgot" for="Password4">تذكرنى <a
                                                        href="javascript:;">هل نسيت كلمة السر</a></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="site-button">تسجيل الدخول</button>
                                        <div class="mt-3 mb-3">ليس لديك حساب؟
                                            <button class="twm-backto-login" data-bs-target="#sign_up_popup"
                                                    data-bs-toggle="modal" data-bs-dismiss="modal">اشتراك
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="modal-f-title">تسجيل الدخول أو الاشتراك مع</span>
                    <ul class="twm-modal-social">
                        <li><a href="javascript.html" class="facebook-clr"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="javascript.html" class="twitter-clr"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="javascript.html" class="linkedin-clr"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="javascript.html" class="google-clr"><i class="fab fa-google"></i></a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Model Popup Section End-->


</div>


<!-- JAVASCRIPT  FILES ========================================= -->
<script src="{{asset('assets/website/js/jquery-3.6.0.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script src="{{asset('assets/website/js/popper.min.js')}}"></script><!-- POPPER.MIN JS -->
<script src="{{asset('assets/website/js/bootstrap.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{asset('assets/website/js/magnific-popup.min.js')}}"></script><!-- MAGNIFIC-POPUP JS -->
<script src="{{asset('assets/website/js/waypoints.min.js')}}"></script><!-- WAYPOINTS JS -->
<script src="{{asset('assets/website/js/counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script src="{{asset('assets/website/js/waypoints-sticky.min.js')}}"></script><!-- STICKY HEADER -->
<script src="{{asset('assets/website/js/isotope.pkgd.min.js')}}"></script><!-- MASONRY  -->
<script src="{{asset('assets/website/js/imagesloaded.pkgd.min.js')}}"></script><!-- MASONRY  -->
<script src="{{asset('assets/website/js/owl.carousel.min.js')}}"></script><!-- OWL  SLIDER  -->
<script src="{{asset('assets/website/js/theia-sticky-sidebar.js')}}"></script><!-- STICKY SIDEBAR  -->
<script src="{{asset('assets/website/js/lc_lightbox.lite.js')}}"></script><!-- IMAGE POPUP -->
<script src="{{asset('assets/website/js/bootstrap-select.min.js')}}"></script><!-- Form js -->
<script src="{{asset('assets/website/js/dropzone.js')}}"></script><!-- IMAGE UPLOAD  -->
<script src="{{asset('assets/website/js/jquery.scrollbar.js')}}"></script><!-- scroller -->
<script src="{{asset('assets/website/js/bootstrap-datepicker.js')}}"></script><!-- scroller -->
<script src="{{asset('assets/website/js/jquery.dataTables.min.js')}}"></script><!-- Datatable -->
<script src="{{asset('assets/website/js/dataTables.bootstrap5.min.js')}}"></script><!-- Datatable -->
<script src="{{asset('assets/website/js/chart.js')}}"></script><!-- Chart -->
<script src="{{asset('assets/website/js/bootstrap-slider.min.js')}}"></script><!-- Price range slider -->
<script src="{{asset('assets/website/js/swiper-bundle.min.js')}}"></script><!-- Swiper JS -->
<script src="{{asset('assets/website/js/custom.js')}}"></script><!-- CUSTOM FUCTIONS  -->
<script src="{{asset('assets/website/js/switcher.js')}}"></script><!-- SHORTCODE FUCTIONS  -->
@notifyJs
@yield('js')
</body>

</html>
