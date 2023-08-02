<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
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
                            <a class="nav-link" aria-current="page" href="#">List Madu</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('employees.create') }}">Pemesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./detail">Tentang Kami</a>
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

    <div class="container mt-4">
        <div class="row mb-0">
            
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3 text-white">Riwayat Pemesanan</h4>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                <thead>
                    <tr>
                        <th>nama pertama</th>
                        <th>nama terkahir</th>
                        <th>Email</th>
                        <th>no.telp</th>
                        <th>atm</th>
                        <th>alamat</th>
                        <th>detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->namapertama }}</td>
                            <td>{{ $detail->namaterakhir }}</td>
                            <td>{{ $detail->Email }}</td>
                            <td>{{ $detail->notelp }}</td>
                            <td>{{ $detail->atm }}</td>
                            <td>{{ $detail->alamat }}</td>
                            <td>{{ $detail->detail }}</td>
                            <td>
                                <div class="d-flex">
                                    {{-- <a href="{{ route('employees.show', ['detail' => $detail->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a> --}}
                                    <a  href="{{ route('employees.edit', ['employee' => $detail->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

                                    <div>
                                    <form action="{{ route('employees.destroy', ['employee' => $detail->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
