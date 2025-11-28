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
    public $paymentIntentClientSecret;
    public $stripeKey;

    // Address Fields
    public $firstName = '';
    public $lastName = '';
    public $lineOne = '';
    public $city = '';
    public $state = '';
    public $postcode = '';
    public $countryId = 143; // Mexico default
    
    public $addressSaved = false;

    public function mount()
    {
        $this->stripeKey = env('STRIPE_PK');
        $currentCart = CartSession::current();

        if (!$currentCart) {
           return;
        }

        $this->cart = $currentCart->lines()->get();
        $this->cartPrices = $currentCart->calculate();
        
        // Load existing address if available
        if ($shippingAddress = $currentCart->shippingAddress) {
            $this->firstName = $shippingAddress->first_name;
            $this->lastName = $shippingAddress->last_name;
            $this->lineOne = $shippingAddress->line_one;
            $this->city = $shippingAddress->city;
            $this->state = $shippingAddress->state;
            $this->postcode = $shippingAddress->postcode;
            $this->countryId = $shippingAddress->country_id;
            $this->addressSaved = true;
        } else {
             // Pre-fill with user data
             $user = auth()->user();
             if($user) {
                 $this->firstName = $user->name;
                 $this->lastName = '.';
                 $this->countryId = 143;
             }
        }

        // Ensure shipping option is set if address is present
        if ($this->addressSaved && !$currentCart->shippingOption) {
             $shippingOptions = \Lunar\Facades\ShippingManifest::getOptions($currentCart);
             if ($option = $shippingOptions->first()) {
                 $currentCart->setShippingOption($option);
                 $currentCart->save();
             }
        }

        // Only create intent if address is saved
        if ($this->addressSaved) {
            try {
                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $intent = \Lunar\Stripe\Facades\Stripe::createIntent($currentCart);
                
                if ($intent->status === 'succeeded') {
                    $this->redirect(route('checkout.success'));
                    return;
                }

                $this->paymentIntentClientSecret = $intent->client_secret;
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Stripe createIntent error in mount: ' . $e->getMessage());
            }
        }

        $this->purchasableItemsMap = $this->cart
             ->filter(fn($line) => $line->purchasable_id)
             ->groupBy('purchasable_id')
             ->map(function ($lines) {
                 $firstLine = $lines->first();
                 $totalQuantity = $lines->sum('quantity');

                 return [
                     'name' => $firstLine->purchasable->product->translateAttribute('name'),
                     'description' => $firstLine->purchasable->product->translateAttribute('description'),
                     'price' => optional($firstLine->purchasable->product->variant->prices()->first())->price->decimal,
                     'quantity' => $totalQuantity,
                     'media' => $firstLine->purchasable->product->media,
                 ];
             })
             ->values();
    }

    public function saveAddress()
    {
        $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'lineOne' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'countryId' => 'required',
        ]);

        $cart = CartSession::current();
        $user = auth()->user();
        
        $addressData = [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'line_one' => $this->lineOne,
            'city' => $this->city,
            'state' => $this->state,
            'postcode' => $this->postcode,
            'country_id' => $this->countryId,
            'contact_email' => $user->email ?? 'guest@example.com',
            'type' => 'shipping',
        ];

        // Save Shipping Address
        $cart->setShippingAddress($addressData);
        
        // Save Billing Address
        $billingData = $addressData;
        $billingData['type'] = 'billing';
        $cart->setBillingAddress($billingData);

        $this->addressSaved = true;

        // Auto-select first shipping option
        $shippingOptions = \Lunar\Facades\ShippingManifest::getOptions($cart);
        if ($option = $shippingOptions->first()) {
            $cart->setShippingOption($option);
            $cart->save();
        }

        // Create Payment Intent now that we have an address
        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $intent = \Lunar\Stripe\Facades\Stripe::createIntent($cart);

            if ($intent->status === 'succeeded') {
                $this->redirect(route('checkout.success'));
                return;
            }

            $this->paymentIntentClientSecret = $intent->client_secret;
        } catch (\Exception $e) {
            $this->error('Error creating payment intent: ' . $e->getMessage());
        }
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
