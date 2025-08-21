<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\BerandaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArsipSuratController;
use App\Http\Controllers\Admin\Posts\PostController;
use App\Http\Controllers\Admin\Posts\CategoryController;
use App\Http\Controllers\Admin\Setting\ProfileController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('arsip_surat', ArsipSuratController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::delete('posts/images/{id}', [PostController::class, 'deleteImage'])->name('posts.images.delete');


    Route::prefix('admin/setting')->group(function () {
        Route::get('profile', [ProfileController::class, 'edit'])->name('admin.setting.profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('admin.setting.profile.update');
    });
});

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
