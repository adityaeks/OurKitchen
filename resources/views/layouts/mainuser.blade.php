@php
    $currenturl = Request::url();
    $auth_check = auth()->check();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <title>{{ $pageTitle }}</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @vite('resources/sass/app.scss')
    @vite('resources/css/app.css')
</head>

<body>

    <!--navbar  -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><span class="text-warning">Honey Fey</span></a>
            <div class="navbar-nav flex-grow-1 ms-auto">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('products.listmadu') }}">List Madu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="">Pemesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./bantuan">Bantuan</a>
                    </li>
                </ul>
                @auth
                    <li class="nav-item ms-auto">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="nav-link"><i class="bi bi-box-arrow-in-right"></i>
                                <span style="margin-left: 2px;">Log out</button>
                        </form>
                    </li>
                @endauth

                @guest
                <ul class="navbar-nav ms-auto">
                    <li>
                        <a class="nav-link" href="/">Login</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                </ul>
                @endguest
            </div>
        </div>
    </nav>
    <!-- end navbar -->
    @yield('content')
    {{-- footer  --}}
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5  border-top  d-flex justify-content-center">
        <div class="col-6 mt-5 mb-5">
            <h5 class="text-white">Contact Us</h5>
            <ul class="nav flex-column">
                <li class="nav-item "><a href="#" class="nav-link p-0 text-white-50">butuh bantuan? hubungi
                        kami</a>
                </li>
            </ul>
        </div>

        <div class="col-6 mt-5 mb-5">
            <h5 class="text-white">About Us</h5>
            <ul class="nav flex-column">
                <li class="nav-item "><a href="#" class="nav-link p-0 text-white-50">Selengkapnya Tentang Kami</a>
                </li>
            </ul>
        </div>

        <div class="col-6 mt-5 mb-5">
            @if ($currenturl == route('home') && $auth_check)
                <h5 class="text-white">Administrator</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link p-0 text-white-50">Login</a></li>
                </ul>
            @else
                <h5 class="text-white">Home</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link p-0 text-white-50">Menu Utama</a></li>
                </ul>
            @endif
        </div>

    </footer>



    {{-- end footer --}}

    @vite('resources/js/app.js')
</body>

</html>
