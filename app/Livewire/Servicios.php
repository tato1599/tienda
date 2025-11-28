<?php

namespace App\Livewire;

use FontLib\Table\Type\name;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Lunar\Models\Product;

class Servicios extends Component
{

    //array de ejemplo para mostrar en la vista
    public $search = '';
    public $servicios = [];

    #[Layout('layouts.guest')]
    public function render()
    {
        $query = Product::where('status', 'published')
            ->with(['media', 'variants']);

        if ($this->search) {
            $query->where('attribute_data', 'like', '%' . $this->search . '%');
        }

        $this->servicios = $query->get();

        return view('livewire.servicios');
    }
}
