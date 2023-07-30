@extends('layouts.mainuser')
@section('content')
    <div class="container mt-4">
        <h1>Your Cart</h1>
        <div class="col-md-10">
            <table class="border">
                <tr>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
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
                                    <button type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="3"><strong>Total:</strong></td>
                    <td colspan="2"><strong>Rp {{ number_format($totalPrice, 0, ',', '.') }}</strong></td>

                </tr>


            </table>
        </div>


    </div>
@endsection
