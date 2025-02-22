<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengadaanController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    
    // Buku Routes
    Route::post('/buku', [AdminController::class, 'storeBuku'])->name('admin.buku.store');
    Route::put('/buku/{id}', [AdminController::class, 'updateBuku'])->name('admin.buku.update');
    Route::delete('/buku/{id}', [AdminController::class, 'deleteBuku'])->name('admin.buku.delete');
    
    // Penerbit Routes
    Route::get('/publishers', [AdminController::class, 'publishers'])->name('admin.publishers');
    Route::post('/penerbit', [AdminController::class, 'storePenerbit'])->name('admin.penerbit.store');
    Route::put('/penerbit/{id}', [AdminController::class, 'updatePenerbit'])->name('admin.penerbit.update');
    Route::delete('/penerbit/{id}', [AdminController::class, 'deletePenerbit'])->name('admin.penerbit.delete');
});

// Pengadaan Route
Route::get('/pengadaan', [PengadaanController::class, 'index'])->name('pengadaan.index');
