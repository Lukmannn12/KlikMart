<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Counter;
use App\Livewire\ProductTable;
use App\Livewire\Riwayat;
use Illuminate\Support\Facades\Route;




Route::get('/', [LandingController::class, 'index'])->name('landingpage');
Route::get('/cart', [LandingController::class, 'cart'])->name('cart');

// Register
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
// Produk
Route::get('/product/{slug}', [LandingController::class, 'show'])->name('product.show');

// Kategori


// Login
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate');
Route::get('/{slug}', [LandingController::class, 'show'])->name('product.showw');
Route::post('/cart/add', [LandingController::class, 'addToCart'])->name('cart.add');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/dashboard/category', CategoryController::class);
    Route::get('/dashboard/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/dashboard/product', [ProductController::class, 'store'])->name('product.store');
    Route::put('/dashboard/product/{slug}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});





Route::get('/riwayat', Riwayat::class);


// Route::get('/dataproduct', ProductTable::class);
// Route::get('/counter', Counter::class);
