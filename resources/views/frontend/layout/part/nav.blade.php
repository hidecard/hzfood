<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
<section class="container-fluid py-2 bg-danger d-flex justify-content-evenly align-items-center">
    <a class="navbar-brand text-light fw-bold" href="#">Hz Food</a>
            <form class="d-flex" action="{{ route('search') }}" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query" value="{{ request('query') }}">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
    <div class="icon d-flex text-light">
        <a class="text-light position-relative" href="{{ route('cart') }}">
            <i class="fa-solid fa-cart-shopping mt-3 mx-3">
                @if (session('cart_count') > 0)
                <span class="badge bg-light text-danger mt-3 mx-3 position-absolute top-0 start-75 translate-middle">{{ session('cart_count') }}</span>
                @endif
            </i>
        </a>
        @if (isset($user) && $user)
            <div class="d-flex mx-3 align-items-center">
                <span class="text-light me-3">{{ $userName }}</span>
                <a class="btn btn-outline-light" href="{{ route('logout') }}">Logout</a>
            </div>
        @else
            <a class="text-light" href="{{ route('user_register_form') }}"><i class="fa-solid fa-user mt-3 mx-3"></i></a>
        @endif
    </div>
</section>
<section class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav w-100 d-flex justify-content-center">
                    <li class="nav-item mx-2">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item mx-2 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item" href="{{ route('category.items', ['id' => $category->id]) }}">{{ $category->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('about') }}">Service</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('contact.submit') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
