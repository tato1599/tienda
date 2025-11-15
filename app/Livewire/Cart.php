<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Cart extends Component
{
    public $cart;

    public function mount()
    {
        $this->cart = session()->get('cart', []); // Obtiene el carrito de la sesion o un array vacio si no existe

    }


    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.cart');
    }
}
