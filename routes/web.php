<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('produk', [HomeController::class, 'index'])->name('daftar-produk');
Route::get('produkdetail', [HomeController::class, 'detail'])->name('detail-produk');
Route::get('login', [DashboardController::class, 'login'])->name('login-sistem');

Route::get('admin', [DashboardController::class, 'index'])->name('menu-dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
