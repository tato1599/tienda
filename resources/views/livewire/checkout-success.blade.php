<div class="relative flex min-h-screen w-full flex-col items-center justify-center p-4">
    <div class="text-center space-y-6 max-w-lg">
        <div class="flex justify-center">
            <div class="rounded-full bg-green-100 dark:bg-green-500/20 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-600 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
        
        <h1 class="text-4xl font-black text-on-surface">¡Pago Exitoso!</h1>
        
        <p class="text-lg text-on-surface-variant">
            Gracias por tu compra. Tu orden ha sido recibida y será procesada en breve.
        </p>

        @if($order)
            <div class="bg-surface-container rounded-2xl p-6 text-left border border-outline-variant/20">
                <p class="text-on-surface font-bold mb-2 uppercase tracking-widest text-xs">Detalles de la Orden</p>
                <p class="text-on-surface-variant text-sm">Referencia: <span class="text-on-surface font-black">{{ $order->reference }}</span></p>
                <p class="text-on-surface-variant text-sm">Total: <span class="text-on-surface font-black">{{ $order->total->formatted() }}</span></p>
            </div>
        @endif

        <div class="pt-4">
            <a href="{{ route('servicios') }}" wire:navigate class="btn-premium">
                Volver a Servicios
            </a>
        </div>
    </div>
</div>
