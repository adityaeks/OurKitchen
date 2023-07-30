<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
    @vite('resources/css/app.css')
</head>

<body
    style="
    background-image: url('{{ Vite::asset('resources/images/bgmadu2.jpg') }}');
    background-size: cover;
    background-position: center;">
    <!--navbar  -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand"><span class="text-warning">Honey Fey</span></a>
            <div class="navbar-nav flex-grow-1 ms-auto">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Etalase</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Riwayat Pemesanan</a>
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
            </div>
        </div>
    </nav>
    @yield('content')
</body>
