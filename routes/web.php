<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipmentController;
use App\Livewire\Counter;
use App\Livewire\ProductTable;
use App\Livewire\Riwayat;
use Illuminate\Support\Facades\Route;




Route::get('/', [LandingController::class, 'index'])->name('landingpage');
Route::get('/cart', [CartItemController::class, 'cart'])->name('cart');


// Register
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
// Produk
Route::get('/product/{slug}', [LandingController::class, 'show'])->name('product.show');

// Kategori




Route::middleware(['auth'])->group(function () {
    Route::post('/midtrans/callback', [MidtransController::class, 'callback']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/checkout/qris/{payment}', [CheckoutController::class, 'showQris'])->name('checkout.qris');
    Route::resource('/dashboard/category', CategoryController::class);
    Route::get('/pesanandetail', [OrderController::class, 'pesanandetail'])->name('pesanandetail.index');
    Route::get('/dashboard/transaksi/orders', [OrderController::class, 'order'])->name('order.index');
    Route::get('/dashboard/transaksi/payments', [PaymentController::class, 'payment'])->name('payment.index');
    Route::put('/dashboard/transaksi/orders/{id}', [OrderController::class, 'update'])->name('order.update');;
    Route::put('/dashboard/transaksi/payments/{id}', [PaymentController::class, 'update'])->name('payment.update');
    Route::put('/dashboard/transaksi/shipments/{id}', [ShipmentController::class, 'update'])->name('shipment.update');
    Route::get('/dashboard/transaksi/shipments', [ShipmentController::class, 'shipment'])->name('shipment.index');
     Route::get('/dashboard/User/DataUser', [UserController::class, 'user'])->name('user.index');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
    Route::get('/dashboard/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/dashboard/product', [ProductController::class, 'store'])->name('product.store');
    Route::put('/dashboard/product/{slug}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/user/profile', [ProfileController::class, 'profile'])->name('user.profile.show');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Login
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate');
Route::post('/cart/add', [CartItemController::class, 'addToCart'])->name('cart.add');


