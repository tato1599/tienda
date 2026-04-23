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
    public $category = '';

    protected $categoryKeywords = [
        'Software' => ['software', 'windows', 'formateo', 'instalacion', 'office', 'programacion', 'aplicacion', 'script'],
        'Hardware' => ['hardware', 'pc', 'laptop', 'limpieza', 'pasta', 'armado', 'reparacion', 'componente'],
        'Redes'    => ['red', 'wifi', 'router', 'configuracion', 'redes', 'conectividad'],
        'Soporte'  => ['soporte', 'remoto', 'ayuda', 'tecnico', 'asistencia', 'diagnostico'],
    ];

    #[Layout('layouts.guest')]
    public function render()
    {
        $query = Product::where('status', 'published')
            ->with(['media', 'variants.prices.currency', 'variants.prices.priceable']);

        if ($this->search) {
            $query->where('attribute_data', 'like', '%' . $this->search . '%');
        }

        if ($this->category && isset($this->categoryKeywords[$this->category])) {
            $keywords = $this->categoryKeywords[$this->category];
            $query->where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $q->orWhere('attribute_data', 'like', '%' . $keyword . '%');
                }
            });
        }

        return view('livewire.servicios', [
            'servicios' => $query->paginate(8),
        ]);
    }

    public function selectCategory($category)
    {
        $this->category = $category;
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
