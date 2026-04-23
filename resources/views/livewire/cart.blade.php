<div class="relative min-h-screen w-full bg-background overflow-hidden">
    <!-- Ambient Background -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="tech-pattern absolute inset-0 opacity-40"></div>
        <div class="absolute top-[10%] -left-[5%] w-[40%] h-[40%] bg-primary/10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[10%] -right-[5%] w-[40%] h-[40%] bg-blue-500/5 blur-[120px] rounded-full"></div>
    </div>

    <main class="relative z-10 container mx-auto flex-1 px- gutter py-12 sm:px-6 lg:px-8">
        <!-- Breadcrumbs & Heading -->
        <div class="mb-12 animate-fade-in">
            <nav class="flex flex-wrap gap-3 items-center mb-6">
                <a class="text-xs font-bold uppercase tracking-widest text-on-surface-variant hover:text-primary transition-colors" href="/" wire:navigate>Inicio</a>
                <span class="text-on-surface/10 text-xs">/</span>
                <a class="text-xs font-bold uppercase tracking-widest text-on-surface-variant hover:text-primary transition-colors" href="{{ route('servicios') }}" wire:navigate>Servicios</a>
                <span class="text-on-surface/10 text-xs">/</span>
                <span class="text-xs font-bold uppercase tracking-widest text-primary">Carrito</span>
            </nav>
            <div class="flex flex-wrap items-end justify-between gap-6">
                <h1 class="text-4xl md:text-5xl font-black leading-tight tracking-tight text-on-surface bg-gradient-to-br from-on-surface via-on-surface to-primary bg-clip-text text-transparent">
                    Tu Carrito <span class="text-primary tracking-tighter">.</span>
                </h1>
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-on-surface-variant">
                    {{ count($purchasableItemsMap) }} Servicios Seleccionados
                </p>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12">
            
            <!-- Left Column: Cart Items -->
            <div class="lg:col-span-7 space-y-6">
                @if ( empty($purchasableItemsMap) )
                    <div class="glass-card p-20 flex flex-col items-center justify-center text-center opacity-50 rounded-3xl">
                        <span class="material-symbols-outlined text-8xl mb-4">shopping_cart_off</span>
                        <p class="text-xl font-bold italic">Tu carrito está vacío.</p>
                        <a href="{{ route('servicios') }}" wire:navigate class="mt-8 text-primary font-bold hover:underline">Explorar Catálogo</a>
                    </div>
                @else
                    @foreach ($purchasableItemsMap as $item)
                        <div wire:key="cart-item-{{ $item['purchasable_id'] }}"
                             class="glass-card group flex flex-col gap-6 p-6 sm:flex-row sm:items-center sm:justify-between rounded-2xl border border-outline-variant/20 hover:border-primary/30 transition-all duration-300 shadow-xl overflow-hidden relative">
                            
                            <!-- Product Info -->
                            <div class="flex items-center gap-6">
                                <div class="relative h-24 w-24 flex-shrink-0 rounded-xl overflow-hidden border border-outline-variant/20">
                                    @if($item['media']->first())
                                        <img src="{{ $item['media']->first()->getUrl() }}"
                                             alt="{{ $item['name'] }}" 
                                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                    @else
                                        <div class="w-full h-full bg-surface-container flex items-center justify-center">
                                            <span class="material-symbols-outlined text-3xl opacity-20">image</span>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h3 class="text-lg font-bold text-on-surface group-hover:text-primary transition-colors">{{ $item['name'] }}</h3>
                                    <p class="text-xs text-on-surface-variant line-clamp-2 max-w-[300px]">
                                        {{ $item['description'] }}
                                    </p>
                                    <p class="mt-2 text-primary font-black text-lg sm:hidden">
                                        ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                    </p>
                                </div>
                            </div>

                            <!-- Actions & Pricing -->
                            <div class="flex items-center justify-between gap-8 sm:justify-end">
                                <!-- Quantity Control -->
                                <div class="flex items-center gap-4 px-4 py-2 bg-on-surface/5 rounded-full border border-outline-variant/20">
                                    <button wire:click="changeQuantity('{{ $item['purchasable_id'] }}', -1)"
                                            wire:loading.attr="disabled"
                                            class="w-8 h-8 flex items-center justify-center rounded-full text-on-surface hover:bg-on-surface/10 transition-colors text-xl font-black">
                                        -
                                    </button>
                                    <span class="text-lg font-black text-on-surface w-4 text-center">{{ $item['quantity'] }}</span>
                                    <button wire:click="changeQuantity('{{ $item['purchasable_id'] }}', 1)"
                                            wire:loading.attr="disabled"
                                            class="w-8 h-8 flex items-center justify-center rounded-full text-primary hover:bg-on-surface/10 transition-colors text-xl font-black">
                                        +
                                    </button>
                                </div>

                                <!-- Total Price -->
                                <div class="hidden sm:flex flex-col items-end min-w-[120px]">
                                    <span class="text-[10px] uppercase font-black tracking-widest text-on-surface-variant">Subtotal</span>
                                    <p class="text-xl font-black text-on-surface">
                                        ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                    </p>
                                </div>

                                <!-- Remove -->
                                <button wire:click="confirmDelete('{{ $item['purchasable_id'] }}')"
                                        class="p-2 text-on-surface-variant hover:text-red-500 transition-colors group/del">
                                    <span class="material-symbols-outlined text-2xl group-hover/del:scale-110 transition-transform">close</span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif
                
                <a class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-on-surface-variant hover:text-primary transition-all group pt-6"
                   href="{{ route('servicios') }}" wire:navigate>
                    <span class="material-symbols-outlined text-sm group-hover:-translate-x-1 transition-transform">arrow_back</span>
                    Seguir Explorando Servicios
                </a>
            </div>

            <!-- Right Column: Order Summary & Checkout -->
            <div class="lg:col-span-5">
                <div class="sticky top-24 space-y-6">
                    <div class="glass-card p-8 rounded-3xl border border-white/10 shadow-2xl relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-8 opacity-5">
                            <span class="material-symbols-outlined text-8xl">payments</span>
                        </div>

                        <h3 class="text-xl font-black text-on-surface flex items-center gap-3 mb-8">
                            <span class="h-4 w-1 bg-primary"></span>
                            Resumen de Pedido
                        </h3>

                        @if (empty($cartPrices))
                            <p class="text-center text-on-surface-variant">No hay artículos.</p>
                        @else
                            <div class="space-y-4 mb-8">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-on-surface-variant font-bold uppercase tracking-widest">Base</span>
                                    <span class="font-bold text-on-surface">{{$cartPrices->subTotal?->formatted() }}</span>
                                </div>
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-on-surface-variant font-bold uppercase tracking-widest">Impuestos (16%)</span>
                                    <span class="font-bold text-on-surface">{{$cartPrices->taxTotal?->formatted() }}</span>
                                </div>
                                <div class="h-px bg-outline-variant/20 my-4"></div>
                                <div class="flex justify-between items-end">
                                    <span class="text-lg font-black text-on-surface uppercase tracking-tighter">Total Final</span>
                                    <span class="text-3xl font-black text-primary">{{$cartPrices->total?->formatted() }}</span>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <!-- Address Section -->
                                @if(!$addressSaved)
                                    <div class="space-y-4 animate-fade-in">
                                        <h4 class="text-xs font-black uppercase tracking-[0.2em] text-primary">Información de Facturación</h4>
                                        <div class="grid grid-cols-2 gap-3">
                                            <div class="flex flex-col gap-1">
                                                <input wire:model="firstName" type="text" placeholder="Nombre" 
                                                       class="w-full rounded-xl bg-on-surface/5 border-outline-variant/20 text-on-surface text-sm placeholder:text-on-surface-variant/40 focus:border-primary/50 focus:ring-0 transition-all">
                                            </div>
                                            <div class="flex flex-col gap-1">
                                                <input wire:model="lastName" type="text" placeholder="Apellidos" 
                                                       class="w-full rounded-xl bg-on-surface/5 border-outline-variant/20 text-on-surface text-sm placeholder:text-on-surface-variant/40 focus:border-primary/50 focus:ring-0 transition-all">
                                            </div>
                                        </div>
                                        <input wire:model="lineOne" type="text" placeholder="Dirección Línea 1" 
                                               class="w-full rounded-xl bg-on-surface/5 border-outline-variant/20 text-on-surface text-sm placeholder:text-on-surface-variant/40 focus:border-primary/50 focus:ring-0 transition-all">
                                        <div class="grid grid-cols-2 gap-3">
                                            <input wire:model="city" type="text" placeholder="Ciudad" 
                                                   class="w-full rounded-xl bg-on-surface/5 border-outline-variant/20 text-on-surface text-sm placeholder:text-on-surface-variant/40 focus:border-primary/50 focus:ring-0 transition-all">
                                            <input wire:model="state" type="text" placeholder="Estado" 
                                                   class="w-full rounded-xl bg-on-surface/5 border-outline-variant/20 text-on-surface text-sm placeholder:text-on-surface-variant/40 focus:border-primary/50 focus:ring-0 transition-all">
                                        </div>
                                        <div class="grid grid-cols-2 gap-3">
                                            <input wire:model="postcode" type="text" placeholder="Código Postal" 
                                                   class="w-full rounded-xl bg-on-surface/5 border-outline-variant/20 text-on-surface text-sm placeholder:text-on-surface-variant/40 focus:border-primary/50 focus:ring-0 transition-all">
                                            <select wire:model="countryId" class="w-full rounded-xl bg-on-surface/5 border-outline-variant/20 text-on-surface text-sm focus:border-primary/50 focus:ring-0">
                                                <option value="143" class="bg-background text-on-surface">México</option>
                                            </select>
                                        </div>
                                        
                                        <button wire:click="saveAddress"
                                                class="w-full bg-on-surface/5 border border-outline-variant/20 py-4 rounded-2xl font-black text-on-surface hover:bg-primary hover:text-on-primary transition-all hover:scale-[1.02] shadow-xl">
                                            Continuar al Pago
                                        </button>
                                    </div>
                                @else
                                    <div class="glass-card p-4 rounded-2xl border border-primary/20 bg-primary/5 animate-fade-in">
                                        <div class="flex justify-between items-center mb-3">
                                            <h4 class="text-primary text-[10px] font-black uppercase tracking-widest">Enviar a:</h4>
                                            <button wire:click="$set('addressSaved', false)" class="text-[10px] font-bold text-on-surface hover:underline bg-on-surface/5 px-3 py-1 rounded-full uppercase tracking-tighter transition-all">Editar</button>
                                        </div>
                                        <div class="text-sm font-medium text-on-surface space-y-1">
                                            <p class="font-bold">{{ $firstName }} {{ $lastName }}</p>
                                            <p class="text-xs opacity-60">{{ $lineOne }}</p>
                                            <p class="text-xs opacity-60">{{ $city }}, {{ $state }} {{ $postcode }}</p>
                                        </div>
                                    </div>

                                    @if($paymentIntentClientSecret)
                                        <div id="stripe-container" class="animate-fade-in">
                                            <h4 class="text-xs font-black uppercase tracking-[0.2em] text-primary mb-4">Detalles de Pago</h4>
                                            <div id="payment-element" class="p-4 bg-on-surface/5 border border-outline-variant/20 rounded-2xl mb-6"></div>
                                            
                                            <button id="submit-payment"
                                                    class="w-full bg-primary text-on-primary py-5 rounded-2xl font-black text-xl hover:scale-[1.02] active:scale-95 transition-all shadow-[0_0_30px_rgba(0,174,239,0.3)] flex items-center justify-center gap-3">
                                                <span class="material-symbols-outlined text-2xl font-black">lock</span>
                                                Pagar Ahora
                                            </button>
                                            
                                            <div id="error-message" class="text-red-500 mt-4 text-xs font-bold text-center hidden"></div>

                                            <script src="https://js.stripe.com/v3/"></script>
                                            <script>
                                                document.addEventListener('livewire:initialized', () => {
                                                    const stripe = Stripe('{{ $stripeKey }}');
                                                    const options = {
                                                        clientSecret: '{{ $paymentIntentClientSecret }}',
                                                        appearance: {
                                                            theme: 'night',
                                                            variables: {
                                                                colorPrimary: '#00AEEF',
                                                                colorBackground: '#0b1120',
                                                                colorText: '#ffffff',
                                                                borderRadius: '16px',
                                                            }
                                                        },
                                                    };
                                                    const elements = stripe.elements(options);
                                                    const paymentElement = elements.create('payment');
                                                    paymentElement.mount('#payment-element');

                                                    const submitBtn = document.getElementById('submit-payment');
                                                    const errorMsg = document.getElementById('error-message');

                                                    submitBtn.addEventListener('click', async (e) => {
                                                        e.preventDefault();
                                                        submitBtn.disabled = true;
                                                        const originalText = submitBtn.innerHTML;
                                                        submitBtn.innerHTML = '<span class="material-symbols-outlined animate-spin">refresh</span> Procesando...';

                                                        const { error } = await stripe.confirmPayment({
                                                            elements,
                                                            confirmParams: {
                                                                return_url: '{{ route("checkout.success") }}', 
                                                            },
                                                        });

                                                        if (error) {
                                                            submitBtn.disabled = false;
                                                            submitBtn.innerHTML = originalText;
                                                            errorMsg.innerText = error.message;
                                                            errorMsg.classList.remove('hidden');
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modals -->
    @if($confirmingDeletion)
        <div class="fixed inset-0 z-[100] flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-background/80 backdrop-blur-sm" wire:click="$set('confirmingDeletion', false)"></div>
            <div class="glass-card relative z-110 w-full max-w-md p-8 rounded-3xl border border-outline-variant/20 shadow-3xl animate-in zoom-in duration-200">
                <h4 class="text-xl font-black text-on-surface mb-2">¿Eliminar servicio?</h4>
                <p class="text-on-surface-variant text-sm mb-8">Esta acción quitará el servicio de tu carrito de compras.</p>
                <div class="flex gap-4">
                    <button wire:click="$set('confirmingDeletion', false)" class="flex-1 py-3 rounded-xl border border-outline-variant/20 font-bold text-on-surface hover:bg-on-surface/5 transition-all text-sm">
                        Cancelar
                    </button>
                    <button wire:click="deleteItem" class="flex-1 py-3 rounded-xl bg-red-500/20 text-red-500 border border-red-500/30 font-bold hover:bg-red-500 hover:text-on-primary transition-all text-sm">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
