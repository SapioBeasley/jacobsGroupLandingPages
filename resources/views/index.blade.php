<!DOCTYPE html>
<!-- Jacobs Group Vegas -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->

    <head>
        @include('includes.head')
    </head>

    <body>

        <header id="header">
            @include('includes.header')
        </header>

        <div id="content-wrapper">

        <section id="intro" class="intro-parallax">
            <div class="container">
                <div class="row">

                    <!-- Intro Section Description -->
                    <div id="intro_description" class="col-sm-7 col-md-7">
                        @include('includes.details')
                    </div>

                    <!-- Intro Section Form -->
                    <div id="intro_form" class="col-sm-5 col-md-5">

                        <!--Register form -->
                        <div class="form_register">
                            @include('includes.contactForm')
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <section id="about-2">
            <div class="container">

                <div class="row">
                    @include('includes.about')
                </div>

            </div>
        </section>

        <section id="call-to-action" class="parallax">
            <div class="container">
                <div class="row">

                    <!-- Call To Action Content -->
                    <div class="col-sm-12 text-center">
                        <!--Change here-->
                        <p> <img src="img/Simply-logo-White-ping-300x108.png" width="270"> </p>
                    </div>

                </div>
            </div>
        </section>

        <footer id="footer">
            @include('includes.footer')
        </footer>

        <script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/retina.js" type="text/javascript"></script>
        <script src="js/modernizr.custom.js" type="text/javascript"></script>
        <script src="js/jquery.easing.js" type="text/javascript"></script>
        <script src="js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
        <script src="js/jquery.validate.min.js" type="text/javascript"></script>
        <script defer src="js/jquery.flexslider.js" type="text/javascript"></script>
        <script src="js/jquery.accordion.source.js" type="text/javascript"></script>
        <script src="js/owl.carousel.js" type="text/javascript"></script>
        <script src="js/waypoints.min.js" type="text/javascript"></script>
        <script src="js/animations.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    </body>

</html>
