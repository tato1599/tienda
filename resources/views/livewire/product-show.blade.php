<div class="relative min-h-screen w-full bg-background overflow-hidden px- gutter">
    <!-- Ambient Background -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="tech-pattern absolute inset-0 opacity-40"></div>
        <div class="absolute top-[20%] -left-[10%] w-[50%] h-[50%] bg-primary/10 blur-[150px] rounded-full"></div>
        <div class="absolute bottom-[20%] -right-[10%] w-[50%] h-[50%] bg-blue-500/5 blur-[150px] rounded-full"></div>
    </div>

    <div class="relative z-10 flex flex-col w-full max-w-7xl flex-1 mx-auto py-8 sm:py-16">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-3 px-4 mb-12 animate-fade-in">
            <a href="/" class="text-on-surface-variant hover:text-white transition-colors text-xs font-bold uppercase tracking-widest flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">home</span> Inicio
            </a>
            <span class="text-white/10 text-xs">/</span>
            <a href="{{ route('servicios') }}" class="text-on-surface-variant hover:text-white transition-colors text-xs font-bold uppercase tracking-widest">
                Servicios
            </a>
            <span class="text-white/10 text-xs">/</span>
            <span class="text-primary text-xs font-bold uppercase tracking-widest">
                {{ $this->product->translateAttribute('name') }}
            </span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">
            <!-- Left Column: Media Showcase -->
            <div class="lg:col-span-7 flex flex-col gap-6">
                <div class="glass-card p-3 rounded-2xl border border-outline-variant/30 shadow-2xl relative group overflow-hidden">
                    <div class="w-full bg-surface-container aspect-video rounded-xl overflow-hidden relative">
                        @if($this->product->getFirstMediaUrl('images'))
                            <img src="{{ $this->product->getFirstMediaUrl('images') }}" 
                                 class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" 
                                 alt="{{ $this->product->translateAttribute('name') }}">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-surface to-surface-variant text-on-surface-variant/20">
                                <span class="material-symbols-outlined text-8xl">image_not_supported</span>
                                <span class="text-xs mt-4 uppercase tracking-widest font-black">Vista previa no disponible</span>
                            </div>
                        @endif
                        
                        <!-- Premium Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-40"></div>
                        <div class="absolute top-6 left-6">
                            <span class="bg-primary/20 backdrop-blur-md border border-primary/30 text-primary text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-tighter shadow-[0_0_15px_rgba(0,174,239,0.2)]">
                                Vista Expandida
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Gallery Thumbnails (Static Placeholder for now or mapping media) -->
                @if($this->media->count() > 1)
                    <div class="flex gap-4 overflow-x-auto pb-2 scrollbar-none">
                        @foreach($this->media as $item)
                        <div class="w-24 aspect-square glass-card rounded-lg border border-outline-variant/30 p-1 flex-shrink-0 cursor-pointer hover:border-primary/50 transition-all">
                            <img src="{{ $item->getUrl() }}" class="w-full h-full object-cover rounded-md">
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Right Column: Product Detail & Actions -->
            <div class="lg:col-span-5 flex flex-col gap-10">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3">
                        <span class="h-[1px] w-8 bg-primary"></span>
                        <p class="font-space-grotesk text-primary text-xs font-bold tracking-[0.3em] uppercase">
                            {{ $this->product->translateAttribute('marca') ?? 'Servicio Especializado' }}
                        </p>
                    </div>
                    <h1 class="text-white text-4xl sm:text-5xl font-black leading-tight tracking-tight bg-gradient-to-b from-white to-gray-500 bg-clip-text text-transparent">
                        {{ $this->product->translateAttribute('name') }}
                    </h1>
                </div>

                <!-- Pricing & Info -->
                <div class="glass-card p-8 rounded-2xl border border-white/5 space-y-8 bg-white/[0.02]">
                    <div class="flex items-end justify-between">
                        <div class="flex flex-col gap-1">
                            <span class="text-on-surface-variant text-[10px] uppercase font-black tracking-widest">Inversión Estimada</span>
                            <div class="text-4xl font-black text-white flex items-start gap-1">
                                {{ $this->product->variants->first()?->prices->first()?->price->formatted() }}
                            </div>
                        </div>
                        <span class="text-primary/60 text-xs font-medium bg-primary/5 px-4 py-1 rounded-full border border-primary/10">IVA Incluido</span>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center gap-4 text-on-surface-variant group">
                            <div class="w-10 h-10 rounded-full glass-card border-white/5 flex items-center justify-center group-hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">verified</span>
                            </div>
                            <div>
                                <p class="text-white text-sm font-bold">Garantía Extendida</p>
                                <p class="text-xs opacity-60">Soporte post-servicio por 30 días.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 text-on-surface-variant group">
                            <div class="w-10 h-10 rounded-full glass-card border-white/5 flex items-center justify-center group-hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">bolt</span>
                            </div>
                            <div>
                                <p class="text-white text-sm font-bold">Respuesta Flash</p>
                                <p class="text-xs opacity-60">Diagnóstico en menos de 24 horas.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="flex flex-col gap-4">
                    <h3 class="font-space-grotesk text-white text-sm font-bold uppercase tracking-widest">Información del Servicio</h3>
                    <div class="text-on-surface-variant leading-relaxed text-sm glass-card p-6 rounded-2xl border border-white/5">
                        {{ $this->product->translateAttribute('description') }}
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="flex flex-col gap-4 pt-6">
                    @auth
                        <button
                            wire:click="addToCart"
                            @click="$dispatch('cart-updated')"
                            class="w-full bg-primary text-black py-5 rounded-2xl font-black text-xl hover:scale-[1.02] active:scale-95 transition-all shadow-[0_0_30px_rgba(0,174,239,0.3)] flex items-center justify-center gap-3">
                            <span class="material-symbols-outlined text-2xl">shopping_cart</span>
                            Reservar Servicio
                        </button>
                    @else
                        <a href="{{ route('login') }}" 
                           class="w-full border border-primary text-primary py-5 rounded-2xl font-black text-xl hover:bg-primary/5 transition-all flex items-center justify-center gap-3 text-center">
                            <span class="material-symbols-outlined text-2xl">login</span>
                            Iniciar Sesión para Reservar
                        </a>
                    @endauth
                    
                    <p class="text-center text-[10px] text-on-surface-variant uppercase tracking-widest font-medium">
                        Transacción protegida por el sistema ITCJ Servicios v2
                    </p>
                </div>
            </div>
        </div>

        <!-- Section Transition -->
        <div class="mt-32 w-full h-px bg-gradient-to-r from-transparent via-outline-variant/30 to-transparent"></div>
    </div>
</div>
