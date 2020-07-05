@extends('user.master')
@section('title','PRODUCT')
@section('product', 'active')
@section('content')

<!-- slider Area Start-->
<div class="slider-area ">
    <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="{{ asset('assets/img/hero/about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap pt-100">
                        <h2>Product</h2>
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('product') }}">Product</a></li> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <!-- Nav Card -->
            <div class="tab-content active" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                    <div class="project-caption">
                        <div class="row">
                            @forelse ($product as $item)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-project mb-30">
                                    <div class="project-img">
                                        <img src="{{ Storage::url($item->image) }}" alt="">
                                    </div>
                                    <div class="project-cap">
                                        <h4 class="my-3">{{ $item->nama }}</h4>
                                        <p>{{ $item->description }}</p>
                                        <h4>{{ $item->detail_product->detail_id }}</h4>
                                    </div>
                                </div>
                            </div>
                            
                            @empty
                                <h1>Belum ada prouduct</h1>
                            @endforelse
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

