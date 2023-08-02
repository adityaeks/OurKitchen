<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EtalaseController;
use App\Http\Controllers\ListMaduController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatPemesananController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// ROMBAK
Route::get('', [HomeController::class, 'welcome'])->name('welcome');
Route::get('listmadu', [ListMaduController::class, 'index'])->name('listmadu');
Route::view('tentangkami', 'aboutus')->name('tentangkami');
Route::view('bantuan', 'bantuan')->name('bantuan');

// //Login & Register
Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'authenticate']);
Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

// //logged user
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::resource('cart', CartController::class);
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout'); //belum ada view

// //logged admin
Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::resource('etalase', EtalaseController::class);
Route::get('riwayatpemesanan', [RiwayatPemesananController::class, 'index'])->name('riwayatpemesanan');
