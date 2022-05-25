<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/base', function () {
    return view('base');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'adminDashboard']);
    Route::get('/login', [AdminController::class, 'showLogin']);
    Route::post('/login', [AdminController::class, 'adminLogin']);
    Route::get('/logout', [AdminController::class,'adminLogout']);

    Route::get('/profil', [AdminController::class, 'showProfil']);
    Route::patch('/profil/{id}', [AdminController::class, 'updateProfil']);

    Route::get('/penghuni', [PenghuniController::class, 'index']);
    Route::get('/penghuni/tambah', [PenghuniController::class, 'create']);
    Route::post('/penghuni', [PenghuniController::class, 'store']);
    Route::get('/penghuni/detail/{id}', [PenghuniController::class, 'show']);
    Route::patch('/penghuni/{id}', [PenghuniController::class, 'update']);
    Route::delete('/penghuni/{id}', [PenghuniController::class, 'destroy']);
    
    Route::get('/kamar', [KamarController::class, 'index']);
    Route::get('/kamar/detail/{id}', [KamarController::class, 'show']);
    Route::get('/kamar/tambah', [KamarController::class, 'create']);
    Route::post('/kamar', [KamarController::class, 'store']);
    Route::get('/kamar/edit/{id}', [KamarController::class, 'edit']);
    Route::patch('/kamar/{id}', [KamarController::class, 'update']);
    Route::delete('/kamar/{id}', [KamarController::class, 'destroy']);

    Route::get('/penyewaan', [PenyewaanController::class, 'index']);
    Route::get('/penyewaan/detail/{id}', [PenyewaanController::class, 'detail']);
    Route::get('/penyewaan/tambah', [PenyewaanController::class, 'create']);
    Route::post('/penyewaan', [PenyewaanController::class, 'store']);
    Route::patch('/penyewaan/{id}', [PenyewaanController::class, 'update']);
    Route::patch('/penyewaan/ingatkan/{id}', [PenyewaanController::class, 'updateIngatkan']);

    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/transaksi/detail/{id}', [TransaksiController::class, 'detail']);

});

Route::prefix('penghuni')->group(function () {
    Route::get('/', [PenghuniController::class, 'penghuniDashboard']);
    Route::get('/login', [PenghuniController::class, 'showLogin']);
    Route::post('/login', [PenghuniController::class, 'penghuniLogin']);
    Route::get('/logout', [PenghuniController::class, 'penghuniLogout']);

    Route::get('/profil', [PenghuniController::class, 'showProfil']);
    Route::patch('/profil/{id}', [PenghuniController::class, 'updateProfil']);

    Route::get('/kamar', [KamarController::class, 'allKamar']);

    Route::get('/kamar-saya', [KamarController::class, 'kamarPenghuni']);
    Route::patch('/kamar-saya/konfirmasi/{id}', [PenyewaanController::class, 'updateKonfirmasi']);

    Route::get('/tagihan', [PenyewaanController::class, 'penghuniTagihan']);
    Route::post('/tagihan', [TransaksiController::class, 'createTransaksi']);

    Route::get('/riwayat', [TransaksiController::class, 'penghuniRiwayatSewa']);
    
    

});
