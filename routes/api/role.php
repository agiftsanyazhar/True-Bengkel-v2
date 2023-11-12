<?php

use App\Http\Controllers\API\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('role')->name('role.')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('index');
});
