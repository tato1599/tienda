<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Servicios extends Component
{

    //array de ejemplo para mostrar en la vista
   public $servicios = [];

    public function mount()
    {
        $this->servicios = [
            ['nombre' => 'Desarrollo Web', 'descripcion' => 'Creación de sitios web personalizados.'],
            ['nombre' => 'Marketing Digital', 'descripcion' => 'Estrategias de marketing en línea.'],
            ['nombre' => 'Consultoría IT', 'descripcion' => 'Asesoramiento en tecnología de la información.'],
            ['nombre' => 'Diseño Gráfico', 'descripcion' => 'Creación de contenido visual atractivo.'],
            ['nombre' => 'Soporte Técnico', 'descripcion' => 'Asistencia técnica para problemas informáticos.'],
            ['nombre' => 'SEO', 'descripcion' => 'Optimización para motores de búsqueda.'],
        ];
    }


    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.servicios' );
    }
}
