<!-- resources/views/cart/index.blade.php -->

@extends('master')
{{View::make('header')}}
@section('content')
<div class="container mt-4">
    <h2>Your Cart</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td><img src="{{ $item->gallery }}" alt="" class="product-image"></td>
                <td>${{ $item->price }}</td>
                <td><a href="/removecart/{{$item->cart_id}}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
