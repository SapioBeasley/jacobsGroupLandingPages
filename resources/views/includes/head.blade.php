<!-- Basic -->
<meta charset="utf-8">
<!--Change here-->
<title>{{$program['titleStrong']}} {{$program['title']}} | Jacobs Group Vegas</title>
<meta name="author" content="Andreas Beasley">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Libs CSS -->
<link href="{{url('css/bootstrap.css')}}" rel="stylesheet">
<link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{url('css/flexslider.css')}}" rel="stylesheet">
<link href="{{url('css/owl.carousel.css')}}" rel="stylesheet">

<!-- On Scroll Animations -->
<link href="{{url('css/animate.css')}}" rel="stylesheet">

<!-- Template CSS -->
<link href="{{url('css/style.css')}}" rel="stylesheet">

<!-- Responsive CSS -->
<link href="{{url('css/responsive.css')}}" rel="stylesheet">

<!-- Favicons -->
<link rel="shortcut icon" href="{{url('img/icons/favicon.ico')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{url('img/icons/apple-touch-icon-114x114.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{url('img/icons/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" href="{{url('img/icons/apple-touch-icon.png')}}">

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato:400,900italic,900,700italic,400italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '1988087694750080');
fbq('track', "PageView");
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1988087694750080&ev=PageView&noscript=1"/></noscript>
<!-- End Facebook Pixel Code -->

<style type="text/css">
	#intro {
		background-image: url({{asset($program['image'][0]['images_url'])}});
	}
</style>
