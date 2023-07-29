<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    @vite('resources/sass/app.scss')
</head>
<body style="
    background-image: url('{{ Vite::asset('resources/images/bgCafe1.png') }}');
    background-size: cover;
    background-position: center;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"><span class="text-warning">OURKITCHEN</span></a>
            <div class="navbar-nav flex-grow-1 ms-auto">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('employees.create') }}">Kritik & Saran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employees.index') }}">Admin</a>
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
    <!-- End navbar -->

    <div class="container mt-4 ">
        <h4 class="mb-3 text-white mx-auto text-center">Edit Kritik & Saran</h4>
        <hr>
        <div class="p-5 bg-light rounded-3 border col-lg-6 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('employees.update', $detail->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="namapertama" class="form-label">Nama Pertama<</label>
                    <input class="form-control" type="text" name="namapertama" id="namapertama" value="{{ $detail->namapertama }}" placeholder="Masukkan Nama Pertama">
                </div>

                <div class="mb-3">
                    <label for="namaterakhir" class="form-label">Nama Terakhir</label>
                    <input class="form-control" type="text" name="namaterakhir" id="namaterakhir" value="{{ $detail->namaterakhir }}" placeholder="Masukkan Nama Terakhir">
                </div>

                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input class="form-control" type="text" name="Email" id="Email" value="{{ $detail->Email }}" placeholder="Masukkan Email">
                </div>

                <div class="mb-3">
                    <label for="notelp" class="form-label">No.Telp</label>
                    <input class="form-control" type="text" name="notelp" id="notelp" value="{{ $detail->notelp }}" placeholder="Masukkan No.Telp">
                </div>

                <div class="mb-3">
                    <label for="atm" class="form-label">No.Rekening</label>
                    <input class="form-control" type="text" name="atm" id="atm" value="{{ $detail->atm }}" placeholder="Masukkan No.Rekening">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input class="form-control" type="text" name="alamat" id="alamat" value="{{ $detail->alamat }}" placeholder="Masukkan Alamat">
                </div>

                <div class="mb-3">
                    <label for="detail" class="form-label">Detail Pesanan</label>
                    <textarea class="form-control" name="detail" id="detail" rows="5" placeholder="Masukkan Detail Pesanan">{{ $detail->detail }}</textarea>
                </div>

                <button type="submit" class="btn btn-dark">Save</button>
                <a href="{{ route('employees.index') }}" class="btn btn-outline-dark">Cancel</a>
            </form>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
