@extends('user.master')
@section('title','HOME')
@section('home', 'active')
@section('content')
    
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