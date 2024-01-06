@extends('master')
{{View::make('header')}}
@section('content')    

<div class="container custom-product mt-5"> <!-- Increase the top margin -->
    <div class="alert alert-success" role="alert" id="success-alert">
        {{$message}}
    </div>
      
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{$details['gallery']}}" alt="{{$details['name']}}">
        </div>
        <div class="col-md-6">
            <a href="/" class="btn btn-outline-secondary mb-3">Go back</a>
            <h2>{{ $details['name'] }}</h2>
            <p class="text-muted">Category: {{ $details['category'] }}</p>
            <p>{{ $details['description'] }}</p>
            <h3 class="text-primary mt-3">${{ $details['price'] }}</h3>

            <form action="/add-to-cart" method="POST" class="mt-3">
                @csrf
                <input type="hidden" name="product_id" value="{{ $details['id'] }}">
                <button class="btn btn-success">Add to Cart</button>
            </form>

            <form action="#" method="POST" class="mt-2">
                @csrf
                <input type="hidden" name="product_id" value="{{ $details['id'] }}">
                <button class="btn btn-primary">Buy Now</button>
            </form>
            <br><br>
        </div>
    </div>
     <!-- Comment Section -->
     <div class="mt-5">
        <h4>Comments</h4>
        <!-- Dummy comments -->
        @foreach ($comments as $data)
        <div class="mb-3">
            <strong>{{$data->user_name}}:</strong> {{$data->comment}}
        </div>
        @endforeach
       
        <!-- Add more dummy comments as needed -->

        <!-- Comment input field -->
        <form action="/comment" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="commentInput" class="form-label">Add a Comment</label>
                <input type="text" class="form-control" name="comment_data" id="commentInput">           
            </div>
            <div>
                <input type="hidden" name="product_id" value="{{ $details['id'] }}"> 
            </div>
                      
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </form>
        
        <br> <br>
    </div>
</div>
</div>

{{-- Adjust the margin-top of the footer --}}
<style>
    .custom-product .row {
        margin-bottom: 0; /* Remove bottom margin from the row */
    }

    .custom-product .alert {
        margin-bottom: 0; /* Remove bottom margin from the alert */
    }
</style>
@endsection
