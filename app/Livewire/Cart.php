<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Lunar\Facades\CartSession;

class Cart extends Component
{
    public $cart;
    public $purchasableItemsMap;

    public function mount()
    {
        $this->cart = CartSession::current()->lines()->get();

        $this->purchasableItemsMap = $this->cart
            ->filter(fn($line) => $line->purchasable_id)

            ->groupBy('purchasable_id')

            ->map(function ($lines) {
                $firstLine = $lines->first();

                $totalQuantity = $lines->sum('quantity');

                return [
                    'name' => $firstLine->purchasable->product->name,
                    'price' => $firstLine->purchasable->price,
                    'quantity' => $totalQuantity,
                ];
            })

            ->values();

    }


    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.cart');
    }
}
