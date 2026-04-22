<div x-data="{ open: false }" class="relative">
    <button x-on:click="open = ! open" type="button"
        class="flex items-center gap-2 text-on-surface-variant hover:text-primary transition-all group p-2 rounded-full hover:bg-white/5">
        <div class="relative">
            <span class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">shopping_cart</span>
            @if ($cartQuantity > 0)
                <div class="absolute -top-1.5 -right-1.5 inline-flex items-center justify-center w-4 h-4 text-[10px] font-bold text-black bg-primary rounded-full shadow-sm">
                    {{ $cartQuantity }}
                </div>
            @endif
        </div>
        <span class="hidden sm:inline text-sm font-bold">
            Mi carrito
        </span>
        <span class="material-symbols-outlined text-sm transition-transform duration-300" :class="open ? 'rotate-180' : ''">expand_more</span>
    </button>
    <!-- Dropdown Menu -->
    <div x-show="open" @click.away="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" 
        class="z-50 absolute right-0 mt-4 w-80 glass-card rounded-xl p-4 shadow-2xl backdrop-blur-2xl">
        
        <div class="border-b border-white/5 pb-3 mb-4 flex justify-between items-center">
            <p class="text-xs font-bold text-primary tracking-widest uppercase font-space-grotesk">Tu Carrito</p>
            <span class="text-[10px] text-on-surface-variant bg-white/5 px-2 py-0.5 rounded-full">{{ $cartQuantity }} artículos</span>
        </div>

        <div class="max-h-[400px] overflow-y-auto custom-scrollbar space-y-4">
            @forelse ($cartItems as $item)
                <div class="flex items-center gap-4 group/item">
                    <div class="h-16 w-16 shrink-0 overflow-hidden rounded-lg border border-white/5 bg-surface-container transition-transform group-hover/item:scale-105">
                         @if($item->purchasable->product->thumbnail)
                            <img class="h-full w-full object-cover"
                                src="{{ $item->purchasable->product->thumbnail->getUrl() }}"
                                alt="{{ $item->purchasable->product->translateAttribute('name') }}" />
                        @else
                            <div class="flex h-full w-full items-center justify-center text-on-surface-variant">
                                <span class="material-symbols-outlined">image</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex-1 min-w-0">
                        <a href="{{ route('product', $item->purchasable->product->getRouteKey()) }}"
                            class="block truncate text-sm font-bold text-white hover:text-primary transition-colors">{{ $item->purchasable->product->translateAttribute('name') }}</a>
                        <div class="mt-1 flex items-center justify-between">
                            <p class="text-xs text-on-surface-variant">Cant: {{ $item->quantity }}</p>
                            <p class="text-sm font-black text-primary">{{ $item->unitPrice->formatted }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-12 text-center">
                    <span class="material-symbols-outlined text-4xl text-white/10 mb-2">shopping_bag</span>
                    <p class="text-sm text-on-surface-variant">Tu carrito está vacío</p>
                </div>
            @endforelse
        </div>

        @if($cartItems->isNotEmpty())
            <div class="mt-6 pt-4 border-t border-white/5 space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-on-surface-variant">Subtotal</span>
                    <span class="text-lg font-black text-white">{{ $cart->subTotal->formatted() }}</span>
                </div>
                
                <a href="{{ route('cart') }}" 
                   class="btn-premium"> 
                   Ver carrito Completo 
                   <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </a>
            </div>
        @endif
    </div>
</div>

