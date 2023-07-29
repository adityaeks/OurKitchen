<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honey Fey</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @vite('resources/sass/app.scss')
</head>
<body style="
    background-image: url('{{ Vite::asset('resources/images/bgmadu2.jpg') }}');
    background-size: cover;
    background-position: center;">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}"><span class="text-warning">Honey Fey</span></a>
                <div class="navbar-nav flex-grow-1 ms-auto">
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
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


              <main class="form-signin w-100 m-auto">
                <form action="/" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-3">Masuk</h1>
                    <div class="form-floating">
                        <input type="email" class="form-control" @error('email') is-invalid @enderror name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>

                    <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label text-white" for="flexCheckDefault">
                        Remember me
                    </label>
                    </div>
                    <button class="btn btn-warning text-primary-emphasis w-100 py-2" type="submit">Masuk</button>
                </form>
                <small class="d-block text-center mt-3 text-white">Belum terdaftar? <a href="/register">Daftar Sekarang!</a></small>
            </main>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
