

    <div class="relative flex min-h-screen w-full flex-col">

        <main class="container mx-auto flex-1 px-4 py-8 sm:px-6 lg:px-8">
            <!-- Breadcrumbs & Heading -->
            <div class="mb-8">
                <div class="flex flex-wrap gap-2">
                    <a class="text-base font-medium leading-normal text-[#9dabb9] hover:text-primary"
                        href="/">Inicio</a>
                    <span class="text-base font-medium leading-normal text-[#9dabb9]">/</span>
                    <a class="text-base font-medium leading-normal text-[#9dabb9] hover:text-primary"
                        href="{{ route('servicios') }}">Servicios</a>
                    <span class="text-base font-medium leading-normal text-[#9dabb9]">/</span>
                    <span class="text-base font-medium leading-normal text-white">
                        Carrito de Compras
                    </span>
                </div>
                <div class="mt-4 flex flex-wrap items-baseline justify-between gap-3">
                    <p class="text-4xl font-black leading-tight tracking-[-0.033em] text-white min-w-72">Tu carrito</p>
                    <p class="text-base font-medium text-[#9dabb9]">{{ count($purchasableItemsMap) }} artículos</p>
                </div>
            </div>
            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 lg:gap-12">
                <!-- Left Column: Cart Items -->
                <div class="space-y-4 lg:col-span-2">
                    <!-- Item 1 -->
                    @if ( empty($purchasableItemsMap) )
                        <p class="text-center text-white">Tu carrito está vacío.</p>

                    @else
                        @foreach ($purchasableItemsMap as $item)
                        <div
                        class="flex flex-col gap-4 rounded-lg bg-white/5 p-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center gap-4">
                            <div class="h-20 w-20 flex-shrink-0 rounded-lg bg-cover bg-center bg-no-repeat"
                                data-alt="Icon for network configuration service"
                               >
                                <img src="{{ asset($item['media']->first()->getUrl()) }}"
                                alt="Service Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <p class="text-lg font-medium leading-normal text-white">{{ $item['name'] }}</p>
                                <p class="text-sm font-normal leading-normal text-[#9dabb9]">
                                    {{ $item['description'] }}
                                </p>
                                <p class="mt-1 text-base font-bold text-white sm:hidden">$
                                    {{ number_format($item['price'] * $item['quantity'], 2) }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-4 sm:justify-end">
                            <div class="flex items-center gap-2 text-white">
                                <button
                                    class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-white/10 text-xl
                                    font-medium leading-normal transition-colors hover:bg-white/20">-</button>
                                <input
                                    class="w-8 border-none bg-transparent p-0 text-center text-base font-medium leading-normal focus:border-none focus:outline-0 focus:ring-0 [appearance:textfield] [&amp;::-webkit-inner-spin-button]:appearance-none [&amp;::-webkit-outer-spin-button]:appearance-none"
                                    type="number" value="{{ $item['quantity'] }}" />
                                <button
                                    class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-white/10 text-xl
                                    font-medium leading-normal transition-colors hover:bg-white/20">+</button>
                            </div>
                            <p class="hidden w-20 text-right text-base font-bold text-white sm:block">$
                                {{ number_format($item['price'] * $item['quantity'], 2) }}
                            </p>
                            <button class="cursor-pointer text-[#9dabb9] transition-colors hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endforeach
                    @endif


                </div>
                <!-- Right Column: Order Summary -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24 rounded-lg bg-white/5 p-6">
                        <h3 class="text-xl font-bold text-white">Resumen de Pedido

                        </h3>
                        @if (empty($cartPrices))
                            <p class="text-center text-white mt-4">No hay artículos en el carrito.</p>
                        @else
                        <div class="mt-6 space-y-4 border-b border-white/10 pb-6">
                            <div class="flex justify-between text-base">
                                <span class="text-[#9dabb9]">Subtotal</span>
                                <span class="font-medium text-white">{{$cartPrices->subTotal?->formatted() }}</span>
                            </div>
                            <div class="flex justify-between text-base">
                                <span class="text-[#9dabb9]">Impuesto (IVA 16%)</span>
                                <span class="font-medium text-white">{{$cartPrices->taxTotal?->formatted() }}</span>
                            </div>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <span class="text-lg font-bold text-white">Total</span>
                            <span class="text-lg font-bold text-white">{{$cartPrices->total?->formatted() }}</span>
                        </div>
                        {{-- <div class="mt-6">
                            <label class="mb-2 block text-sm font-medium text-[#9dabb9]" for="promo-code">Promo
                                Code</label>
                            <div class="flex gap-2">
                                <input
                                    class="w-full flex-grow rounded-lg border-white/20 bg-white/5 text-white placeholder:text-[#9dabb9]/50 focus:border-primary focus:ring-primary"
                                    id="promo-code" placeholder="Enter code" type="text" />
                                <button
                                    class="rounded-lg bg-white/20 px-4 py-2 text-sm font-bold text-white transition-colors hover:bg-white/30">Apply</button>
                            </div>
                        </div> --}}
                        <div class="mt-8 flex flex-col gap-4">
                            <button
                                wire:click="checkout"
                                class="flex w-full cursor-pointer items-center justify-center gap-2 rounded-lg bg-primary py-3 text-base font-bold text-white shadow-lg shadow-primary/20 transition-transform hover:scale-[1.02]">

                                Proceder al Pago
                            </button>
                            <a class="group flex w-full cursor-pointer items-center justify-center gap-2 rounded-lg py-3 text-base font-medium text-[#9dabb9] transition-colors hover:text-white"
                                href="#">
                                 Continuar Comprando
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </main>
    </div>


