<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Lunar\Models\Product;

class Servicios extends Component
{
    use WithPagination;

    public $search = '';

    #[Layout('layouts.guest')]
    public function render()
    {
        $query = Product::where('status', 'published')
            ->with(['media', 'variants.prices.currency', 'variants.prices.priceable']);

        if ($this->search) {
            $query->where('attribute_data', 'like', '%' . $this->search . '%');
        }

        return view('livewire.servicios', [
            'servicios' => $query->paginate(8),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
