<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Lunar\Facades\CartSession;
use Lunar\Models\Order;

class CheckoutSuccess extends Component
{
    public $order;

    public function mount()
    {
        $currentCart = CartSession::current();

        if ($currentCart) {
            // Create Order
            $this->order = $currentCart->createOrder();
            
            // Update Status (assuming 'payment-received' is a valid status)
            $this->order->update([
                'status' => 'awaiting-payment',
                'placed_at' => now(),
            ]);

            // Clear Cart
            CartSession::forget();
        } else {
            // If no cart, try to find the last order for this user (optional fallback)
            // For now, just redirect if accessed directly without cart/order context
            // return redirect()->route('home');
        }
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.checkout-success');
    }
}
