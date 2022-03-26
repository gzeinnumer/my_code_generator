<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CarangController;

Route::prefix('barang')->group(function () {
    Route::post('/insert', [CarangController::class, 'insert'])->name('barang.insert');
    Route::get('/all', [CarangController::class, 'all'])->name('barang.all');
    Route::post('/update/{id}', [CarangController::class, 'update'])->name('barang.update');
    Route::get('/delete/{id}', [CarangController::class, 'delete'])->name('barang.delete');
    Route::get('/find/{id}', [CarangController::class, 'find'])->name('barang.find');
});