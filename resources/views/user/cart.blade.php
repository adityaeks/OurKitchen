@extends('layouts.mainuser')
@section('content')
    <div class="container mt-4">
        <h1>Your Cart</h1>
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach ($cartItems as $cartItem)
                    @if ($cartItem->customer_name === Auth::user()->name)
                        <tr>
                            <td>{{ $cartItem->product_name }}</td>
                            <td>{{ $cartItem->product_amount }}</td>
                            <td>Rp {{ number_format($cartItem->product_price, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($cartItem->product_amount * $cartItem->product_price, 0, ',', '.') }}
                            </td>
                            <td>
                                <form action="{{ route('cart.destroy', $cartItem->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="3"><strong>Total:</strong></td>
                    <td colspan="2"><strong>Rp {{ number_format($totalPrice, 0, ',', '.') }}</strong></td>
                </tr>
                <tr>
                    <td colspan="5">
                        <a href="{{ route('checkout', ['name' => Auth::user()->name]) }}"
                            class="btn btn-primary">Checkout</a>
                    </td>
                </tr>

            </table>
        </div>
    </div>
@endsection
