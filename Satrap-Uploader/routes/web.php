<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('file')->group(function(){
    Route::get('/upload' , [FileController::class , 'upload'])->name('file.upload');
    Route::post('/upload' , [FileController::class , 'storage'])->name('file.storage');
});

Auth::routes();
