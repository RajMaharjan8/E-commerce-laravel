@extends('master')
{{View::make('header')}}
@section('content')    

<div class="container custom-product text-center">
    @foreach ($products as $product)
    <div class="col-md-4 mx-auto mb-4">
        <div class="card shadow" style="width: 18rem;">
            <img src="{{$product['gallery']}}" class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">{{$product['name']}}</h5>
                <p class="card-text">{{$product['description']}}</p>
                <a href="detail/{{$product['id']}}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
