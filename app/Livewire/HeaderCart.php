<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Lunar\Facades\CartSession;

class HeaderCart extends Component
{
    public $cartQuantity = 0;
    public $cartItems = [];

    public function mount()
    {
        $this->updateCart();
    }

    #[On('cart-updated')]
    public function updateCart()
    {
        \Log::info('HeaderCart: event received');
        $cart = CartSession::current();
        
        if ($cart) {
            \Log::info('HeaderCart: cart found', ['id' => $cart->id]);
            
            // Calculate the cart to ensure prices are populated
            $cart->calculate();
            
            $this->cartQuantity = $cart->lines()->count();
            \Log::info('HeaderCart: quantity', ['qty' => $this->cartQuantity]);
            $this->cartItems = $cart->lines;
        } else {
            \Log::info('HeaderCart: no cart');
            $this->cartQuantity = 0;
            $this->cartItems = collect();
        }
    }

    public function render()
    {
        return view('livewire.header-cart');
    }
}
