<?php

use App\Http\Controllers\API\{
    KendaraanController,
    MotorController,
    RoleController,
    SparePartController,
};
use App\Http\Controllers\API\Auth\{
    LoginController,
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
});

// --------------------------------------------------------------------------
// Admin
// --------------------------------------------------------------------------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::post('/store', [AdminController::class, 'store'])->name('store');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');
});

// --------------------------------------------------------------------------
// Brand
// --------------------------------------------------------------------------
Route::prefix('brand')->name('brand.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::post('/store', [BrandController::class, 'store'])->name('store');
    Route::post('/update/{id}', [BrandController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [BrandController::class, 'destroy'])->name('destroy');
});

// --------------------------------------------------------------------------
// Gallery
// --------------------------------------------------------------------------
Route::prefix('gallery')->name('gallery.')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Jabatan
// --------------------------------------------------------------------------
Route::prefix('jabatan')->name('jabatan.')->group(function () {
    Route::get('/', [JabatanController::class, 'index'])->name('index');
    Route::post('/store', [JabatanController::class, 'store'])->name('store');
    Route::post('/update/{id}', [JabatanController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [JabatanController::class, 'destroy'])->name('destroy');
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
    Route::post('/store', [MotorController::class, 'store'])->name('store');
    Route::post('/update/{id}', [MotorController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [MotorController::class, 'destroy'])->name('destroy');
});

// --------------------------------------------------------------------------
// Order
// --------------------------------------------------------------------------
Route::prefix('order')->name('order.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::prefix('detail')->name('detail.')->group(function () {
        Route::get('/{order_id}', [OrderController::class, 'show'])->name('show');
    });
});

// --------------------------------------------------------------------------
// Pegawai
// --------------------------------------------------------------------------
Route::prefix('pegawai')->name('pegawai.')->group(function () {
    Route::get('/', [PegawaiController::class, 'index'])->name('index');
    Route::post('/store', [PegawaiController::class, 'store'])->name('store');
    Route::post('/update/{id}', [PegawaiController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [PegawaiController::class, 'destroy'])->name('destroy');
});

// --------------------------------------------------------------------------
// Pelanggan
// --------------------------------------------------------------------------
Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/', [PelangganController::class, 'index'])->name('index');
    Route::post('/store', [PelangganController::class, 'store'])->name('store');
    Route::post('/update/{id}', [PelangganController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [PelangganController::class, 'destroy'])->name('destroy');
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
Route::prefix('spare-prat')->name('spare-prat.')->group(function () {
    Route::get('/', [SparePartController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Tipe Motor
// --------------------------------------------------------------------------
Route::prefix('tipe-motor')->name('tipe-motor.')->group(function () {
    Route::get('/', [TipeMotorController::class, 'index'])->name('index');
    Route::post('/store', [TipeMotorController::class, 'store'])->name('store');
    Route::post('/update/{id}', [TipeMotorController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [TipeMotorController::class, 'destroy'])->name('destroy');
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
    Route::post('/login', LoginController::class)->name('login');
    Route::post('/register', RegisterController::class)->name('register');
});
