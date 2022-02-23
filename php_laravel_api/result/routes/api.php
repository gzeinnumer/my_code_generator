<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BarangController;

Route::prefix('barang')->group(function () {
    Route::post('/insert', [BarangController::class, 'insert'])->name('barang.insert');
    Route::get('/all', [BarangController::class, 'all'])->name('barang.all');
    Route::post('/update/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::get('/delete/{id}', [BarangController::class, 'delete'])->name('barang.delete');
    Route::get('/find/{id}', [BarangController::class, 'find'])->name('barang.find');
});