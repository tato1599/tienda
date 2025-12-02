<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Lunar\Facades\CartSession;
use Lunar\Facades\Payments;
use Lunar\Models\Cart;
use Lunar\Models\CartLine;
use Lunar\Models\Contracts\Product;
use Lunar\Models\Product as ModelsProduct;
use Lunar\Models\ProductVariant;

use Mary\Traits\Toast;
use function Laravel\Prompts\search;

class ProductShow extends Component
{
    public $product;
    public $media;

    public $cartQuantity = 0;


    public $variants;

    use Toast;

    public function mount($product)
    {


        $this->searchProducts($product);
    }

    // Aqui se busca los productos
    public function searchProducts($product)
    {
        $this->product = ModelsProduct::where('id', $product->id)
            ->with(['media', 'prices', 'variants'])->first(); //esto devuelve el primer producto que coincide con el id
        // y tambien carga las relaciones media, prices y variants que contiene el producto
        // es decir la imagen, los precios y las variantes del producto (como version a instalar del programa, por ejemplo)
        $this->media = $this->product->media; // aqui se asigna a la varaible media las imagenes del producto
        $this->variants = $this->product->variants; // aqui se asigna a la variable variants las variantes del producto (si es que las tiene)
    }


    public function processPayment(Cart $cart, string $paymentType, array $data)
    {
        // 1. Obtener el driver de pago (Ej. 'card' o 'cash-in-hand (que es pago en efectivo)')
        $driver = Payments::driver($paymentType);

        // 2. Asignar el carrito y los datos adicionales (token de pago, etc.)
        $driver->cart($cart);
        $driver->withData($data);

        // 3. Autorizar el pago
        $result = $driver->authorize();

        // 4. Devolver el resultado (generalmente una respuesta de transacción)
        return $result;
    }

    // Esta funcion agrega el producto al carrito de compras
    #[On('addToCart')]
    public function addToCart()
    {
        try { // primero engloba todo en un bloque try para capturar errores
            $cartSession = CartSession::current(); // esto obtiene la sesion actual del carrito de compras

            if (!$cartSession) { // si no hay un carrito asociado a la sesion actual
                // crea un nuevo carrito
                $cart = Cart::create(
                    [
                        // 'user_id' => auth()->id(), // asigna el id del usuario autenticado
                        // 'customer_id' => null, // asigna null al id del cliente (puede ser util para carritos de invitados)
                        'currency_id' => '1', // asigna la moneda con id 1 (Es pesos mexicanos)
                        'channel_id' => '1', // asigna el canal con id 1 (es la tienda principal)
                    ]
                );

                $cartSession = CartSession::use($cart);

            }

            $purchasable = ProductVariant::find($this->variants->first()->id); // obtiene la primera variante del producto
            
            $existingLine = $cartSession->lines()
                ->where('purchasable_type', $purchasable->getMorphClass())
                ->where('purchasable_id', $purchasable->id)
                ->first();

            if ($existingLine) {
                $cartSession->updateLine($existingLine->id, $existingLine->quantity + 1);
            } else {
                // (en este caso solo hay una variante que es la version completa)
                $cartLine = new CartLine(
                    //crea una nueva linea de carrito con los siguientes datos
                    [
                        'cart_id' => $cartSession->id, // asigna el id del carrito actual
                        'purchasable_type' => $purchasable->getMorphClass(), // asigna el tipo de producto que se esta comprando
                        // getmorphclass devuelve el nombre de la clase del modelo en formato morfologico para relaciones polimorficas
                        'purchasable_id' => $purchasable->id, // asigna el id del producto que se esta comprando
                        'quantity' => 1, // asigna la cantidad a comprar (en este caso 1)
                    ]
                );
    
                $cartSession->lines()->create($cartLine->toArray()); // guarda la linea de carrito en el carrito actual
            }
            $cartSession->calculate();
            $this->toast(
                type: 'success',
                title: 'Producto agregado al carrito',
                description: 'El producto se ha agregado correctamente a tu carrito de compras.',
                css: "bg-green-500 text-white",         // optional (tailwind classes)
                timeout: 3000,                      // optional (ms)
                redirectTo: null                    // optional (uri)
            );
            $this->dispatch('cart-updated');

        } catch (\Exception $e) { // si ocurre algun error durante el proceso
            report($e); // reporta el error para su revision
            $this->error('Error', 'No se pudo agregar el producto al carrito.');
            session()->flash('error', 'Could not add product to cart.');
            // muestra un mensaje de error en la sesion
        }

    }


    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.product-show');
    }
}
