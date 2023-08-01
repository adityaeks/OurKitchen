@extends('layouts.mainadmin')
@section('content')
<body>

    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-grid gap-2">
                    <a href="{{ route('etalase.create') }}" class="btn btn-primary">Create Product</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Ukuran</th>
                        <th>Harga</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($products) && count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <td><img class="image" src="{{ asset('images/' . $product->image) }}" alt="tes">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->size }} ml</td>
                                <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex">
                                        {{-- <a href="#" class="btn btn-outline-dark btn-sm me-2"><i
                                            class="bi-person-lines-fill"></i></a> --}}
                                        <a href="{{ route('etalase.edit', $product->id) }}"
                                            class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>
                                        <div>
                                            <form action="{{ route('etalase.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-dark btn-sm me-2" data-name="{{ $product->name.' '.$product->price }}"><i
                                                        class="bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>


@endsection
