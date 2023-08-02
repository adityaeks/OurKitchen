<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $pageTitle = 'Home';

        return view('home', ['pageTitle' => $pageTitle]);
    }

    function welcome(){
        $pageTitle = 'Home';

        return view('home', ['pageTitle' => $pageTitle]);
    }

}
