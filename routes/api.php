<?php

use App\Http\Controllers\API\{
    KendaraanController,
    MotorController,
    RoleController,
    SparePartController,
};
use App\Http\Controllers\API\Auth\{
    AuthenticatedSessionController,
    RegisterController,
};
use App\Http\Controllers\API\Master\{
    AboutController,
    GalleryController,
};
use App\Http\Controllers\API\Master\MasterData\{
    BrandController,
    JabatanController,
    TipeMotorController,
};
use App\Http\Controllers\API\Order\{
    OrderController,
    OrderDetailController,
};
use App\Http\Controllers\API\User\{
    AdminController,
    PegawaiController,
    PelangganController,
    UserController,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// --------------------------------------------------------------------------
// About
// --------------------------------------------------------------------------
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('index');
    Route::post('/update', [AboutController::class, 'update'])
        // ->middleware('auth:sanctum')
        ->name('update');
});

// --------------------------------------------------------------------------
// Admin
// --------------------------------------------------------------------------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::post('/store', [AdminController::class, 'store'])
        // ->middleware('auth:sanctum')
        ->name('store');
    Route::post('/update/{id}', [AdminController::class, 'update'])
        // ->middleware('auth:sanctum')
        ->name('update');
    Route::get('/destroy/{id}', [AdminController::class, 'destroy'])
        // ->middleware('auth:sanctum')
        ->name('destroy');
});

// --------------------------------------------------------------------------
// Brand
// --------------------------------------------------------------------------
Route::prefix('brand')->name('brand.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::post('/store', [BrandController::class, 'store'])
        // ->middleware('auth:sanctum')
        ->name('store');
    Route::post('/update/{id}', [BrandController::class, 'update'])
        // ->middleware('auth:sanctum')
        ->name('update');
    Route::get('/destroy/{id}', [BrandController::class, 'destroy'])
        // ->middleware('auth:sanctum')
        ->name('destroy');
});

// --------------------------------------------------------------------------
// Gallery
// --------------------------------------------------------------------------
Route::prefix('gallery')->name('gallery.')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
    Route::post('/store', [GalleryController::class, 'store'])
        // ->middleware('auth:sanctum')
        ->name('store');
    Route::post('/update/{id}', [GalleryController::class, 'update'])
        // ->middleware('auth:sanctum')
        ->name('update');
    Route::get('/destroy/{id}', [GalleryController::class, 'destroy'])
        // ->middleware('auth:sanctum')
        ->name('destroy');
});

// --------------------------------------------------------------------------
// Jabatan
// --------------------------------------------------------------------------
Route::prefix('jabatan')->name('jabatan.')->group(function () {
    Route::get('/', [JabatanController::class, 'index'])->name('index');
    Route::post('/store', [JabatanController::class, 'store'])
        // ->middleware('auth:sanctum')
        ->name('store');
    Route::post('/update/{id}', [JabatanController::class, 'update'])
        // ->middleware('auth:sanctum')
        ->name('update');
    Route::get('/destroy/{id}', [JabatanController::class, 'destroy'])
        // ->middleware('auth:sanctum')
        ->name('destroy');
});

// --------------------------------------------------------------------------
// Kendaraan
// --------------------------------------------------------------------------
Route::prefix('kendaraan')->name('kendaraan.')->group(function () {
    Route::get('/', [KendaraanController::class, 'index'])->name('index');
    Route::post('/store', [KendaraanController::class, 'store'])
        // ->middleware('auth:sanctum')
        ->name('store');
    Route::post('/update/{id}', [KendaraanController::class, 'update'])
        // ->middleware('auth:sanctum')
        ->name('update');
    Route::get('/destroy/{id}', [KendaraanController::class, 'destroy'])
        // ->middleware('auth:sanctum')
        ->name('destroy');
});

// --------------------------------------------------------------------------
// Motor
// --------------------------------------------------------------------------
Route::prefix('motor')->name('motor.')->group(function () {
    Route::get('/', [MotorController::class, 'index'])->name('index');
    Route::post('/store', [MotorController::class, 'store'])
        // ->middleware('auth:sanctum')
        ->name('store');
    Route::post('/update/{id}', [MotorController::class, 'update'])
        // ->middleware('auth:sanctum')
        ->name('update');
    Route::get('/destroy/{id}', [MotorController::class, 'destroy'])
        // ->middleware('auth:sanctum')
        ->name('destroy');
});

