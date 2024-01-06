@extends('master')
@section('content')    

{{-- <div class="container custom-login">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div> --}}

<div class="container-fluid login-container">
    
    <div class="card login-card">
        <div class="center-text">Login</div>

        <div class="card-body">
            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name='email' value="email" class="form-control" id="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" value="password"  id="password" required>
                </div>

               <br>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            <div class="mt-3 text-center">
                Don't have an account? <a href="/register">Register here</a>.
            </div>
        </div>
    </div>
</div>

@endsection

