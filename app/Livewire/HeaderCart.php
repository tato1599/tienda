<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Lunar\Models\Cart;

class HeaderCart extends Component
{
    #[On('cart-updated')]
    #[On('echo:cart-updates,.CartUpdated')]
    public function refresh(): void
    {
        // Empty — triggers re-render where all data is calculated fresh
    }

    private function getCart(): ?Cart
    {
        // Read the cart ID directly from the PHP session — works in both
        // regular requests AND Livewire AJAX polling/event requests.
        $cartId = session(config('lunar.cart_session.session_key', 'lunar_cart'));

        if (! $cartId) {
            return null;
        }

        return Cart::with(['lines.purchasable.product.media'])->find($cartId);
    }

    public function render()
    {
        $cart = $this->getCart();

        $cartItems    = collect();
        $cartQuantity = 0;

        if ($cart) {
            $cart->calculate();
            $cartItems    = $cart->lines;
            $cartQuantity = $cartItems->count();
        }

        return view('livewire.header-cart', [
            'cart'         => $cart,
            'cartItems'    => $cartItems,
            'cartQuantity' => $cartQuantity,
        ]);
    }
}

