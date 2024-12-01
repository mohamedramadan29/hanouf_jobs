<!-- FOOTER START -->
<footer class="footer-dark" style="background-image: url({{ asset('assets/website/images/f-bg.jpg') }});">
    <div class="container">

        <!-- FOOTER BLOCKES START -->
        <div class="footer-top">
            <div class="row">

                <div class="col-lg-4 col-md-12">

                    <div class="widget widget_about">
                        <div class="logo-footer clearfix">
                            <a href="index.html"><img src="{{ asset('assets/website/images/new_logo.png') }}"
                                    alt=""></a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="widget widget_services ftr-list-center">
                                <h3 class="widget-title"> روابط </h3>
                                <ul>
                                    <li><a href="{{ url('blog') }}"> المدونة  </a></li>
                                    <li><a href="{{ url('contact') }}"> تواصل معنا   </a></li>
                                    <li><a href="{{ url('faqs') }}">الأسئلة الشائعة</a></li>
                                    <li><a href="{{ url('terms') }}"> الشروط والاحكام </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="widget widget_services ftr-list-center">
                                <h3 class="widget-title">تواصل معنا </h3>
                                <ul>
                                    <li><a href="tel:+9667319189"> <i class="fa fa-phone"></i> 731 9189 966 </a></li>
                                    <li> <a href="mailto:info@takhair.site"> <i class="fa fa-envelope"></i> info@takhair.site </a> </li>
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
                    <span class="copyrights-text">حقوق الطبع والنشر © 2024 جميع الحقوق محفوظة.</span>
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



<!-- JAVASCRIPT  FILES ========================================= -->
<script src="{{ asset('assets/website/js/jquery-3.6.0.min.js') }}"></script><!-- JQUERY.MIN JS -->
<script src="{{ asset('assets/website/js/popper.min.js') }}"></script><!-- POPPER.MIN JS -->
<script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{ asset('assets/website/js/magnific-popup.min.js') }}"></script><!-- MAGNIFIC-POPUP JS -->
<script src="{{ asset('assets/website/js/waypoints.min.js') }}"></script><!-- WAYPOINTS JS -->
<script src="{{ asset('assets/website/js/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
<script src="{{ asset('assets/website/js/waypoints-sticky.min.js') }}"></script><!-- STICKY HEADER -->
<script src="{{ asset('assets/website/js/isotope.pkgd.min.js') }}"></script><!-- MASONRY  -->
<script src="{{ asset('assets/website/js/imagesloaded.pkgd.min.js') }}"></script><!-- MASONRY  -->
<script src="{{ asset('assets/website/js/owl.carousel.min.js') }}"></script><!-- OWL  SLIDER  -->
<script src="{{ asset('assets/website/js/theia-sticky-sidebar.js') }}"></script><!-- STICKY SIDEBAR  -->
<script src="{{ asset('assets/website/js/lc_lightbox.lite.js') }}"></script><!-- IMAGE POPUP -->
<script src="{{ asset('assets/website/js/bootstrap-select.min.js') }}"></script><!-- Form js -->
<script src="{{ asset('assets/website/js/dropzone.js') }}"></script><!-- IMAGE UPLOAD  -->
<script src="{{ asset('assets/website/js/jquery.scrollbar.js') }}"></script><!-- scroller -->
<script src="{{ asset('assets/website/js/bootstrap-datepicker.js') }}"></script><!-- scroller -->
<script src="{{ asset('assets/website/js/jquery.dataTables.min.js') }}"></script><!-- Datatable -->
<script src="{{ asset('assets/website/js/dataTables.bootstrap5.min.js') }}"></script><!-- Datatable -->
<script src="{{ asset('assets/website/js/chart.js') }}"></script><!-- Chart -->
<script src="{{ asset('assets/website/js/bootstrap-slider.min.js') }}"></script><!-- Price range slider -->
<script src="{{ asset('assets/website/js/swiper-bundle.min.js') }}"></script><!-- Swiper JS -->
<script src="{{ asset('assets/website/js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
<script src="{{ asset('assets/website/js/switcher.js') }}"></script><!-- SHORTCODE FUCTIONS  -->
<!-- Internal Select2.min js -->
<script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@notifyJs
@toastifyJs
@yield('js')
@livewireScripts

<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('0b5767cf97c2b0e3dc9a', {
        cluster: 'eu'
    });
</script>
</body>

</html>
