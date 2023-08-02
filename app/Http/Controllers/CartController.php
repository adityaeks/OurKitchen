<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Keranjang';
        $currentUser = Auth::user()->name;

        // Get the cart items for the current user
        $cartItems = Cart::where('customer_name', $currentUser)->get();

        // Calculate the total price of all items in the cart
        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product_amount * $cartItem->product_price;
        });

        return view('user.cart', compact('cartItems', 'totalPrice', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'customer_name' => 'required',
            'product_id' => 'required',
            'product_name' => 'required', // Ensure product_name is required in the validation
            'product_price' => 'required',
        ]);

        $existingCartItem = Cart::where('customer_name', Auth::user()->name)
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->increment('product_amount');
        } else {
            $cart = new Cart;
            $cart->customer_name = Auth::user()->name;
            $cart->product_id = $request->product_id;
            $cart->product_name = $request->product_name;
            $cart->product_amount = 1;
            $cart->product_price = $request->product_price;
            $cart->save();
        }


        return redirect()->route('listmadu');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkout()
    {
        //
    }
}
