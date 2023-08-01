<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ListMaduController extends Controller
{
    //
    function index(){
        //
        $pageTitle = 'Daftar madu';
        $products = Product::all();

        return view('listmadu', compact('pageTitle', 'products'));
    }
}
