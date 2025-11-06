<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\AuthLogin;
use App\Livewire\AuthRegister;
use App\Livewire\CatatanIndex;

// Redirect ke login jika akses root
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes (hanya untuk tamu)
Route::middleware('guest')->group(function () {
    Route::get('/login', AuthLogin::class)->name('login');
    Route::get('/register', AuthRegister::class)->name('register');
});

// Hanya bisa diakses jika sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', CatatanIndex::class)->name('dashboard');

    // Logout metode POST
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');
});
