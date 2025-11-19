<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Lunar\Facades\CartSession;
use Lunar\Models\CartLine;
use Lunar\Stripe\Facades\Stripe;

class Cart extends Component
{
    public $cart;
    public $purchasableItemsMap = [];

    public $cartPrices;
    public $clientSecret; // Propiedad para almacenar el client_secret de Stripe

    public function mount()
    {
        if(!CartSession::current()) {
           return;
        }
        $this->cart = CartSession::current()->lines()->get();
        $this->cartPrices = CartSession::current()->calculate();
        // dd($this->cartPrices->subTotal);
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

public function checkout()
    {
        $cart = CartSession::current();

        if (!$cart) {
            // Manejo de error si el carrito no existe
            return;
        }

        // 1. Crear o sincronizar el PaymentIntent.
        // Esto guarda el PaymentIntent ID y el client_secret en la meta del carrito.
        $intent = Stripe::createIntent($cart, $options = []);

        // 2. Almacenar el client_secret en una propiedad pública
        $this->clientSecret = $intent->client_secret;

        // 3. Emitir un evento para inicializar Stripe en el frontend.
        $this->dispatch('stripe-intent-created', [
            'clientSecret' => $this->clientSecret,
            'publicKey' => config('services.stripe.public_key'),
        ]);
    }


    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.cart');
    }
}
