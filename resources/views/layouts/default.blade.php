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
        	@yield('content')
        </div>

        <footer id="footer">
            @include('includes.footer')
        </footer>

        <script src="{{url('js/jquery-2.1.0.min.js')}}" type="text/javascript"></script>
        <script src="{{url('js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{url('js/retina.js')}}" type="text/javascript"></script>
        <script src="{{url('js/modernizr.custom.js')}}" type="text/javascript"></script>
        <script src="{{url('js/jquery.easing.js')}}" type="text/javascript"></script>
        <script src="{{url('js/jquery.parallax-1.1.3.js')}}" type="text/javascript"></script>
        <script src="{{url('js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script defer src="{{url('js/jquery.flexslider.js')}}" type="text/javascript"></script>
        <script src="{{url('js/jquery.accordion.source.js')}}" type="text/javascript"></script>
        <script src="{{url('js/owl.carousel.js')}}" type="text/javascript"></script>
        <script src="{{url('js/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{url('js/animations.js')}}" type="text/javascript"></script>
        <script src="{{url('js/custom.js')}}" type="text/javascript"></script>

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    </body>

</html>
