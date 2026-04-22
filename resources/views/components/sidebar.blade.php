<div class="fixed left-0 top-16 bottom-0 z-40 transition-all duration-300"
     :class="openSidebar ? 'w-64' : 'w-20'">
    
    <div class="h-full glass-card border-r border-[#262626] flex flex-col overflow-hidden relative">
        <!-- Toggle Button -->
        <button @click="openSidebar = !openSidebar" 
                class="absolute -right-3 top-4 w-6 h-6 bg-primary text-black rounded-full flex items-center justify-center shadow-[0_0_15px_rgba(0,174,239,0.4)] hover:scale-110 transition-transform z-50">
            <span class="material-symbols-outlined text-sm font-bold" x-text="openSidebar ? 'chevron_left' : 'chevron_right'"></span>
        </button>

        <!-- Navigation Links -->
        <nav class="flex-1 px-3 py-6 space-y-2">
            <x-sidebar-link href="{{ route('welcome') }}" icon="dashboard" :active="request()->routeIs('welcome')" :open="'openSidebar'">
                Panel
            </x-sidebar-link>
            
            <x-sidebar-link href="{{ route('servicios') }}" icon="settings_suggest" :active="request()->routeIs('servicios')" :open="'openSidebar'">
                Servicios
            </x-sidebar-link>
            
            <x-sidebar-link href="#" icon="history" :open="'openSidebar'">
                Historial
            </x-sidebar-link>

            <x-sidebar-link href="#" icon="support_agent" :open="'openSidebar'">
                Soporte
            </x-sidebar-link>
        </nav>

        <!-- Bottom Actions -->
        <div class="p-3 border-t border-white/5 space-y-2">
            <x-sidebar-link href="{{ route('profile.show') }}" icon="settings" :active="request()->routeIs('profile.show')" :open="'openSidebar'">
                Configuración
            </x-sidebar-link>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-4 px-3 py-3 rounded-xl text-red-400 hover:bg-red-400/10 transition-all group overflow-hidden">
                    <span class="material-symbols-outlined min-w-[24px]">logout</span>
                    <span class="font-bold text-sm whitespace-nowrap transition-opacity duration-300" :class="openSidebar ? 'opacity-100' : 'opacity-0'">Cerrar Sesión</span>
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Helper Component for Sidebar Links (Inlined for simplicity or create separate file) --}}
@once
    @push('styles')
    <style>
        .sidebar-link-active {
            @apply bg-primary/10 text-primary border border-primary/20 shadow-[0_0_20px_rgba(0,174,239,0.1)];
        }
    </style>
    @endpush
@endonce
