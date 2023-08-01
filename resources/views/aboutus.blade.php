    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- bootstrap icon --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


        <title>Detail</title>
        <link rel="stylesheet" href="{{ asset('style.css') }}">
        @vite('resources/sass/app.scss')
    </head>

    <body>

        <!--navbar  -->

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand"><span class="text-warning">Honey Fey</span></a>
                <div class="navbar-nav flex-grow-1 ms-auto">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">List Madu</a>
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
                </div>
            </div>
        </nav>
        <!-- end navbar -->

        <!-- carousel -->
        <div id="carouselExampleCaptions" class="carousel slide">
            {{-- <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div> --}}
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ Vite::asset('resources/images/bgmadu1.jpg') }}" class="d-block w-100" alt="..." />
                    <div
                        class="carousel-caption d-none d-md-block d-flex flex-column justify-content-center align-items-center text-center">
                        <h5>Honey Fey</h5>
                        <p>Honey Fey adalah destinasi online terbaik bagi para pencinta madu yang mencari
                                kualitas terbaik dan rasa yang otentik. Website ini didedikasikan untuk memperkenalkan
                                keajaiban madu alami dan menghadirkan berbagai pilihan madu berkualitas tinggi dari seluruh penjuru dunia.
                                Nikmati kekayaan manfaat alami dari setiap tetes madu yang kami tawarkan.
                                <br>
                                <br>
                                Honey Fey adalah perusahaan madu yang beralamat di Surabaya tepatnya di Ketintang PTT. 4 No 5 RT59 RW11 Gang. 2, Wonokromo, Surabaya 55163, Indonesia
                            </p>
                    </div>
                </div>
            </div>
            {{-- footer  --}}
            <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5  border-top  d-flex justify-content-center">
                <div class="col-6 mt-5 mb-5">
                    <h5 class="text-white">Contact Us</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item "><a href="#" class="nav-link p-0 text-white-50">butuh bantuan? hubungi kami</a>
                    </li>
                    </ul>
                </div>

                <div class="col-6 mt-5 mb-5">
                    <h5 class="text-white">About Us</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item "><a href="#" class="nav-link p-0 text-white-50">Selengkapnya Tentang Kami</a></li>
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
