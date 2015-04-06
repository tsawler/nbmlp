<footer id="footer">
    <div class="container">

        <div class="row">
            <div class="col-md-3 col-sm-6 margin30">
                <div class="footer-col">
                    <h3>{!! Lang::get('vcms5::vcms5.about_us') !!}</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.
                    </p>
                    <ul class="list-inline social-1">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div><!--footer col-->
            <div class="col-md-3 col-sm-6 margin30">
                <div class="footer-col">
                    <h3>{!! Lang::get('vcms5::vcms5.contact_us') !!}</h3>

                    <ul class="list-unstyled contact">
                        <li><p><strong><i class="fa fa-fw fa-map-marker"></i> {!! Lang::get('vcms5::vcms5.address') !!}:</strong> Some Street</p></li>
                        <li><p><strong><i class="fa fa-fw fa-envelope"></i> {!! Lang::get('vcms5::vcms5.email') !!}:</strong> <a href="#">info@sample.com</a></p></li>
                        <li> <p><strong><i class="fa fa-fw fa-phone"></i> {!! Lang::get('vcms5::vcms5.phone') !!}:</strong> +1 506 555-1212</p></li>
                        <li> <p><strong><i class="fa fa-fw fa-print"></i> {!! Lang::get('vcms5::vcms5.fax') !!}</strong> 1 800 555 1212</p></li>
                    </ul>
                </div>
            </div><!--footer col-->
            <div class="col-md-3 col-sm-6 margin30">
                <div class="footer-col">

                </div>
            </div><!--footer col-->
            <div class="col-md-3 col-sm-6 margin30">
                <div class="footer-col">
                    <h3>{!! Lang::get('vcms5::vcms5.newsletter') !!}</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam,
                    </p>
                    <form role="form" class="subscribe-form">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter email to subscribe">
                                    <span class="input-group-btn">
                                        <button class="btn  btn-theme-dark btn-lg" type="submit">Ok</button>
                                    </span>
                        </div>
                    </form>
                </div>
            </div><!--footer col-->

        </div>
    </div>
</footer><!--default footer end here-->
<!--scripts and plugins -->
<!--must need plugin jquery-->
<script src="/vendor/vcms5/public-assets/js/jquery.min.js"></script>
<!--bootstrap js plugin-->
<script src="/vendor/vcms5/public-assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--easing plugin for smooth scroll-->
<!--
<script src="/vendor/vcms5/public-assets/js/jquery.easing.1.3.min.js" type="text/javascript"></script>
-->
<!--sticky header-->
<script type="text/javascript" src="/vendor/vcms5/public-assets/js/jquery.sticky.js"></script>
<!--flex slider plugin-->
<script src="/vendor/vcms5/public-assets/js/jquery.flexslider-min.js" type="text/javascript"></script>
<!--parallax background plugin-->
<script src="/vendor/vcms5/public-assets/js/jquery.stellar.min.js" type="text/javascript"></script>
<!--very easy to use portfolio filter plugin -->
<script src="/vendor/vcms5/public-assets/js/jquery.mixitup.min.js" type="text/javascript"></script>
<!-- waypoint -->
<!--
<script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
-->
<!--on scroll animation-->
<script src="/vendor/vcms5/public-assets/js/wow.min.js" type="text/javascript"></script>
<!--owl carousel slider-->
<script src="/vendor/vcms5/public-assets/js/owl.carousel.min.js" type="text/javascript"></script>
<!--popup js-->
<script src="/vendor/vcms5/public-assets/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<!--you tube player-->
<!-- <script src="/vendor/vcms5/public-assets/js/jquery.mb.YTPlayer.min.js" type="text/javascript"></script> -->
<!--text rotator-->
<script src="/vendor/vcms5/public-assets/js/jquery.simple-text-rotator.js" type="text/javascript"></script>
<!--customizable plugin edit according to your needs-->
<script src="/vendor/vcms5/public-assets/js/custom.js" type="text/javascript"></script>

@include("vcms5::public.partials.vcms-js")

<script>
    $(document).ready(function () {
        @if (Session::get('lang') == 'fr')
        bootbox.setDefaults({
            locale: "fr"
        });
        @endif
        @if (Session::get('lang') == 'es')
        bootbox.setDefaults({
            locale: "es"
        });
        @endif
    });
</script>

@yield('bottom-js')
</body>
</html>
