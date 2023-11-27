<?php

use App\Http\Controllers\Admin\{
    DashboardController,
    KendaraanController,
    MotorController,
    SparePartController,
};
use App\Http\Controllers\Admin\Master\{
    AboutController,
    GalleryController,
};
use App\Http\Controllers\Admin\Master\MasterData\{
    BrandController,
    JabatanController,
    TipeMotorController,
};
use App\Http\Controllers\Admin\Order\{
    OrderController,
    OrderDetailController,
};
use App\Http\Controllers\Admin\User\{
    AdminController,
    PegawaiController,
    PelangganController,
    UserController,
};
use Illuminate\Support\Facades\Route;

// --------------------------------------------------------------------------
// Dashboard
// --------------------------------------------------------------------------
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Master
// --------------------------------------------------------------------------
Route::prefix('master')->name('master.')->group(function () {
    // Master Data
    Route::prefix('master-data')->name('master-data.')->group(function () {
        Route::prefix('brand')->name('brand.')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('index');
            Route::post('/store', [BrandController::class, 'store'])->name('store');
            // Route::post('/update', [EmailTypeController::class, 'update'])->name('update');
            // Route::get('/destroy/{id}', [EmailTypeController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('jabatan')->name('jabatan.')->group(function () {
            Route::get('/', [JabatanController::class, 'index'])->name('index');
        });
        Route::prefix('tipe-motor')->name('tipe-motor.')->group(function () {
            Route::get('/', [TipeMotorController::class, 'index'])->name('index');
        });
    });

    // About
    Route::prefix('about')->name('about.')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('index');
    });

    // Gallery
    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('index');
    });
});

// --------------------------------------------------------------------------
// Order
// --------------------------------------------------------------------------
Route::prefix('order')->name('order.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/detail/{id}', [OrderDetailController::class, 'index'])->name('detail');
    });
});

// --------------------------------------------------------------------------
// Kendaraan
// --------------------------------------------------------------------------
Route::prefix('kendaraan')->name('kendaraan.')->group(function () {
    Route::get('/', [KendaraanController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Motor
// --------------------------------------------------------------------------
Route::prefix('motor')->name('motor.')->group(function () {
    Route::get('/', [MotorController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Motor
// --------------------------------------------------------------------------
Route::prefix('spare-part')->name('spare-part.')->group(function () {
    Route::get('/', [SparePartController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// User
// --------------------------------------------------------------------------
Route::prefix('user')->name('user.')->group(function () {
    Route::prefix('all-user')->name('all-user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });
    Route::prefix('pegawai')->name('pegawai.')->group(function () {
        Route::get('/', [PegawaiController::class, 'index'])->name('index');
    });
    Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
        Route::get('/', [PelangganController::class, 'index'])->name('index');
    });
});
