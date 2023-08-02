@extends('layouts.mainuser')
@section('content')
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
                        keajaiban madu alami dan menghadirkan berbagai pilihan madu berkualitas tinggi dari seluruh penjuru
                        dunia.
                        Nikmati kekayaan manfaat alami dari setiap tetes madu yang kami tawarkan.
                        <br>
                        <br>
                        Honey Fey adalah perusahaan madu yang beralamat di Surabaya tepatnya di Ketintang PTT. 4 No 5 RT59
                        RW11 Gang. 2, Wonokromo, Surabaya 55163, Indonesia
                    </p>
                </div>
            </div>
        </div>
    @endsection
