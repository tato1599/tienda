<div class="relative flex min-h-screen w-full flex-col items-center justify-center p-4">
    <div class="text-center space-y-6 max-w-lg">
        <div class="flex justify-center">
            <div class="rounded-full bg-green-100 dark:bg-green-500/20 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-600 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
        
        <h1 class="text-4xl font-black text-gray-900 dark:text-white">¡Pago Exitoso!</h1>
        
        <p class="text-lg text-gray-600 dark:text-[#9dabb9]">
            Gracias por tu compra. Tu orden ha sido recibida y será procesada en breve.
        </p>

        @if($order)
            <div class="bg-gray-50 dark:bg-white/5 rounded-lg p-6 text-left border border-gray-200 dark:border-none">
                <p class="text-gray-900 dark:text-white font-bold mb-2">Detalles de la Orden</p>
                <p class="text-gray-600 dark:text-[#9dabb9]">Referencia: <span class="text-gray-900 dark:text-white">{{ $order->reference }}</span></p>
                <p class="text-gray-600 dark:text-[#9dabb9]">Total: <span class="text-gray-900 dark:text-white">{{ $order->total->formatted() }}</span></p>
            </div>
        @endif

        <div class="pt-4">
            <a href="{{ route('servicios') }}" class="inline-flex items-center justify-center rounded-lg bg-primary px-6 py-3 text-base font-bold text-white shadow-lg shadow-primary/20 transition-transform hover:scale-[1.02]">
                Volver a Servicios
            </a>
        </div>
    </div>
</div>
