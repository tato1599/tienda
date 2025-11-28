<div class="flex flex-col w-full max-w-5xl flex-1 mx-auto py-5 sm:py-10 px-4">
    <!-- Breadcrumbs Component -->
    <div class="flex flex-wrap gap-2 px-4 pb-4">
        <a class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors text-sm font-medium leading-normal" href="/">Inicio</a>
        <span class="text-gray-500 dark:text-gray-400 text-sm font-medium leading-normal">/</span>
        <a class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors text-sm font-medium leading-normal" href="{{ route('servicios') }}">Servicios</a>
        <span class="text-gray-500 dark:text-gray-400 text-sm font-medium leading-normal">/</span>
        <span class="text-gray-900 dark:text-white text-sm font-medium leading-normal">{{ $this->product->translateAttribute('name') }}</span>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
        <!-- Left Column: Image -->
        <div class="w-full">
            <!-- HeaderImage Component -->
            <div class="w-full bg-center bg-no-repeat bg-cover flex flex-col justify-end overflow-hidden bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl min-h-80 sm:min-h-[480px]" 
                 style='background-image: url("{{ asset($this->product->getFirstMediaUrl('images')) }}");'>
            </div>
        </div>
        
        <!-- Right Column: Details -->
        <div class="flex flex-col gap-6">
            <!-- PageHeading Component -->
            <div class="flex flex-col gap-2">
                <p class="text-gray-500 dark:text-gray-400 text-sm font-medium leading-normal tracking-wider uppercase">{{ $this->product->translateAttribute('marca') ?? 'Servicio' }}</p>
                <p class="text-gray-900 dark:text-white text-3xl sm:text-4xl font-black leading-tight tracking-[-0.033em]">{{ $this->product->translateAttribute('name') }}</p>
            </div>
            
            <!-- Price Component -->
            <h1 class="text-gray-900 dark:text-white tracking-light text-4xl font-bold leading-tight">
                ${{ $this->product->variants->first()?->prices->first()?->price->decimal ?? '0.00' }}
            </h1>
            
            <!-- Description & Specs Accordion -->
            <div class="flex flex-col gap-3">
                <details class="group bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden" open="">
                    <summary class="flex items-center justify-between p-4 cursor-pointer list-none">
                        <span class="text-gray-900 dark:text-white font-bold text-base">Descripción Completa</span>
                        <span class="material-symbols-outlined text-gray-500 dark:text-gray-400 transition-transform duration-300 group-open:rotate-180">expand_more</span>
                    </summary>
                    <div class="px-4 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                        {{ $this->product->translateAttribute('description') }}
                    </div>
                </details>
                
                {{-- 
                <details class="group bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                    <summary class="flex items-center justify-between p-4 cursor-pointer list-none">
                        <span class="text-gray-900 dark:text-white font-bold text-base">Especificaciones</span>
                        <span class="material-symbols-outlined text-gray-500 dark:text-gray-400 transition-transform duration-300 group-open:rotate-180">expand_more</span>
                    </summary>
                    <div class="px-4 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                        <ul class="list-disc pl-5 space-y-2">
                            <li>Especificación 1</li>
                            <li>Especificación 2</li>
                        </ul>
                    </div>
                </details> 
                --}}
            </div>
            
            <!-- Info Panel -->
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-900/30 rounded-lg p-4 flex items-center gap-4">
                <span class="material-symbols-outlined text-blue-600 dark:text-blue-400 text-3xl">info</span>
                <div class="flex flex-col">
                    <p class="text-gray-900 dark:text-white font-medium">Disponibilidad Inmediata</p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Tiempo estimado de entrega: 24-48 horas.</p>
                </div>
            </div>
            
            <!-- CTA Button -->
            @auth
                <button wire:click="addToCart" class="flex w-full min-w-[84px] cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-lg h-12 px-6 bg-blue-600 hover:bg-blue-700 text-white text-base font-bold leading-normal tracking-[0.015em] transition-colors">
                    <span class="material-symbols-outlined">add_shopping_cart</span>
                    <span class="truncate">Añadir al Carrito</span>
                </button>
            @endauth
            
            @guest
                <a href="{{ route('login') }}" class="flex w-full min-w-[84px] cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-lg h-12 px-6 bg-blue-600 hover:bg-blue-700 text-white text-base font-bold leading-normal tracking-[0.015em] transition-colors">
                    <span class="material-symbols-outlined">login</span>
                    <span class="truncate">Iniciar sesión para comprar</span>
                </a>
            @endguest
        </div>
    </div>
    
    <!-- Related Services Section (Placeholder) -->
    {{-- 
    <div class="mt-16 sm:mt-24">
        <h2 class="text-gray-900 dark:text-white text-2xl font-bold mb-6 px-4">Servicios Relacionados</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Cards would go here -->
        </div>
    </div> 
    --}}
</div>
