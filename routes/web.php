<?php

use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\InputBarangController;
use App\Http\Controllers\KonfirmasiBarangController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('kategori', KategoriController::class)->except(['create', 'edit']);
    Route::resource('admin', AdminController::class)->except(['create', 'edit']);
    Route::resource('barang', BarangController::class)->except(['create', 'edit']);
    Route::resource('teknisi', TeknisiController::class)->except(['create', 'edit']);

    Route::get('/history', [BarangMasukController::class, 'history'])->name('history');

    Route::get('/', [DataServiceController::class, 'index'])->name('service');
    Route::get('/input-barang', [InputBarangController::class, 'index'])->name('service.input');
    Route::get('/get-teknisi-data/{id}', [InputBarangController::class, 'getTeknisiData'])->name('getTeknisiData');
    Route::get('/get-barang-data', [InputBarangController::class, 'getBarangData'])->name('getBarangData');
    Route::post('/store-temporary', [InputBarangController::class, 'storeTemporary'])->name('store.temporary');
    Route::delete('/delete-temporary/{id}', [InputBarangController::class, 'deleteTemporary'])->name('delete.temporary');
    Route::post('/store-service', [InputBarangController::class, 'storeService'])->name('store.service');
    Route::post('/update-temporary/{id}', [InputBarangController::class, 'updateTemporary'])->name('update.temporary');

    Route::get('/konfirmasi-barang', [KonfirmasiBarangController::class, 'index'])->name('service.konfirmasi.barang');
    Route::post('/update-kategori', [KonfirmasiBarangController::class, 'updateKategori'])->name('konfirmasi.kategori');
    Route::delete('/delete-konfirmasi/{id}', [KonfirmasiBarangController::class, 'deleteKonfirmasi'])->name('delete.konfirmasi');
    Route::get('/get-barang-masuk/{id}', [KonfirmasiBarangController::class, 'getBarangMasuk'])->name('getBarangMasuk');
    Route::post('/update-barang-masuk/{id}', [KonfirmasiBarangController::class, 'updateBarangMasuk'])->name('updateBarangMasuk');
});

Route::get('/production', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'Production is ready';
});
