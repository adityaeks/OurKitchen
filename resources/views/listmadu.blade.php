@extends('layouts.mainuser')
@section('content')
    <div class="container mt-4">
        <div class="row">
            @if (!empty($products) && count($products) > 0)
                @foreach ($products as $product)
                    <div class="col md-1 mb-4">
                        <div class="card square-card">
                            <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top square-img" alt="Gambar">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                <p class="card-text">Ukuran: {{ $product->size }} ml</p>
                                @auth
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                                    <input type="hidden" name="customer_name" value="{{ Auth::user()->name }}">
                                    <button type="submit">Add to Cart</button>
                                </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
