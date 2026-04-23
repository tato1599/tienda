<?php

use App\Livewire\Servicios;
use Illuminate\Support\Facades\Route;
use Lunar\Models\Cart;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/servicios', Servicios::class)->name('servicios');
Route::get('/product/{product}', App\Livewire\ProductShow::class)->name('product.show');
Route::get('/cart', App\Livewire\Cart::class)->name('cart');
Route::get('/checkout/success', App\Livewire\CheckoutSuccess::class)->name('checkout.success');

// Lightweight JSON endpoint — returns current cart item count for JS polling
Route::get('/cart-count', function () {
    $cartId = session(config('lunar.cart_session.session_key', 'lunar_cart'));
    $count  = 0;

    if ($cartId) {
        $count = Cart::find($cartId)?->lines()->count() ?? 0;
    }

    return response()->json(['count' => $count]);
})->name('cart.count');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/mis-compras', App\Livewire\User\MisCompras::class)->name('mis-compras');
});

