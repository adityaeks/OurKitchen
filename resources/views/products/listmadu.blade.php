@extends('layouts.mainuser')
@section('content')
<div class="container mt-4">
    <div class="row">
        @if (!empty($products) && count($products) > 0)
            @foreach ($products as $product)
                <div class="col md-1 mb-4">
                    <div class="card square-card">
                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top square-img" alt="Gambar">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="card-text">Ukuran: {{ $product->size }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
