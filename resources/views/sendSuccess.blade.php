@extends('layouts.default')

@section('content')
<div style="width:470px;margin:110px auto 30px auto;">
	<div id="quote_holder">
		<div class="flexslider">
			<ul class="slides">
				<!--Testimonial #1 -->
				<li>
					<div class="testimonials">
						<blockquote class="quote-text" style="text-align:center;">
							Thank you for your inquiry, someone from our team will be in touch shortly.<br /><br /> In the mean time you may also give us a call. (702)442-0055
						</blockquote>
					</div>
				</li>
			</ul>
		</div>   <!-- End Rotator Content -->
	</div>  <!-- End Quote -->
</div>

	<style type="text/css">

#statistic_banner {
    background-image: url({{url('img/statistic.jpg')}});
    background-attachment: fixed !important;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    padding-top: 100px;
    padding-bottom: 100px;
}

.statistic-number {
    color: #fff;
    font-size: 75px;
    line-height: 75px;
    font-weight: 900;
    letter-spacing: 1px;
    margin-bottom: 10px;
}

.statistic-text {
    color: #fff;
    margin-bottom: 10px;
}

.statistic-text {
    font-size: 15px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 20px;
}




#inquire {
    background-attachment: fixed !important;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    padding-top: 100px;
    padding-bottom: 100px;
}

#inquire h2 {
    color: #212121;
    font-size: 30px;
    line-height: 36px;
    font-weight: 900;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 0;
}

#inquire p {
    color: #212121;
    font-size: 25px;
    font-weight: 300;
    line-height: 36px;
}
	</style>

<div id="statistic_banner">
	@include('includes.stats')
</div>

{{-- <div id="inquire">
	<div class="container">
		<div class="row">

			<!-- BOTTOM PROMO LINE CONTENT -->
			<div class="col-md-12 text-center">

				<h2>Feel free to contact us anytime...</h2>
				<p>(702)442-0055</p>

			</div>

		</div>    <!-- End row -->
	</div>
</div> --}}
@endsection
