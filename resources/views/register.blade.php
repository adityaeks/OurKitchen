<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honey Fey</title>

    <link rel="stylesheet" href="/css/style.css">
    @vite('resources/sass/app.scss')
</head>
<body style="
    background-image: url('{{ Vite::asset('resources/images/bgmadu4.jpg') }}');
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
        <div class="col-lg-5">
              <main class="form-registration">
                <form action="/register" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-5">Daftar</h1>
                    <div class="form-floating">
                    <input type="text" class="form-control rounded-top-5 @error('name') is-invalid @enderror" id="name" placeholder="name" name="name" value="{{ old('name') }}" required>
                    <label for="name">Nama</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

                    {{-- <div class="form-floating">
                    <input type="text" class="form-control" id="username" placeholder="username" name="username">
                    <label for="username">Username</label>
                    </div> --}}
                    <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" required>
                    <label for="email">Alamat Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom-5 @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" value="{{ old('password') }}" required>
                    <label for="password">Password</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

                    <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label text-white" for="flexCheckDefault">
                        Remember me
                    </label>
                    </div>
                    <button class="btn btn-warning text-primary-emphasis w-100 py-2 mt-3" type="submit">Daftar</button>
                </form>
                <small class="d-block text-center mt-3 text-white">Already Registered? <a href="/">Login!</a></small>
            </main>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
