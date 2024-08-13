<?php

use App\Http\Controllers;
use App\Http\Controllers\GajiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
    // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/admin', Controllers\AdminController::class)->names([
        'index' => 'admin.index',
        'create' => 'admin.create',
        'store' => 'admin.store',
        'show' => 'admin.show',
        'edit' => 'admin.edit',
        'update' => 'admin.update',
        'destroy' => 'admin.destroy',
    ]);
    Route::resource('/transaksi', Controllers\TransaksiController::class)->names([
        'index' => 'transaksi.index',
        'create' => 'transaksi.create',
        'store' => 'transaksi.store',
        'show' => 'transaksi.show',
        'edit' => 'transaksi.edit',
        'update' => 'transaksi.update',
        'destroy' => 'transaksi.destroy',
    ]);
});

Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::resource('/owner', Controllers\OwnerController::class)->names([
        'dashboard' => 'owner.dashboard',
        'index' => 'owner.index',
        'create' => 'owner.create',
        'store' => 'owner.store',
        'show' => 'owner.show',
        'edit' => 'owner.edit',
        'update' => 'owner.update',
        'destroy' => 'owner.destroy',
    ]);
    Route::resource('/stok', Controllers\StokController::class)->names([
        'index' => 'stok.index',
        'create' => 'stok.create',
        'store' => 'stok.store',
        'show' => 'stok.show',
        'edit' => 'stok.edit',
        'update' => 'stok.update',
        'destroy' => 'stok.destroy',
    ]);
    Route::get('/gaji/karyawan', [Controllers\GajiController::class, 'karyawan'])->name('gaji.karyawan');
    Route::get('/gaji/operator', [Controllers\GajiController::class, 'operator'])->name('gaji.operator');
    Route::post('/gaji', [Controllers\GajiController::class, 'store'])->name('gaji.store');
    Route::get('/gaji/{gaji}/edit', [Controllers\GajiController::class, 'edit'])->name('gaji.edit');
    Route::delete('/gaji/{gaji}', [Controllers\GajiController::class, 'destroy'])->name('gaji.destroy');
});

require __DIR__.'/auth.php';
