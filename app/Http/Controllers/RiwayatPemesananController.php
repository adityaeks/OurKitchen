<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RiwayatPemesananController extends Controller
{
    //
    public function index()
{
    $pageTitle = 'Riwayat Pemesanan';
    $details = DB::table('transaksi')->get();
    return view('admin.riwayatpemesanan', compact('details', 'pageTitle'));
}
}
