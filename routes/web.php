<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // User
    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Kelas
    Route::prefix('/kelas')->group(function () {
        Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
        Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
        Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
        Route::get('/kelas/{id}', [KelasController::class, 'show'])->name('kelas.show');
        Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
        Route::patch('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
        Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
    });
    
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
