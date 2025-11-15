<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Lunar\Facades\CartSession;

class HeaderTienda extends Component
{

   public $cartQuantity;

    // Haz el argumento OPCIONAL con un valor por defecto.
    public function __construct($cartQuantity = null)
    {
        // Si el valor NO fue pasado por el layout (es decir, es null), lo cargamos.
        if (is_null($cartQuantity)) {
            // Lógica para obtener el total del modelo CartSession
            // REEMPLAZA CartSession::getTotalItems() con tu método real.
            if(!CartSession::current()) {
                $this->cartQuantity = 0;
                return;
            }
            $this->cartQuantity = CartSession::current()->lines()->count();
        } else {
            // Si el layout SÍ lo pasó (por ejemplo, si lo pasaste como :cartQuantity="12")
            $this->cartQuantity = $cartQuantity;
        }

    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.headerTienda');
    }
}
