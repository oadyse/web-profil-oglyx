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
Route::get('/search', [HomeController::class, 'search'])->name('search');

Auth::routes([
    'register' => false,
]);
Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/daftar_pesanan', [DashboardController::class, 'index'])->name('menu-dashboard');
    Route::get('admin/daftar_pesanan/detail/{id}', [DashboardController::class, 'detail'])->name('detail-pesanan');
    Route::get('admin/daftar_produk', [DashboardController::class, 'produk'])->name('menu-produk');
    Route::post('admin/daftar_produk/add', [DashboardController::class, 'addNew'])->name('add');
    Route::post('admin/daftar_produk/edit/{id}', [DashboardController::class, 'processUpdate'])->name('edit');
    Route::get('admin/daftar_produk/delete/{id}', [DashboardController::class, 'delete'])->name('delete');
    Route::post('status/{id}', [DashboardController::class, 'changeStatus'])->name('status');
});
