@extends('layouts.default')

@section('title', $property['streetAddress'] . ' ' . $property['city'] . ' ' . $property['state'] . ' ' . $property['zipcode'])

@section('content')

    <!-- PRELOADER
    ============================================= -->
    <div class="animationload">
        <div class="loader"></div>
    </div>

    <!-- HEADER
    ============================================= -->
    <header id="header">
        @include('includes.header')
    </header>

    <!-- PAGE CONTENT WRAPPER
    ============================================= -->
    <div id="content_wrapper">

        <!-- INTRO
        ============================================= -->
        <section id="intro">
            @include('includes.intro')
        </section>

        <!-- PRICING
        ============================================= -->
        <section id="details">
            @include('includes.details')
        </section>

        <!-- STATISTIC BANNER
        ============================================= -->
        <div id="statistic_banner">
            @include('includes.stats')
        </div>


        <!-- PORTFOLIO
        ============================================= -->
        <section id="images">
            @include('includes.portfolio')
        </section>
        <!-- CLIENTS
        ============================================= -->
        <div id="clients">
            @include('includes.clients')
        </div>

        <!-- BOTTOM PROMO LINE
        ============================================= -->
        <div id="inquire">
            @include('includes.bottomLine')
        </div>

        <!-- FOOTER
        ============================================= -->
        <footer id="footer">
            @include('includes.footer')
        </footer>

    </div>

    <!-- EXTERNAL SCRIPTS
    ============================================= -->
    @include('includes.scripts')

@section('content')