// --------------------------------------------------------------------------
// Order
// --------------------------------------------------------------------------
Route::prefix('order')->name('order.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::post('/store', [OrderController::class, 'store'])
        // ->middleware('auth:sanctum')
        ->name('store');
    Route::post('/update/{id}', [OrderController::class, 'update'])
        // ->middleware('auth:sanctum')
        ->name('update');
    Route::prefix('detail')->name('detail.')->group(function () {
        Route::get('/{order_id}', [OrderDetailController::class, 'index'])->name('index');
    });
});

// --------------------------------------------------------------------------
// Pegawai
// --------------------------------------------------------------------------
Route::prefix('pegawai')->name('pegawai.')->group(function () {
    Route::get('/', [PegawaiController::class, 'index'])->name('index');
    Route::post('/store', [PegawaiController::class, 'store'])
        // ->middleware('auth:sanctum')
        ->name('store');
    Route::post('/update/{id}', [PegawaiController::class, 'update'])
        // ->middleware('auth:sanctum')
        ->name('update');
    Route::get('/destroy/{id}', [PegawaiController::class, 'destroy'])
        // ->middleware('auth:sanctum')
        ->name('destroy');
});

// --------------------------------------------------------------------------
// Pelanggan
// --------------------------------------------------------------------------
Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/', [PelangganController::class, 'index'])->name('index');
    Route::post('/store', [PelangganController::class, 'store'])
        // ->middleware('auth:sanctum')
        ->name('store');
    Route::post('/update/{id}', [PelangganController::class, 'update'])
        // ->middleware('auth:sanctum')
        ->name('update');
    Route::get('/destroy/{id}', [PelangganController::class, 'destroy'])
        // ->middleware('auth:sanctum')
        ->name('destroy');
});

// --------------------------------------------------------------------------
// Role
// --------------------------------------------------------------------------
Route::prefix('role')->name('role.')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Spare Part
// --------------------------------------------------------------------------
Route::prefix('spare-part')->name('spare-part.')->group(function () {
    Route::get('/', [SparePartController::class, 'index'])->name('index');
    Route::post('/store', [SparePartController::class, 'store'])
        // ->middleware('auth:sanctum')
        ->name('store');
    Route::post('/update/{id}', [SparePartController::class, 'update'])
        // ->middleware('auth:sanctum')
        ->name('update');
    Route::get('/destroy/{id}', [SparePartController::class, 'destroy'])
        // ->middleware('auth:sanctum')
        ->name('destroy');
    Route::prefix('detail')->name('detail.')->group(function () {
        Route::get('/{id}', [SparePartController::class, 'show'])->name('detail');
    });
});

// --------------------------------------------------------------------------
// Tipe Motor
// --------------------------------------------------------------------------
Route::prefix('tipe-motor')->name('tipe-motor.')->group(function () {
    Route::get('/', [TipeMotorController::class, 'index'])->name('index');
    Route::post('/store', [TipeMotorController::class, 'store'])
        // ->middleware('auth:sanctum')
        ->name('store');
    Route::post('/update/{id}', [TipeMotorController::class, 'update'])
        // ->middleware('auth:sanctum')
        ->name('update');
    Route::get('/destroy/{id}', [TipeMotorController::class, 'destroy'])
        // ->middleware('auth:sanctum')
        ->name('destroy');
});

// --------------------------------------------------------------------------
// User
// --------------------------------------------------------------------------
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/get-all-user', [UserController::class, 'index'])->name('get-all-user');
});

// --------------------------------------------------------------------------
// Auth
// --------------------------------------------------------------------------
Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('/login', AuthenticatedSessionController::class)->name('login');
    Route::post('/register', RegisterController::class)->name('register');
    Route::post('/logout', AuthenticatedSessionController::class)
        // ->middleware('auth:sanctum')
        ->name('destroy');
});
