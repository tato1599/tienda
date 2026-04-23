<div class="relative min-h-screen w-full bg-background">
    <!-- Ambient Background -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="tech-pattern absolute inset-0 opacity-40"></div>
        <div class="absolute top-[-10%] -left-[5%] w-[40%] h-[40%] bg-primary/10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[10%] -right-[5%] w-[40%] h-[40%] bg-blue-500/5 blur-[120px] rounded-full"></div>
    </div>

    <!-- Main Content -->
    <main class="relative z-10 flex w-full flex-1 flex-col items-center py-12 px-6">
        <div class="flex w-full max-w-7xl flex-col gap-12">
            
            <!-- Page Heading -->
            <div class="flex flex-col items-center gap-4 text-center">
                <span class="font-space-grotesk text-primary tracking-[0.2em] block text-sm uppercase">Marketplace</span>
                <h1 class="text-on-surface text-4xl md:text-6xl font-black leading-tight tracking-tight bg-gradient-to-br from-on-surface via-on-surface to-primary bg-clip-text text-transparent">
                    Servicios Tecnológicos
                </h1>
                <p class="text-on-surface-variant text-lg font-normal leading-normal max-w-2xl">
                    Encuentra la ayuda técnica que necesitas, ofrecida por estudiantes expertos del ITCJ. 
                    Calidad académica a tu servicio.
                </p>
            </div>

            <!-- Search & Filters Container -->
            <div class="flex flex-col gap-8">
                <!-- SearchBar -->
                <div class="w-full max-w-3xl mx-auto group">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-primary">
                            <span class="material-symbols-outlined">search</span>
                        </div>
                        <input
                            wire:model.live.debounce.300ms="search"
                            class="w-full bg-surface-container border border-outline-variant text-on-surface rounded-2xl py-5 pl-14 pr-6 focus:ring-2 focus:ring-primary/50 focus:border-primary/50 transition-all shadow-[0_0_20px_rgba(0,0,0,0.2)] placeholder:text-on-surface-variant/50 font-medium"
                            placeholder="Buscar servicios (ej. 'Reparación PC', 'Software')..." />
                        <div class="absolute inset-0 bg-primary/5 blur-xl rounded-2xl opacity-0 group-focus-within:opacity-100 transition-opacity pointer-events-none"></div>
                    </div>
                </div>

                <!-- Chips / Category Filters -->
                <div class="flex flex-wrap justify-center gap-3">
                    <button 
                        wire:click="selectCategory('')"
                        class="px-6 py-2 rounded-full border {{ $category === '' ? 'border-primary bg-primary/10 text-primary shadow-[0_0_15px_rgba(0,174,239,0.2)]' : 'border-outline-variant bg-surface/50 text-on-surface-variant font-medium' }} font-bold text-sm transition-all hover:scale-105 active:scale-95">
                        Todos
                    </button>
                    @foreach(['Software', 'Hardware', 'Redes', 'Soporte'] as $cat)
                        <button 
                            wire:click="selectCategory('{{ $cat }}')"
                            class="px-6 py-2 rounded-full border {{ $category === $cat ? 'border-primary bg-primary/10 text-primary shadow-[0_0_15px_rgba(0,174,239,0.2)]' : 'border-outline-variant bg-surface/50 text-on-surface-variant font-medium' }} text-sm transition-all hover:border-primary/50 hover:text-primary hover:bg-on-surface/5">
                            {{ $cat }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse ( $servicios as $servicio )
                    <div class="glass-card group flex cursor-pointer flex-col overflow-hidden rounded-2xl border border-outline-variant hover:border-primary/50 transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,174,239,0.1)]">
                        <!-- Image Container -->
                        <div class="relative w-full aspect-[4/3] bg-surface-container overflow-hidden">
                            @if($servicio->getFirstMediaUrl('images'))
                                <img src="{{ $servicio->getFirstMediaUrl('images') }}"
                                     alt="{{ $servicio->translateAttribute('name') }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-surface to-surface-variant text-on-surface-variant/20">
                                    <span class="material-symbols-outlined text-6xl">image_not_supported</span>
                                    <span class="text-xs mt-2 uppercase tracking-widest font-bold">Sin imagen</span>
                                </div>
                            @endif
                            <!-- Overlay Gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-60"></div>
                            
                            <!-- Price Badge -->
                            <div class="absolute bottom-4 right-4 bg-primary text-on-primary px-4 py-1.5 rounded-full font-black text-sm shadow-xl">
                                {{ $servicio->variants->first()?->prices->first()?->price->formatted() }}
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-1 gap-3">
                            <h3 class="text-on-surface text-lg font-bold leading-tight group-hover:text-primary transition-colors line-clamp-1">
                                {{ $servicio->translateAttribute('name') }}
                            </h3>
                            <p class="text-on-surface-variant text-sm line-clamp-2 min-h-[2.5rem]">
                                {{ $servicio->translateAttribute('description') }}
                            </p>
                            
                            <div class="pt-4 mt-auto border-t border-outline-variant/20 flex items-center justify-between">
                                <span class="text-[10px] uppercase tracking-tighter text-on-surface-variant font-bold flex items-center gap-1">
                                    <span class="material-symbols-outlined text-xs">verified_user</span>
                                    Garantía Académica
                                </span>
                                <a href="{{ route('product.show', $servicio) }}" wire:navigate
                                   class="text-primary text-sm font-bold flex items-center gap-1 group-hover:gap-2 transition-all">
                                    Detalle <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 flex flex-col items-center opacity-50">
                        <span class="material-symbols-outlined text-8xl mb-4">search_off</span>
                        <p class="text-xl font-medium">No encontramos servicios que coincidan...</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            {{ $servicios->links('livewire.custom-pagination') }}
        </div>
    </main>
</div>

