<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Lunar\Facades\CartSession;

class CheckoutSuccess extends Component
{
    public $order;

    public function mount()
    {
        $currentCart = CartSession::current();

        if ($currentCart) {
            // Create Order from the confirmed cart
            $this->order = $currentCart->createOrder();

            // Stripe already confirmed the payment before redirecting here,
            // so we mark it as payment-received and set the user explicitly
            // (Lunar doesn't auto-propagate user_id from the cart session)
            $this->order->update([
                'status'    => 'payment-received',
                'placed_at' => now(),
                'user_id'   => auth()->id(),
            ]);

            // Clear the cart session — order is now persistent
            CartSession::forget();
        } else {
            // Fallback: find the most recent order for this user
            $this->order = \Lunar\Models\Order::where('user_id', auth()->id())
                ->latest()
                ->first();
        }
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.checkout-success');
    }
}
