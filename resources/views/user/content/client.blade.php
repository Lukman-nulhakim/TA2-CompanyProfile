@extends('user.master')
@section('title','CLIENT')
@section('client', 'active')
@section('content')

<main>
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>Clients</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Clients</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Services Area Start -->
    <div class="services-area1 section-padding30">
        <div class="container">
            <!-- section tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-55">
                        <div class="front-text">
                            <h2 class="">Our Clients</h2>
                        </div>
                        <span class="back-text">Services</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($clients as $client)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-service-cap mb-30">
                            <div class="service-img">
                                <img src="{{ Storage::url($client->foto) }}" alt="" style="height: 300px">
                            </div>
                            <div class="service-cap">
                                <h4><a href="#">{{ $client->nama }}</a></h4>
                                <h5>{{ $client->alamat }}</h5>
                                <a href="services_details.html" class="more-btn">Read More <i class="ti-plus"></i></a>
                            </div>
                            <div class="service-icon">
                                <img src="assets/img/icon/services_icon1.png" alt="">
                            </div>
                        </div>
                    </div>
                @empty
                    <h1 class="text-center">Belum ada client</h1>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Services Area End -->
</main>
    
@endsection