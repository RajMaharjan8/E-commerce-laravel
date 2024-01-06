<!-- resources/views/auth/register.blade.php -->

@extends('master')

@section('content')
<div class="container-fluid login-container">
    
    <div class="card login-card">
        <div class="center-text">Register</div>

        <div class="card-body">
            <form action="/register" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" name='name' class="form-control" id="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name='email' class="form-control" id="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                </div>
                <br>

                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
            <div class="mt-3 text-center">
                Already have an account? <a href="/login">Login</a>.
            </div>
        </div>
    </div>
</div>
@endsection
