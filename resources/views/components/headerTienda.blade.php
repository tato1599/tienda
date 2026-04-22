<div x-data="{ openMenu: false }" class="sticky top-0 z-50">
    <header class="w-full h-16 flex justify-between items-center px-8 bg-black/80 backdrop-blur-xl border-b border-[#262626] font-sans tracking-tight">
        <!-- Logo -->
        <a href="{{ route('welcome') }}" class="text-xl font-black tracking-tighter text-primary">
            ITCJ SERVICIOS
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-8">
            <a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant font-medium hover:text-primary transition-all duration-300' }}">
                Inicio
            </a>
            <a href="{{ route('servicios') }}" class="{{ request()->routeIs('servicios') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant font-medium hover:text-primary transition-all duration-300' }}">
                Servicios
            </a>
            <a href="#" class="text-on-surface-variant font-medium hover:text-primary transition-all duration-300">
                Proyectos
            </a>
            <a href="#" class="text-on-surface-variant font-medium hover:text-primary transition-all duration-300">
                Contacto
            </a>
        </nav>

        <!-- Right Actions -->
        <div class="flex items-center gap-4">
            {{-- Theme Toggle --}}
            <button
                x-data="{
                    theme: localStorage.getItem('theme') || 'dark',
                    toggle() {
                        this.theme = this.theme === 'light' ? 'dark' : 'light';
                        localStorage.setItem('theme', this.theme);
                        document.documentElement.setAttribute('data-theme', this.theme);
                        if (this.theme === 'dark') {
                            document.documentElement.classList.add('dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                        }
                    }
                }"
                @click="toggle()"
                class="text-on-surface-variant hover:text-primary transition-colors p-2 rounded-full hover:bg-white/5"
            >
                <span x-show="theme === 'light'" class="material-symbols-outlined">dark_mode</span>
                <span x-show="theme === 'dark'" class="material-symbols-outlined">light_mode</span>
            </button>

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
                            <p class="text-sm font-medium text-white truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="{{ route('profile.show') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-on-surface-variant hover:text-white hover:bg-white/5 rounded-lg transition-all">
                            <span class="material-symbols-outlined text-lg">person</span>
                            Perfil
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
                <a href="{{ route('login') }}" class="text-on-surface-variant hover:text-primary transition-colors font-bold text-sm">
                    Ingresar
                </a>
                <a href="{{ route('register') }}" class="bg-primary text-black px-4 py-1.5 rounded-lg font-bold text-sm active:opacity-80 active:scale-95 transition-all">
                    Acceso
                </a>
            @endguest

            <!-- Mobile Menu Toggle -->
            <button @click="openMenu = !openMenu" class="md:hidden text-white p-2">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div x-show="openMenu" @click.away="openMenu = false" 
         class="md:hidden fixed inset-0 z-[60] bg-black/95 backdrop-blur-2xl p-8 flex flex-col gap-8 transition-all"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0">
        <div class="flex justify-between items-center">
            <span class="text-primary font-black tracking-tighter text-xl">MENU</span>
            <button @click="openMenu = false" class="text-white">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <nav class="flex flex-col gap-6">
            <a href="/" class="text-2xl font-bold text-white hover:text-primary transition-colors">Inicio</a>
            <a href="{{ route('servicios') }}" class="text-2xl font-bold text-white hover:text-primary transition-colors">Servicios</a>
            <a href="#" class="text-2xl font-bold text-white hover:text-primary transition-colors">Proyectos</a>
            <a href="#" class="text-2xl font-bold text-white hover:text-primary transition-colors">Contacto</a>
            @guest
                <hr class="border-white/10 my-2">
                <a href="{{ route('login') }}" class="text-xl font-bold text-on-surface-variant">Ingresar</a>
                <a href="{{ route('register') }}" class="text-xl font-bold text-primary">Crear Cuenta</a>
            @endguest
        </nav>
    </div>
</div>
