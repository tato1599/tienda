<div class="text-white flex flex-col items-center space-y-4 p-6 bg-gray-800 rounded-lg shadow-lg">

    <section class="flex gap-4">

        <div class="gap-6 flex flex-col items-center mr-8">
            <img src="{{ asset($this->product->getFirstMediaUrl('images')) }}" alt="{{ $this->product->name }}"
                class="w-64 h-64 object-cover mb-4">
        </div>

        <div class="mr-6 text-2xl font-bold gap-4">
            <div>
                {{ $this->product->translateAttribute('name') }}
                <span class="text-gray-400">{{ $this->product->translateAttribute('marca') }}</span>
            </div>
            <div class="text-xl text-green-500">
                {{ $this->product->variants->first()?->price?->formatted ?? 'Precio no disponible' }}
            </div>
            <div>
                {{ $this->product->translateAttribute('description') }}
            </div>
        </div>
    </section>

    <div>

        <div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                wire:click="addToCart"
            >
                Agregar al carrito
            </button>
        </div>

    </div>
