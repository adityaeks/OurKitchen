<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    //
    public function aboutus()
    {
        $pageTitle = 'Tentang Kami';

        return view('aboutus', ['pageTitle' => $pageTitle]);
    }

    public function bantuan()
    {
        $pageTitle = 'Bantuan';

        return view('bantuan', ['pageTitle' => $pageTitle]);
    }
}
