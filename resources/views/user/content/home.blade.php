@extends('user.master')
@section('title','HOME')
@section('home', 'active')
@section('content')
    
<div class="slider-area ">
    <div class="slider-active">
        <div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="{{ Storage::url($home[0]['img_title']) }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInUp" data-delay=".5s">advanced</h1>
                            <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                @for ($i = 1; $i <= 2; $i++)
                                <h2>{{ $home[0]['title'] }}</h2>
                                @endfor
                            </div>
                            <div class="hero-text2 mt-110" data-animation="fadeInUp" data-delay=".9s">
                               <span><a href="services.html">Our Services</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="hero__caption">
                            <div class="hero-text1">
                                <span data-animation="fadeInUp" data-delay=".3s">hand car wash and detailing service</span>
                            </div>
                            <h1 data-animation="fadeInUp" data-delay=".5s">advanced</h1>
                            <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                <h2>Construction</h2>
                                <h2>Construction</h2>
                            </div>
                            <div class="hero-text2 mt-110" data-animation="fadeInUp" data-delay=".9s">
                                <span><a href="services.html">Our Services</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="services-area1 section-padding30">
    <div class="container">
        <!-- section tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle mb-55">
                    <div class="front-text">
                        <h2 class="mt-5">Our Client</h2>
                    </div>
                    <span class="back-text">Client</span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($client as $item)
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-service-cap mb-30">
                    <div class="service-img">
                        <img src="{{ Storage::url($item->foto) }}" alt="">
                    </div>
                    <div class="service-cap">
                        <h4>{{ $item->nama }}</h4>
                        <a href="services_details.html" class="more-btn">{{ $item->alamat }} <i class="ti-plus"></i></a>
                    </div>
                    <div class="service-icon">
                        <img src="assets/img/icon/services_icon1.png" alt="">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection