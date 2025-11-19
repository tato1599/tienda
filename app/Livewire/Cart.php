<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Lunar\Facades\CartSession;
use Lunar\Models\CartLine;
use Mary\Traits\Toast;
use Lunar\Models\Order; // Importar el modelo Order
use Exception; // Importar la clase base de excepciones

class Cart extends Component
{
    use Toast;
    public $cart;
    public $purchasableItemsMap = [];

    public $cartPrices;

    public function mount()
    {
        $currentCart = CartSession::current();

        if (!$currentCart) {
           return;
        }

        // Calcular cartPrices solo si hay un carrito,
        // y la lógica de la vista DEBE manejar si $cartPrices es null
        // (usando el operador ?-> como se recomendó antes para evitar el error 'decimal() on null')
        $this->cart = $currentCart->lines()->get();
        $this->cartPrices = $currentCart->calculate();

        $this->purchasableItemsMap = $this->cart
             ->filter(fn($line) => $line->purchasable_id)
             ->groupBy('purchasable_id')
             ->map(function ($lines) {
                 $firstLine = $lines->first();
                 $totalQuantity = $lines->sum('quantity');

                 return [
                     'name' => $firstLine->purchasable->product->translateAttribute('name'),
                     'description' => $firstLine->purchasable->product->translateAttribute('description'),
                     // Si el error de 'decimal() on null' persiste aquí, necesitas más comprobaciones:
                     'price' => optional($firstLine->purchasable->product->variant->prices()->first())->price->decimal,
                     'quantity' => $totalQuantity,
                     'media' => $firstLine->purchasable->product->media,
                 ];
             })
             ->values();
    }

    // ----------------------------------------------------------------------
    // Función para crear la orden
    // ----------------------------------------------------------------------
    public function checkout()
    {
        $currentCart = CartSession::current();

        // 1. Verificación básica del carrito
        if (!$currentCart) {
            $this->error('No hay un carrito activo para crear una orden.');
            return;
        }

        // 2. Validar si el carrito está listo para crear la orden
        if (! $currentCart->canCreateOrder()) {
            $this->warning('El carrito no está listo para finalizar. Revisa los detalles de envío/dirección.', 'Revisar Carrito');
            return;
        }

        try {
            // 3. Crear la Orden
            /** @var \Lunar\Models\Order $order */
            $order = $currentCart->createOrder();

            // 4. (Opcional) Establecer un estado inicial. Asume que 'awaiting-payment' existe.
            $order->update([
                'status' => 'awaiting-payment',
            ]);

            // 5. Eliminar el carrito original (ya se convirtió en orden)
            $currentCart->delete();

            // 6. Notificación y Redirección
            $this->success('Orden creada exitosamente.', 'Éxito');

            // Redirigir a una página de resumen de orden.
            // Asegúrate de que esta ruta exista.
            // return $this->redirect(route('order.summary', $order->reference), navigate: true);

        } catch (Exception $e) {
            // Manejo de errores durante la creación
            $this->error('Error al crear la orden.', $e->getMessage());
            // Opcional: \Log::error("Error de creación de orden: {$e->getMessage()}");
            return;
        }
    }

    // ----------------------------------------------------------------------
    // Renderizado
    // ----------------------------------------------------------------------
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.cart');
    }
}
