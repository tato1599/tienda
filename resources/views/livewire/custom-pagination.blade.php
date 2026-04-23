<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center gap-3 pt-12">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="w-12 h-12 rounded-xl glass-card flex items-center justify-center text-on-surface-variant/20 border-outline-variant/30 cursor-not-allowed">
                    <span class="material-symbols-outlined">chevron_left</span>
                </span>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="w-12 h-12 rounded-xl glass-card flex items-center justify-center text-on-surface-variant hover:text-primary transition-all border-outline-variant hover:border-primary/50">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
            @endif

            {{-- Pagination Elements --}}
            <div class="flex gap-2">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="w-12 h-12 flex items-center justify-center text-on-surface-variant">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="w-12 h-12 rounded-xl bg-primary text-on-primary font-black flex items-center justify-center shadow-[0_0_15px_rgba(0,174,239,0.3)]">{{ $page }}</span>
                            @else
                                <button wire:click="gotoPage({{ $page }})" class="w-12 h-12 rounded-xl glass-card text-on-surface font-bold flex items-center justify-center border-outline-variant hover:border-primary/50 transition-all">
                                    {{ $page }}
                                </button>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="w-12 h-12 rounded-xl glass-card flex items-center justify-center text-on-surface-variant hover:text-primary transition-all border-outline-variant hover:border-primary/50">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            @else
                <span class="w-12 h-12 rounded-xl glass-card flex items-center justify-center text-on-surface-variant/20 border-outline-variant/30 cursor-not-allowed">
                    <span class="material-symbols-outlined">chevron_right</span>
                </span>
            @endif
        </nav>
    @endif
</div>
