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
        if(!CartSession::current()) {
           return;
        }
        $this->cart = CartSession::current()->lines()->get();

        $this->purchasableItemsMap = $this->cart
            ->filter(fn($line) => $line->purchasable_id)

            ->groupBy('purchasable_id')

            ->map(function ($lines) {
                $firstLine = $lines->first();

                $totalQuantity = $lines->sum('quantity');

                return [
                    'name' => $firstLine->purchasable->product->translateAttribute('name'),
                    'description' => $firstLine->purchasable->product->translateAttribute('description'),
                    'price' => $firstLine->purchasable->product->variant->prices()->first()->price->decimal,
                    'quantity' => $totalQuantity,
                    'media' => $firstLine->purchasable->product->media,
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
