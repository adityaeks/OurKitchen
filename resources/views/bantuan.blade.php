<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- bootstrap icon --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


        <title>bantuan</title>
        <link rel="stylesheet" href="{{ asset('style.css') }}">
        @vite('resources/sass/app.scss')
    </head>

    <body style="
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
                            <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">List Madu</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('employees.create') }}">Pemesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./detail">Tentang Kami</a>
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
        <!-- end navbar -->

            <!-- about section -->

            <section id="about" class="about-section-padding pt-4">
                <div class="container" bg="bgmadu4.jpg">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5 bg-success border borde-warning rounded-3">
                            <div class="about-text">
                                <h2 class="text-white">Jika Anda Butuh Bantuan<br> Silahkan Hubungi Kami </h2>
                                <br>
                                <p class="text-white">
                                    Alamat Email: HoneyFey@gmail.com
                                    <br>
                                    No. Telpon  : 08570111444
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br> 
            {{-- footer  --}}


            <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5  border-top  d-flex justify-content-center">
                <div class="col-6 mt-5 mb-5">
                    <h5 class="text-white">Contact Us</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item "><a href="./bantuan" class="nav-link p-0 text-white-50">butuh bantuan? hubungi kami</a>
                    </li> 
                    </ul>
                </div>

                <div class="col-6 mt-5 mb-5">
                    <h5 class="text-white">About Us</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item "><a href="./detail" class="nav-link p-0 text-white-50">Selengkapnya Tentang Kami</a></li>
                    </ul>
                </div>

                <div class="col-6 mt-5 mb-5">
                    <h5 class="text-white">Administrator</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item "><a href="/" class="nav-link p-0 text-white-50">Log In</a></li>
                    </ul>
                </div>
            </footer>



            {{-- end footer --}}

            @vite('resources/js/app.js')
    </body>

    </html>