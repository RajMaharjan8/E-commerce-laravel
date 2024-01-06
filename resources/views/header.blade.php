<?php
use App\Http\Controllers\ProductController;
$total = 0;
if (Session::has('user')) {
    $total = ProductController::cartItem();
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">E-comm</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Orders</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/cartdetail">Cart({{$total}})</a>
                </li>

            </ul>

            <form class="d-flex mx-auto" role="search" action="/search" method="GET">
                <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <ul class="navbar-nav">
                @if(Session::has('user'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Session::get('user')['name']}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                @endif
            </ul>

        </div>
    </div>
</nav>
