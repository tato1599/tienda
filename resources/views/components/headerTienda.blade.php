<div x-data="{ openMenu: false }" class="sticky top-0 z-50">
    <header class="w-full h-16 flex justify-between items-center px-8 bg-background/60 backdrop-blur-2xl border-b border-primary/20 font-sans tracking-tight">
        <!-- Logo -->
        <a href="{{ route('welcome') }}" wire:navigate class="flex items-center">
            <x-logo class="text-primary hover:scale-105 transition-transform" />
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-8">
            <a href="{{ route('welcome') }}" wire:navigate class="{{ request()->routeIs('welcome') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant font-medium hover:text-primary transition-all duration-300' }}">
                Inicio
            </a>
            <a href="{{ route('servicios') }}" wire:navigate class="{{ request()->routeIs('servicios') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant font-medium hover:text-primary transition-all duration-300' }}">
                Servicios
            </a>
            <a href="{{ route('welcome') }}#contacto" class="text-on-surface-variant font-medium hover:text-primary transition-all duration-300">
                Contacto
            </a>
        </nav>

        <!-- Right Actions -->
        <div class="flex items-center gap-4">
            {{-- Theme Toggle --}}
            <x-mary-theme-toggle class="btn btn-ghost btn-circle text-on-surface-variant hover:text-primary" />

            @auth
                <livewire:header-cart />
                
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center gap-2 text-on-surface-variant hover:text-primary transition-all group">
                        <span class="hidden sm:inline text-sm font-bold">{{ Auth::user()->name }}</span>
                        <span class="material-symbols-outlined group-hover:scale-110 transition-transform">account_circle</span>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.away="open = false" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="z-50 absolute right-0 mt-4 w-56 glass-card rounded-xl p-2 shadow-2xl">
                        <div class="px-4 py-3 border-b border-white/5 mb-2">
                            <p class="text-xs font-bold text-primary tracking-widest uppercase">Cuenta</p>
                            <p class="text-sm font-medium text-on-surface truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="{{ route('profile.show') }}" wire:navigate class="flex items-center gap-3 px-4 py-2 text-sm text-on-surface-variant hover:text-primary hover:bg-surface-variant/20 rounded-lg transition-all">
                            <span class="material-symbols-outlined text-lg">person</span>
                            Perfil
                        </a>
                        <a href="{{ route('mis-compras') }}" wire:navigate class="flex items-center gap-3 px-4 py-2 text-sm text-on-surface-variant hover:text-primary hover:bg-surface-variant/20 rounded-lg transition-all">
                            <span class="material-symbols-outlined text-lg">receipt_long</span>
                            Mis Compras
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 text-sm text-red-400 hover:bg-red-400/10 rounded-lg transition-all">
                                <span class="material-symbols-outlined text-lg">logout</span>
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}" wire:navigate class="text-on-surface-variant hover:text-primary transition-colors font-bold text-sm">
                    Ingresar
                </a>
                <a href="{{ route('register') }}" wire:navigate class="bg-primary text-black px-4 py-1.5 rounded-lg font-bold text-sm active:opacity-80 active:scale-95 transition-all shadow-[0_0_15px_rgba(0,174,239,0.3)]">
                    Crear Cuenta
                </a>
            @endguest

            <!-- Mobile Menu Toggle -->
            <button @click="openMenu = !openMenu" class="md:hidden text-on-surface p-2">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div x-show="openMenu" @click.away="openMenu = false" 
         class="md:hidden fixed inset-0 z-[60] bg-background/95 backdrop-blur-2xl p-8 flex flex-col gap-8 transition-all"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0">
        <div class="flex justify-between items-center">
            <x-logo class="h-8 text-primary" />
            <button @click="openMenu = false" class="text-on-surface">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <nav class="flex flex-col gap-6">
            <a href="{{ route('welcome') }}" wire:navigate class="text-2xl font-bold text-on-surface hover:text-primary transition-colors">Inicio</a>
            <a href="{{ route('servicios') }}" wire:navigate class="text-2xl font-bold text-on-surface hover:text-primary transition-colors">Servicios</a>
            <a href="{{ route('welcome') }}#servicios" class="text-2xl font-bold text-on-surface hover:text-primary transition-colors">Proyectos</a>
            <a href="{{ route('welcome') }}#contacto" class="text-2xl font-bold text-on-surface hover:text-primary transition-colors">Contacto</a>
            @auth
                <hr class="border-outline-variant/30 my-2">
                <a href="{{ route('mis-compras') }}" wire:navigate class="text-xl font-bold text-on-surface hover:text-primary transition-colors">Mis Compras</a>
                <a href="{{ route('profile.show') }}" wire:navigate class="text-xl font-bold text-on-surface hover:text-primary transition-colors">Perfil</a>
            @endauth
            @guest
                <hr class="border-outline-variant/30 my-2">
                <a href="{{ route('login') }}" wire:navigate class="text-xl font-bold text-on-surface-variant">Ingresar</a>
                <a href="{{ route('register') }}" wire:navigate class="text-xl font-bold text-primary">Crear Cuenta</a>
            @endguest
        </nav>
    </div>
</div>
