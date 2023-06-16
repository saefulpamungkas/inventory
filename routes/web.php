<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProdusenController;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\ProduksiMasukController;
use App\Http\Controllers\ProduksiKeluarController;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/dashboard/login', [LoginController::class, 'login']); //login atau autentikasi
Route::get('/dashboard/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');

//Data Master
Route::get('/dashboard/datamaster/user', [UserController::class, 'index'])->middleware('admin');
Route::post('/dashboard/datamaster/user/store', [UserController::class, 'store']);
Route::post('/dashboard/datamaster/user/update/{id}', [UserController::class, 'update']);
Route::get('/dashboard/datamaster/user/destroy/{id}', [UserController::class, 'destroy']);

Route::get('/dashboard/datamaster/supplier', [SupplierController::class, 'index'])->middleware('admin');
Route::post('/dashboard/datamaster/supplier/store', [SupplierController::class, 'store']);
Route::post('/dashboard/datamaster/supplier/update/{id}', [SupplierController::class, 'update']);
Route::get('/dashboard/datamaster/supplier/destroy/{id}', [SupplierController::class, 'destroy']);

Route::get('/dashboard/datamaster/produsen', [ProdusenController::class, 'index'])->middleware('admin');
Route::post('/dashboard/datamaster/produsen/store', [ProdusenController::class, 'store']);
Route::post('/dashboard/datamaster/produsen/update/{id}', [ProdusenController::class, 'update']);
Route::get('/dashboard/datamaster/produsen/destroy/{id}', [ProdusenController::class, 'destroy']);

//Barang
Route::get('/dashboard/barang', [BarangController::class, 'index'])->middleware('auth');
Route::post('/dashboard/barang/store', [BarangController::class, 'store']);
Route::post('/dashboard/barang/update/{id}', [BarangController::class, 'update']);
Route::get('/dashboard/barang/destroy/{id}', [BarangController::class, 'destroy']);

//Barang Masuk
Route::get('/dashboard/barangmasuk', [BarangMasukController::class, 'index'])->middleware('auth');
Route::post('/dashboard/barangmasuk/store', [BarangMasukController::class, 'store']);
// Route::resorce('/dashboard/barangmasuk/store', 'BarangMasukController');
Route::post('/dashboard/barangmasuk/update/{id}', [BarangMasukController::class, 'update']);
Route::get('/dashboard/barangmasuk/destroy/{id}', [BarangMasukController::class, 'destroy']);

//Barang Keluar
Route::get('/dashboard/barangkeluar', [BarangKeluarController::class, 'index'])->middleware('auth');
Route::post('/dashboard/barangkeluar/store', [BarangKeluarController::class, 'store']);
Route::post('/dashboard/barangkeluar/update/{id}', [BarangKeluarController::class, 'update']);
Route::get('/dashboard/barangkeluar/destroy/{id}', [BarangKeluarController::class, 'destroy']);

//Barang Produksi
Route::get('/dashboard/produksi', [ProduksiController::class, 'index'])->middleware('auth');
Route::post('/dashboard/produksi/store', [ProduksiController::class, 'store']);
Route::post('/dashboard/produksi/update/{id}', [ProduksiController::class, 'update']);
Route::get('/dashboard/produksi/destroy/{id}', [ProduksiController::class, 'destroy']);

//Produk masuk
Route::get('/dashboard/produksi/masuk', [ProduksiMasukController::class, 'index'])->middleware('auth');
Route::post('/dashboard/produksi/masuk/store', [ProduksiMasukController::class, 'store']);
Route::post('/dashboard/produksi/masuk/update/{id}', [ProduksiMasukController::class, 'update']);
Route::get('/dashboard/produksi/masuk/destroy/{id}', [ProduksiMasukController::class, 'destroy']);

Route::get('/dashboard/produksi/keluar', [ProduksiKeluarController::class, 'index'])->middleware('auth');
Route::post('/dashboard/produksi/keluar/store', [ProduksiKeluarController::class, 'store']);
Route::post('/dashboard/produksi/keluar/update/{id}', [ProduksiKeluarController::class, 'update']);
Route::get('/dashboard/produksi/keluar/destroy/{id}', [ProduksiKeluarController::class, 'destroy']);

//Laporan Barang
Route::get('/dashboard/datalaporan/barangmasuk', [BarangMasukController::class, 'laporan']);
Route::get('/dashboard/datalaporan/barangkeluar', [BarangKeluarController::class, 'laporan']);

//Laporan Produksi
Route::get('/dashboard/laporanproduksi/produksimasuk', [ProduksiMasukController::class, 'laporan']);
Route::get('/dashboard/laporanproduksi/produksikeluar', [ProduksiKeluarController::class, 'laporan']);
