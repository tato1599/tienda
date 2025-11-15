<?php

use App\Livewire\Servicios;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/servicios', Servicios::class)->name('servicios');
Route::get('/product/{product}', App\Livewire\ProductShow::class)->name('product.show');
Route::get('/cart', App\Livewire\Cart::class)->name('cart');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
