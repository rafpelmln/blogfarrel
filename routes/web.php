<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\admin\KategoriController as AdminKategoriController;
use App\Http\Controllers\admin\KomentarController as AdminKomentarController;
use App\Http\Controllers\user\ArtikelController as UserArtikelController;
use App\Http\Controllers\user\KomentarController as UserKomentarController;
use App\Http\Controllers\Auth\AuthController;

// Halaman welcome, bebas akses
Route::get('/', function () {
    return view('welcome');
});

// Halaman login dan register (pakai middleware redirect if authenticated)
Route::middleware('guest.redirect')->group(function () {
    Route::get('/autentikasi', [AuthController::class, 'showLoginRegisForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

// Logout (harus login dulu)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// [----- ROUTING AFTER LOGIN -----]
Route::middleware('auth')->group(function () {

    // Dashboard admin (hanya admin)
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('admin')->name('admin.dashboard');

    // [----- KATEGORI -----]
    Route::middleware('admin')->prefix('admin/kategori')->name('admin.kategori.')->group(function () {
        Route::get('/', [AdminKategoriController::class, 'index'])->name('index');
        Route::get('/create', [AdminKategoriController::class, 'create'])->name('create');
        Route::post('/', [AdminKategoriController::class, 'store'])->name('store');
        Route::get('/{kategori}/edit', [AdminKategoriController::class, 'edit'])->name('edit');
        Route::put('/{kategori}', [AdminKategoriController::class, 'update'])->name('update');
        Route::delete('/{kategori}', [AdminKategoriController::class, 'destroy'])->name('destroy');
    });

    // [----- ARTIKEL -----]
    Route::middleware('admin')->prefix('admin/artikel')->name('admin.artikel.')->group(function () {
        Route::get('/', [AdminArtikelController::class, 'index'])->name('index');
        Route::get('/create', [AdminArtikelController::class, 'create'])->name('create');
        Route::post('/', [AdminArtikelController::class, 'store'])->name('store');
        Route::get('/{artikel}', [AdminArtikelController::class, 'show'])->name('show'); // <--- tambahkan ini
        Route::get('/{artikel}/edit', [AdminArtikelController::class, 'edit'])->name('edit');
        Route::put('/{artikel}', [AdminArtikelController::class, 'update'])->name('update');
        Route::delete('/{artikel}', [AdminArtikelController::class, 'destroy'])->name('destroy');

        // Komentar pada artikel (oleh admin)
        Route::post('/{artikel}/komentar', [AdminKomentarController::class, 'store'])->name('komentar.store');
        // Hapus Komentar (Admin)
        Route::delete('/komentar/{komentar}', [AdminKomentarController::class, 'destroy'])->name('komentar.destroy');
    });


    // [----- ROUTING USER -----]
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('dashboard');

        // User hanya bisa melihat artikel dan detail artikel
        Route::get('/artikel', [UserArtikelController::class, 'index'])->name('artikel.index');
        Route::get('/artikel/{artikel}', [UserArtikelController::class, 'show'])->name('artikel.show');

        // Komentar oleh user
        Route::post('/artikel/{artikel}/komentar', [UserKomentarController::class, 'store'])->name('komentar.store');
        Route::delete('/komentar/{komentar}', [UserKomentarController::class, 'destroy'])->name('komentar.destroy');
    });
});
