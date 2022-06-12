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
    Route::get('/', [AdminController::class, 'adminDashboard'])->middleware('adminmiddleware');
    Route::get('/login', [AdminController::class, 'showLogin']);
    Route::post('/login', [AdminController::class, 'adminLogin']);
    Route::get('/logout', [AdminController::class,'adminLogout']);

    Route::get('/profil', [AdminController::class, 'showProfil'])->middleware('adminmiddleware');
    Route::patch('/profil/{id}', [AdminController::class, 'updateProfil'])->middleware('adminmiddleware');

    Route::get('/penghuni', [PenghuniController::class, 'index'])->middleware('adminmiddleware');
    Route::get('/penghuni/tambah', [PenghuniController::class, 'create'])->middleware('adminmiddleware');
    Route::post('/penghuni', [PenghuniController::class, 'store'])->middleware('adminmiddleware');
    Route::get('/penghuni/detail/{id}', [PenghuniController::class, 'show'])->middleware('adminmiddleware');
    Route::patch('/penghuni/{id}', [PenghuniController::class, 'update'])->middleware('adminmiddleware');
    Route::patch('/penghuni/setnonaktif/{id}', [PenghuniController::class, 'setPenghuniInActive'])->middleware('adminmiddleware');
    
    Route::get('/kamar', [KamarController::class, 'index'])->middleware('adminmiddleware');
    Route::get('/kamar/detail/{id}', [KamarController::class, 'show'])->middleware('adminmiddleware');
    Route::get('/kamar/tambah', [KamarController::class, 'create'])->middleware('adminmiddleware');
    Route::post('/kamar', [KamarController::class, 'store'])->middleware('adminmiddleware');
    Route::get('/kamar/edit/{id}', [KamarController::class, 'edit'])->middleware('adminmiddleware');
    Route::patch('/kamar/{id}', [KamarController::class, 'update'])->middleware('adminmiddleware');
    Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->middleware('adminmiddleware');

    Route::get('/penyewaan', [PenyewaanController::class, 'index'])->middleware('adminmiddleware');
    Route::get('/penyewaan/detail/{id}', [PenyewaanController::class, 'detail'])->middleware('adminmiddleware');
    Route::get('/penyewaan/tambah', [PenyewaanController::class, 'create'])->middleware('adminmiddleware');
    Route::post('/penyewaan', [PenyewaanController::class, 'store'])->middleware('adminmiddleware');
    Route::patch('/penyewaan/{id}', [PenyewaanController::class, 'update'])->middleware('adminmiddleware');
    Route::patch('/penyewaan/ingatkan/{id}', [PenyewaanController::class, 'updateIngatkan'])->middleware('adminmiddleware');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->middleware('adminmiddleware');
    Route::get('/transaksi/detail/{id}', [TransaksiController::class, 'detail'])->middleware('adminmiddleware');
    Route::get('/transaksi/cetak/{id}', [TransaksiController::class, 'cetakStruk'])->middleware('adminmiddleware');

});

Route::prefix('penghuni')->group(function () {
    Route::get('/', [PenghuniController::class, 'penghuniDashboard'])->middleware('penghunimiddleware');
    Route::get('/login', [PenghuniController::class, 'showLogin']);
    Route::post('/login', [PenghuniController::class, 'penghuniLogin']);
    Route::get('/logout', [PenghuniController::class, 'penghuniLogout']);

    Route::get('/profil', [PenghuniController::class, 'showProfil'])->middleware('penghunimiddleware');
    Route::patch('/profil/{id}', [PenghuniController::class, 'updateProfil'])->middleware('penghunimiddleware');

    Route::get('/kamar', [KamarController::class, 'allKamar'])->middleware('penghunimiddleware');

    Route::get('/kamar-saya', [KamarController::class, 'kamarPenghuni'])->middleware('penghunimiddleware');
    Route::patch('/kamar-saya/konfirmasi/{id}', [PenyewaanController::class, 'updateKonfirmasi'])->middleware('penghunimiddleware');

    Route::get('/tagihan', [PenyewaanController::class, 'penghuniTagihan'])->middleware('penghunimiddleware');
    Route::post('/tagihan', [TransaksiController::class, 'createTransaksi'])->middleware('penghunimiddleware');

    Route::get('/riwayat', [TransaksiController::class, 'penghuniRiwayatSewa'])->middleware('penghunimiddleware');
    
});
