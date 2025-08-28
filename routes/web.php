<?php

use App\Http\Controllers\ProductController;
use App\Livewire\Counter;
use App\Livewire\ProductTable;
use App\Livewire\Riwayat;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('LandingPage.index');
});

Route::get('/profile', function () {
    return view('Profile.index');
});

Route::get('/riwayat', Riwayat::class);

Route::get('/products', [ProductController::class, 'products'])->name('products');

// Route::get('/dataproduct', ProductTable::class);
// Route::get('/counter', Counter::class);



