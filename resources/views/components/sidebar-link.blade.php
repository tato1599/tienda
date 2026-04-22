@props(['icon', 'active' => false, 'open' => true])

<a {{ $attributes }} 
   class="flex items-center gap-4 px-3 py-3 rounded-xl transition-all duration-300 group overflow-hidden border border-transparent
          {{ $active ? 'bg-primary/10 text-primary border-primary/20 shadow-[0_0_20px_rgba(0,174,239,0.1)]' : 'text-on-surface-variant hover:text-white hover:bg-white/5' }}">
    
    <span class="material-symbols-outlined min-w-[24px] group-hover:scale-110 transition-transform">
        {{ $icon }}
    </span>
    
    <span class="font-bold text-sm whitespace-nowrap transition-opacity duration-300" 
          :class="open ? 'opacity-100' : 'opacity-0'">
        {{ $slot }}
    </span>
</a>
