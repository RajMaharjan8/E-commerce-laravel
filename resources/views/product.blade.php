@extends('master')
{{View::make('header')}}
@section('content')    

<div class="container custom-product">
    <!-- Carousel -->
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($products as $key => $product)
                <div class="carousel-item {{$key === 0 ? 'active' : ''}}">
                    <img src="{{$product['gallery']}}" class="d-block w-100" alt="Product Image" style="height: 400px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.7); color: white;">
                        <h5>{{$product['name']}}</h5>
                        <p>{{$product['description']}}</p>
                        <a href="detail/{{$product['id']}}" class="btn btn-primary">View</a>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Product Cards -->
    <div class="row mt-4 justify-content-center">
        @foreach ($products as $product)
            <div class="card mx-auto" style="width: 18rem;">
                <img src="{{$product['gallery']}}" class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{$product['name']}}</h5>
                    <p class="card-text">{{$product['description']}}</p>
                    <a href="detail/{{$product['id']}}" class="btn btn-primary">View</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
