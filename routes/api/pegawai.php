<?php

use App\Http\Controllers\API\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::prefix('pegawai')->name('pegawai.')->group(function () {
    Route::get('/', [PegawaiController::class, 'index'])->name('index');
});
