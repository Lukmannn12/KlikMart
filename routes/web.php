<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Counter;
use App\Livewire\ProductTable;
use App\Livewire\Riwayat;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('LandingPage.index');
});

// Register
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

// Login
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

});





Route::get('/riwayat', Riwayat::class);


// Route::get('/dataproduct', ProductTable::class);
// Route::get('/counter', Counter::class);
