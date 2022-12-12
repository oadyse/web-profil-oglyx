<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\pesananController;

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
Route::get('produkdetail/{id}', [HomeController::class, 'detail'])->name('detail-produk');
Route::post('tambah_pesanan', [pesananController::class, 'addPesanan']);

Auth::routes([
    'register' => false,
]);
Route::group(['middleware' => 'auth'], function () {
    Route::get('admin', [DashboardController::class, 'index'])->name('menu-dashboard');
    Route::get('detail/{id}', [DashboardController::class, 'detail']);
});
