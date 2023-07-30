<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

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

// halaman login
Route::get('/',[LoginController::class, 'index']);
Route::post('/',[LoginController::class, 'authenticate']);


//halaman logout
Route::post('/logout',[LoginController::class, 'logout']);
// Route::get('login',[LoginController::class, 'index']);;
// Route::post('login',[LoginController::class, 'authenticate']);;

// register
Route::get('register',[RegisterController::class, 'index']);
Route::post('register',[RegisterController::class, 'store']);

//route home
Route::get('home', [HomeController::class, 'index'])->name('home');

//profile controller
Route::get('profile', ProfileController::class)->name('profile');

//employee controller
Route::resource('employees', EmployeeController::class);

Route::get('/create', function () {return view('employee.create');})->middleware(['checkRole:pembeli']);

Route::get('/admin', function () {return view('admin');})->middleware(['checkRole:admin']);

Route::get('/detail', function () {return view('employee.detail');});

Route::get('/bantuan', function () {return view('bantuan');});

Route::get('/admin', function () {return view('admin');});



Route::get('products/listmadu', [ProductController::class, 'listmadu'])->name('products.listmadu');
Route::resource('products', ProductController::class);
