<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
    public function destroy($id)
    {
        $cartItem = Cart::findOrFail($id);
        // You can add some validation here to ensure that the current user owns this cart item before deleting.

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully.');
    }


    public function checkout($name)
    {
        // Get the current user's name from the route parameter
        $userName = $name;

        // Get the cart items for the current user
        $cartItems = Cart::where('customer_name', $userName)->get();

        // Initialize empty arrays to store products, amounts, and prices
        $products = [];
        $amounts = [];
        $prices = [];

        // Loop through the cart items and extract the data
        foreach ($cartItems as $cartItem) {
            $products[] = $cartItem->product_name;
            $amounts[] = $cartItem->product_amount;
            $prices[] = $cartItem->product_price;
        }

        // Calculate the total price
        $total = $cartItems->sum(function ($cartItem) {
            return $cartItem->product_amount * $cartItem->product_price;
        });

        // Create a new instance of the Transaksi model and assign values
        $transaksi = new Transaksi();
        $transaksi->customer = $userName;
        $transaksi->products = json_encode($products); // Convert arrays to JSON strings
        $transaksi->amounts = json_encode($amounts); // Convert arrays to JSON strings
        $transaksi->prices = json_encode($prices); // Convert arrays to JSON strings
        $transaksi->total = $total;

        // Save the Transaksi instance to the database
        $transaksi->save();

        // Optionally, you can clear the cart after the checkout
        // Add this line if you want to remove all cart items for the current user after checkout
        Cart::where('customer_name', $userName)->delete();

        // Redirect to the cart index route after checkout
        return redirect()->route('cart.index')->with('success', 'Checkout successful.');
    }
}
