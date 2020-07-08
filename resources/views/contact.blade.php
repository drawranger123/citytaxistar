<!DOCTYPE html>
<html lang="en">
<?php $root = "http://".$_SERVER['HTTP_HOST']."/" ;?>

<!-- Mirrored from ashik.templatepath.net/conexi-preview-files/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2020 13:39:41 GMT -->
@include("head")

<body>
    <div class="preloader"></div><!-- /.preloader -->
    <div class="page-wrapper">
        <header class="site-header header-one">
            <div class="top-bar">
                <div class="container">
                    <div class="left-block">
                        <a href="#"><i class="fa fa-user-circle"></i> Customer Sign In</a>
                        <a href="#"><i class="fa fa-envelope"></i> needhelp@conexi.com</a>
                    </div><!-- /.left-block -->
                    <div class="logo-block">
                        <a href="index-2.html"><img src="images/resources/logo-1-1.png" alt="Awesome Image" /></a>
                    </div><!-- /.logo-block -->
                    <div class="social-block">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </div><!-- /.social-block -->
                </div><!-- /.container -->
            </div><!-- /.top-bar -->
            @include("menu")
        </header><!-- /.site-header header-one -->
        <section class="inner-banner">
            <div class="container">
                <ul class="thm-breadcrumb">
                    <li><a href="index-2.html">Home</a></li>
                    <li><span class="sep">.</span></li>
                    <li><span class="page-title">Contact</span></li>
                </ul><!-- /.thm-breadcrumb -->
                <h2>Contact</h2>
            </div><!-- /.container -->
        </section><!-- /.inner-banner -->
        <div class="contact-page-map-wrapper">
            <div class="google-map" id="contact-google-map" data-map-lat="40.712784" data-map-lng="-74.005941" data-icon-path="images/resources/map-pin-1-1.png" data-map-title="Brooklyn, New York, United Kingdom" data-map-zoom="11" data-markers='{
                        "marker-1": [40.712784, -74.005941, "<h4>Main Office</h4><p>Babylon Branch , Lindenhurst, UK</p>"],
                        "marker-2": [40.728157, -74.077642, "<h4>Branch Office</h4> <p>291 Park Ave S, East Meadow, UK</p>"]
                    }'>
            </div>
           
        </div><!-- /.contact-page-map-wrapper -->
        <section class="contact-form-style-one">
            <div class="container">
                <div class="block-title text-center">
                    <div class="dot-line"></div><!-- /.dot-line -->
                    <p>Contact with us now</p>
                    <h2>Leave a message</h2>
                </div><!-- /.block-title -->
                <form action="http://ashik.templatepath.net/conexi-preview-files/inc/sendmail.php" class="contact-form-one row" id="contact-form" method="post">
                    <div class="col-lg-6">
                        <div class="input-holder">
                            <input class="form-control" type="text" name="form_name" placeholder="Your name">
                        </div><!-- /.input-holder -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="input-holder">
                            <input class="form-control" type="email" name="form_email" placeholder="Email address">
                        </div><!-- /.input-holder -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="input-holder">
                            <input class="form-control" type="text" name="form_phone" placeholder="Phone">
                        </div><!-- /.input-holder -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="input-holder">
                            <input class="form-control" type="text" name="form_subject" placeholder="Subject">
                        </div><!-- /.input-holder -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-12">
                        <div class="input-holder">
                            <textarea class="form-control" name="form_message" placeholder="Write message"></textarea>
                        </div><!-- /.input-holder -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-12">
                        <div class="input-holder text-center">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                            <button class="theme-btn btn-style-two" type="submit" data-loading-text="Please wait..."><span>Send Message</span></button>
                        </div><!-- /.input-holder -->
                    </div><!-- /.col-lg-6 -->
                </form><!-- /.contact-form-one -->
            </div><!-- /.container -->
        </section><!-- /.contact-form-style-one -->
        @include("foot")
    </div><!-- /.page-wrapper -->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- /.scroll-to-top -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCg7rxUIGxde-vlu4I8AWgNB89y8vny014"></script>
    <script src="js/gmaps.js"></script>
    <script src="js/map-helper.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/theme.js"></script>
</body>


<!-- Mirrored from ashik.templatepath.net/conexi-preview-files/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2020 13:39:42 GMT -->
</html>