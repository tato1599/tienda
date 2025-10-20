<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Lunar\Models\Contracts\Product;
use Lunar\Models\Product as ModelsProduct;
use Lunar\Models\ProductVariant;

class ProductShow extends Component
{
    public $product;
    public $media;

    public $variants;

    public function mount($product)
    {
        $this->product = ModelsProduct::where('id', $product->id)->with(['media','prices','variants'])->first();
        $this->media = $this->product->media;
        //price de producto
        $this->variants = $this->product->variants;


    }

    public function addToCart()
    {

    }


    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.product-show');
    }
}
