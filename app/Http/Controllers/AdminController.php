<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $pageTitle = 'admin';
        return view('admin.admin', compact('pageTitle'));
    }
}
