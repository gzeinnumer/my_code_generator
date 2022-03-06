<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MApiResponseController;

Route::prefix('api_response')->group(function () {
    Route::post('/insert', [MApiResponseController::class, 'insert'])->name('api_response.insert');
    Route::get('/all', [MApiResponseController::class, 'all'])->name('api_response.all');
    Route::post('/update/{id}', [MApiResponseController::class, 'update'])->name('api_response.update');
    Route::get('/delete/{id}', [MApiResponseController::class, 'delete'])->name('api_response.delete');
    Route::get('/find/{id}', [MApiResponseController::class, 'find'])->name('api_response.find');
});