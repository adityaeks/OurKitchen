@extends('layouts.mainuser')
@section('content')
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Maecenas ut nisl mi. Aliquam ex urna, commodo vitae lorem eget,
                    consectetur laoreet metus. Proin magna urna, dignissim quis scelerisque malesuada,
                    vehicula in sapien. Suspendisse eu dictum leo. Cras at iaculis neque, non varius neque.
                    Mauris vitae nibh ex. Ut sed lacinia tellus. Cras eget urna libero.
                    Fusce scelerisque leo eu velit consectetur ornare eget ac urna.
                    Nunc tempor porta lacus, et interdum est auctor in.
                    Nunc venenatis a neque nec tristique. Etiam sit amet sollicitudin ex.
                    Fusce eget imperdiet nunc, in vulputate odio.
                    Morbi malesuada molestie lorem semper accumsan.</p>
                <a href="./detail" class="btn btn-warning mt-3">Selengkapanya</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ Vite::asset('resources/images/bgmadu3.jpg') }}" class="d-block w-100" alt="..." />
            <div
                class="carousel-caption d-none d-md-block d-flex flex-column justify-content-center align-items-center text-center">
                <h5>Honey Fey</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Maecenas ut nisl mi. Aliquam ex urna, commodo vitae lorem eget,
                    consectetur laoreet metus. Proin magna urna, dignissim quis scelerisque malesuada,
                    vehicula in sapien. Suspendisse eu dictum leo. Cras at iaculis neque, non varius neque.
                    Mauris vitae nibh ex. Ut sed lacinia tellus. Cras eget urna libero.
                    Fusce scelerisque leo eu velit consectetur ornare eget ac urna.
                    Nunc tempor porta lacus, et interdum est auctor in.
                    Nunc venenatis a neque nec tristique. Etiam sit amet sollicitudin ex.
                    Fusce eget imperdiet nunc, in vulputate odio.
                    Morbi malesuada molestie lorem semper accumsan.</p>
                <a href="./detail" class="btn btn-warning mt-3">Check More</a>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- end carousel -->


    <!-- about section -->

    <section id="about" class="about-section-padding pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img">
                        <img src="{{ Vite::asset('resources/images/jarmadu4.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="about-text">
                        <h2>Kami Menyediakan Madu Berkualitas Tinggi <br> Untuk Anda </h2>
                        <p>
                            Honey Fey adalah destinasi online terbaik bagi para pencinta madu yang mencari
                            kualitas terbaik dan rasa yang otentik. Website ini didedikasikan untuk memperkenalkan
                            keajaiban madu alami dan menghadirkan berbagai pilihan madu berkualitas tinggi dari seluruh
                            penjuru dunia.
                            Nikmati kekayaan manfaat alami dari setiap tetes madu yang kami tawarkan.</p>
                        <a href="#" class="btn btn-warning">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <!-- 4 foto makanan -->
    <div class="container pt-5">
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="image-wrapper">
                    <p class="centered-text">MADU HUTAN</p>
                    <img src="{{ Vite::asset('resources/images/jarmd4.png') }}" class="img-fluid" alt="Foto 1">
                    <div class="image-caption">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="image-wrapper">
                    <p class="centered-text">MADU MIX BEE POLEN</p>
                    <img src="{{ Vite::asset('resources/images/jarmd4.png') }}" class="img-fluid" alt="Foto 1">
                    <div class="image-caption">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="image-wrapper">
                    <p class="centered-text">MADU MULTIFLORA</p>
                    <div style="display: flex; justify-content: center;">
                        <img src="{{ Vite::asset('resources/images/jarmd4.png') }}" class="img-fluid" alt="Foto 1">
                    </div>
                    <div class="image-caption">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="image-wrapper">
                    <p class="centered-text">MADU SARANG</p>
                    <div style="display: flex; justify-content: center;">
                        <img src="{{ Vite::asset('resources/images/jarmd4.png') }}" class="img-fluid" alt="Foto 1">
                    </div>
                    <div class="image-caption">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 4 foto makanan -->
@endsection
