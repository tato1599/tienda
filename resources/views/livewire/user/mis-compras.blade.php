<div class="relative min-h-screen w-full bg-background overflow-hidden">
    <!-- Ambient Background -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="tech-pattern absolute inset-0 opacity-40"></div>
        <div class="absolute top-[10%] -left-[5%] w-[40%] h-[40%] bg-primary/10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[10%] -right-[5%] w-[40%] h-[40%] bg-blue-500/5 blur-[120px] rounded-full"></div>
    </div>

    <main class="relative z-10 container mx-auto py-12 px-6 sm:px-8">
        <!-- Heading -->
        <div class="mb-12 animate-fade-in">
            <nav class="flex items-center gap-3 mb-6">
                <a href="/" wire:navigate class="text-xs font-bold uppercase tracking-widest text-on-surface-variant hover:text-primary transition-colors">Inicio</a>
                <span class="text-on-surface/10 text-xs">/</span>
                <span class="text-xs font-bold uppercase tracking-widest text-primary">Mis Compras</span>
            </nav>
            <div class="flex flex-col gap-2">
                <h1 class="text-4xl md:text-5xl font-black leading-tight tracking-tight text-on-surface bg-gradient-to-br from-on-surface via-on-surface to-primary bg-clip-text text-transparent">
                    Historial de Servicios <span class="text-primary">.</span>
                </h1>
                <p class="text-on-surface-variant text-sm font-medium max-w-2xl">
                    Gestiona tus solicitudes, contacta a los especialistas y revisa el estatus de tus órdenes en tiempo real.
                </p>
            </div>
        </div>

        <!-- Orders List -->
        <div class="space-y-8 max-w-5xl">
            @forelse($orders as $order)
                <div wire:key="order-{{ $order->id }}" 
                     class="glass-card rounded-3xl border border-outline-variant/30 overflow-hidden shadow-2xl hover:border-primary/40 transition-all duration-300">
                    
                    <!-- Order Header -->
                    <div class="bg-on-surface/5 border-b border-outline-variant/20 px-8 py-6 flex flex-wrap items-center justify-between gap-6">
                        <div class="flex items-center gap-8">
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-black uppercase tracking-widest text-on-surface-variant">Referencia</span>
                                <span class="text-lg font-black text-on-surface">{{ $order->reference }}</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-black uppercase tracking-widest text-on-surface-variant">Fecha</span>
                                <span class="text-sm font-bold text-on-surface">{{ $order->placed_at?->format('d M, Y') ?? $order->created_at->format('d M, Y') }}</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-black uppercase tracking-widest text-on-surface-variant">Total</span>
                                <span class="text-sm font-black text-primary">{{ $order->total->formatted() }}</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <!-- Status Badge -->
                            @php
                                $statusColors = [
                                    'awaiting-payment' => 'bg-yellow-500/10 text-yellow-500 border-yellow-500/20',
                                    'payment-received' => 'bg-blue-500/10 text-blue-500 border-blue-500/20',
                                    'dispatched' => 'bg-green-500/10 text-green-500 border-green-500/20',
                                    'cancelled' => 'bg-red-500/10 text-red-500 border-red-500/20',
                                ];
                                $statusLabels = [
                                    'awaiting-payment' => 'Pendiente de Pago',
                                    'payment-received' => 'En Preparación',
                                    'dispatched' => 'Atendido / Terminado',
                                    'cancelled' => 'Cancelado',
                                ];
                                $currentColor = $statusColors[$order->status] ?? 'bg-on-surface/10 text-on-surface-variant border-outline-variant/20';
                                $currentLabel = $statusLabels[$order->status] ?? $order->status;
                            @endphp
                            
                            <span class="px-4 py-1.5 rounded-full border {{ $currentColor }} text-[10px] font-black uppercase tracking-widest shadow-sm">
                                {{ $currentLabel }}
                            </span>
                        </div>
                    </div>

                    <!-- Order Lines -->
                    <div class="p-8 space-y-6">
                        @foreach($order->lines as $line)
                            @if($line->purchasable)
                                <div class="flex flex-col sm:flex-row items-center justify-between gap-8 group">
                                    <div class="flex items-center gap-6 flex-1">
                                        <div class="relative h-20 w-20 flex-shrink-0 rounded-2xl overflow-hidden border border-outline-variant/20 shadow-lg">
                                            @if($line->purchasable->product->getFirstMediaUrl('images'))
                                                <img src="{{ $line->purchasable->product->getFirstMediaUrl('images') }}" 
                                                     class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                                            @else
                                                <div class="h-full w-full bg-surface-container flex items-center justify-center">
                                                    <span class="material-symbols-outlined text-on-surface-variant/20">image</span>
                                                </div>
                                            @endif
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <h3 class="text-lg font-bold text-on-surface group-hover:text-primary transition-colors">
                                                {{ $line->purchasable->product->translateAttribute('name') }}
                                            </h3>
                                            <p class="text-xs text-on-surface-variant line-clamp-1 max-w-sm">
                                                {{ $line->purchasable->product->translateAttribute('description') }}
                                            </p>
                                            <div class="flex items-center gap-2 mt-2">
                                                <span class="h-1.5 w-1.5 rounded-full bg-primary animate-pulse"></span>
                                                <span class="text-[10px] font-black uppercase tracking-tighter text-on-surface-variant">Estatus: {{ $currentLabel }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <div class="text-right hidden sm:block">
                                            <p class="text-[10px] uppercase font-bold text-on-surface-variant">Precio Unitario</p>
                                            <p class="text-sm font-black text-on-surface">{{ $line->sub_total->formatted() }}</p>
                                        </div>
                                        <a href="#" class="flex h-12 w-12 items-center justify-center rounded-2xl bg-on-surface/5 border border-outline-variant/20 text-on-surface-variant hover:text-primary hover:bg-primary/10 hover:border-primary/30 transition-all shadow-sm">
                                            <span class="material-symbols-outlined">forum</span>
                                        </a>
                                    </div>
                                </div>
                                @if(!$loop->last)
                                    <div class="h-px bg-outline-variant/10"></div>
                                @endif
                            @endif
                        @endforeach
                    </div>

                    <!-- Order Footer / Actions -->
                    <div class="bg-surface-container/30 px-8 py-4 border-t border-outline-variant/10 flex justify-between items-center">
                        <p class="text-[10px] text-on-surface-variant font-medium">
                            <span class="font-black">Atención:</span> Los tiempos de respuesta pueden variar según el especialista.
                        </p>
                        @if($order->status === 'payment-received')
                            <div class="flex items-center gap-2 text-primary">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                                </span>
                                <span class="text-[10px] font-black uppercase tracking-widest">En cola de atención</span>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="glass-card rounded-3xl p-20 flex flex-col items-center justify-center text-center opacity-50 border-dashed border-2 border-outline-variant/30 mt-20">
                    <div class="w-24 h-24 rounded-full bg-on-surface/5 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-6xl text-on-surface-variant/30">receipt_long</span>
                    </div>
                    <h3 class="text-xl font-bold">Aún no tienes compras</h3>
                    <p class="text-sm text-on-surface-variant mt-2 mb-8 max-w-xs">Explora el catálogo y contrata a los mejores especialistas del ITCJ hoy mismo.</p>
                    <a href="{{ route('servicios') }}" wire:navigate class="btn-premium px-8">Explorar Servicios</a>
                </div>
            @endforelse
        </div>
    </main>
</div>
