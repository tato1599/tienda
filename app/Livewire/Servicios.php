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
        'Software' => ['software', 'windows', 'formateo', 'formatear', 'instalacion', 'instalar', 'office', 'programacion', 'aplicacion', 'script', 'sistema'],
        'Hardware' => ['hardware', 'pc', 'laptop', 'limpieza', 'pasta', 'armado', 'reparacion', 'componente', 'computadora', 'disco', 'memoria'],
        'Redes'    => ['red', 'wifi', 'router', 'configuracion', 'redes', 'conectividad', 'internet', 'señal', 'repetidor'],
        'Soporte'  => ['soporte', 'remoto', 'ayuda', 'tecnico', 'asistencia', 'diagnostico', 'mantenimiento', 'preventivo'],
    ];

    #[Layout('layouts.guest')]
    public function render()
    {
        $query = Product::where('status', 'published')
            ->with(['media', 'variants.prices.currency', 'variants.prices.priceable']);

        if ($this->search) {
            $query->where('attribute_data', 'ilike', '%' . $this->search . '%');
        }

        if ($this->category && isset($this->categoryKeywords[$this->category])) {
            $keywords = $this->categoryKeywords[$this->category];
            $query->where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $q->orWhere('attribute_data', 'ilike', '%' . $keyword . '%');
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
