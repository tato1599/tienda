<div x-data="{ open: false }">
    <button x-on:click="open = ! open" type="button"
        class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
        <span class="sr-only">
            Cart
        </span>
        <div class="relative sm:me-2.5">

            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
            </svg>

            @if ($cartQuantity > 0)
                <div
                    class="absolute inline-flex items-center justify-center w-4 h-4 text-xs font-medium text-white bg-red-700 rounded-full -top-1.5 -end-1.5 dark:bg-red-600 ">
                    {{ $cartQuantity }}
                </div>
            @endif
        </div>
        <span class="hidden sm:flex">
            Mi carrito
        </span>
        <svg class="hidden sm:flex w-4 h-4 text-gray-900 dark:text-white ms-1"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="m19 9-7 7-7-7"></path>
        </svg>
    </button>
    <!-- Dropdown Menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" @click.away="open = false"
        class="z-50 absolute  mt-2 w-80 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700
">
        <div class="border-b border-gray-200 pb-4 dark:border-gray-700">
            <p
                class="text-center text-base font-semibold leading-none text-gray-900 dark:text-white">
                Your shopping cart</p>
        </div>
        @foreach ($cartItems as $item)
            <div class="grid grid-cols-2 items-center">
                <div class="flex items-center gap-2">
                    <a href="#"
                        class="flex aspect-square h-9 w-9 shrink-0 items-center">
                         @if($item->purchasable->product->thumbnail)
                            <img class="h-auto max-h-full w-full"
                                src="{{ $item->purchasable->product->thumbnail->getUrl() }}"
                                alt="{{ $item->purchasable->product->translateAttribute('name') }}" />
                        @else
                            <img class="h-auto max-h-full w-full dark:hidden"
                                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-light.svg"
                                alt="imac image" />
                            <img class="hidden h-auto max-h-full w-full dark:block"
                                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-dark.svg"
                                alt="imac image" />
                        @endif
                    </a>
                    <div>
                        <a href="#"
                            class="truncate text-sm font-semibold leading-none text-gray-900 hover:underline dark:text-white">{{ $item->purchasable->product->translateAttribute('name') }}</a>
                        <p
                            class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">
                            {{ $item->unitPrice->formatted }}</p>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3">
                    <div class="text-sm text-gray-900 dark:text-white">
                        x{{ $item->quantity }}
                    </div>
                </div>
            </div>
        @endforeach

        <div class="space-y-4 border-t border-gray-200 pt-4 dark:border-gray-700">
            <a href="{{ route('cart') }}" title=""
                class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                role="button"> Ver carrito </a>
        </div>
    </div>
</div>
