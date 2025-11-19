<?php

namespace App\Livewire;

use FontLib\Table\Type\name;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Lunar\Models\Product;

class Servicios extends Component
{

    //array de ejemplo para mostrar en la vista
   public $servicios = [];
    public $media = [];

    public function mount()
    {
        $this->servicios = Product::where('status', 'published')->with(['media','variants'])->get();

    }


    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.servicios' );
    }
}
