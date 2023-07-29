<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
    @vite('resources/sass/app.scss')
</head>
<body style="
    background-image: url('{{ Vite::asset('resources/images/bgmadu4.jpg') }}');
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

    {{-- create --}}
    <div class="container-sm mt-5 mb-5" >
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                               {{ $error }}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif

                    <hr>
                    <div class="row">
                        <div class="mb-3">
                            <label for="namapertama" class="form-label">Nama Pertama</label>
                            <input class="form-control" type="text" name="namapertama" id="namapertama" value="" placeholder="Masukkan Nama Pertama">
                        </div>
                        <div class="mb-3">
                            <label for="namaterakhir" class="form-label">Nama Terakhir</label>
                            <input class="form-control" type="text" name="namaterakhir" id="namaterakhir" value="" placeholder="Masukkan Nama Terakhir">
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input class="form-control" type="text" name="Email" id="Email" value="" placeholder="Masukkan Email">
                        </div>
                        <div class="mb-3">
                            <label for="notelp" class="form-label">No.Telp</label>
                            <input class="form-control" type="text" name="notelp" id="notelp" value="" placeholder="Masukkan No.Telp">
                        </div>
                        <div class="mb-3">
                            <label for="atm" class="form-label">No.Rekening</label>
                            <input class="form-control" type="text" name="atm" id="atm" value="" placeholder="Masukkan No.Rekening">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input class="form-control" type="text" name="alamat" id="alamat" value="" placeholder="Masukkan Alamat">
                        </div>
                          <div class="mb-3">
                            <label for="detail" class="form-label">Detail Pesanan</label>
                            <textarea class="form-control" name="detail" id="detail" rows="5" placeholder="Masukkan Detail Pesanan">{{ old('detail') }}</textarea>
                            @error('detail')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('home') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-warning btn-lg mt-3"><i class="bi-check-circle me-2"></i> Order </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>



    {{-- end create --}}

     @vite('resources/js/app.js')
</body>
</html>
