@extends('layouts.default')

@section('content')
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
@endsection
