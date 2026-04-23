<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Lunar\Models\Order;

class MisCompras extends Component
{
    public function getOrdersProperty()
    {
        return Order::where('user_id', auth()->id())
            ->with(['lines.purchasable.product.media'])
            ->latest()
            ->get();
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.user.mis-compras', [
            'orders' => $this->orders,
        ]);
    }
}
