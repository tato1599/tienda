<div>
    <header class="">
        <nav class="bg-white dark:bg-gray-800 antialiased">
            <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
                <div class="py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center flex-1 gap-4">
                            <a href="#" title="" class="shrink-0">
                                <img class="block w-auto h-8 dark:hidden"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/logo-full.svg"
                                    alt="">
                                <img class="hidden w-auto h-8 dark:block"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/logo-full-dark.svg"
                                    alt="">
                            </a>
                        </div>

                        <ul class="items-center gap-8 md:flex">
                            <li>
                                <a href="/" title=""
                                    class="block text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                                    Inicio
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('servicios') }}" title=""
                                    class="block text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                                    Servicios
                                </a>
                            </li>

                        </ul>

                        @auth


                            <div class="flex items-center justify-end lg:space-x-2">




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
                                    <div x-show="open"
                                        class="z-50 absolute  mt-2 w-80 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700
    ">
                                        <div class="border-b border-gray-200 pb-4 dark:border-gray-700">
                                            <p
                                                class="text-center text-base font-semibold leading-none text-gray-900 dark:text-white">
                                                Your shopping cart</p>
                                        </div>

                                        <div class="border-b border-gray-200 pb-4 dark:border-gray-700">
                                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Receive <span
                                                    class="font-medium text-gray-900 dark:text-white">free shipping</span>
                                                for products worth <span
                                                    class="font-medium text-gray-900 dark:text-white">$9000</span>.</p>

                                            <div class="mt-2 h-1.5 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                                                <div class="h-1.5 rounded-full bg-green-500" style="width: 80%"></div>
                                            </div>
                                        </div>



                                        <div class="grid grid-cols-2 items-center">
                                            <div class="flex items-center gap-2">
                                                <a href="#" class="flex aspect-square h-9 w-9 shrink-0 items-center">
                                                    <img class="h-auto max-h-full w-full dark:hidden"
                                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/iphone-light.svg"
                                                        alt="imac image" />
                                                    <img class="hidden h-auto max-h-full w-full dark:block"
                                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/iphone-dark.svg"
                                                        alt="imac image" />
                                                </a>
                                                <div>
                                                    <a href="#"
                                                        class="truncate text-sm font-semibold leading-none text-gray-900 hover:underline dark:text-white">Apple
                                                        iPhone 15</a>
                                                    <p
                                                        class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">
                                                        $999</p>
                                                </div>
                                            </div>

                                            <div class="flex items-center justify-end gap-3">
                                                <form action="#">
                                                    <label for="counter-input-9" class="sr-only">Choose quantity:</label>
                                                    <div class="relative flex items-center">
                                                        <button type="button" id="decrement-button-9"
                                                            data-input-counter-decrement="counter-input-9"
                                                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 2">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                            </svg>
                                                        </button>
                                                        <input type="text" id="counter-input-9" data-input-counter
                                                            class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white"
                                                            placeholder="" value="1" required />
                                                        <button type="button" id="increment-button-9"
                                                            data-input-counter-increment="counter-input-9"
                                                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 1v16M1 9h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
                                                <button data-tooltip-target="tooltipRemoveItem14" type="button"
                                                    class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                                    <span class="sr-only"> Remove </span>
                                                    <svg class="h-4 w-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                    </svg>
                                                </button>
                                                <div id="tooltipRemoveItem14" role="tooltip"
                                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                                    Remove
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 items-center">
                                            <div class="flex items-center gap-2">
                                                <a href="#"
                                                    class="flex aspect-square h-9 w-9 shrink-0 items-center">
                                                    <img class="h-auto max-h-full w-full dark:hidden"
                                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-light.svg"
                                                        alt="imac image" />
                                                    <img class="hidden h-auto max-h-full w-full dark:block"
                                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-dark.svg"
                                                        alt="imac image" />
                                                </a>
                                                <div>
                                                    <a href="#"
                                                        class="truncate text-sm font-semibold leading-none text-gray-900 hover:underline dark:text-white">Apple
                                                        Watch</a>
                                                    <p
                                                        class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">
                                                        $1,099</p>
                                                </div>
                                            </div>

                                            <div class="flex items-center justify-end gap-3">
                                                <form action="#">
                                                    <label for="counter-input-10" class="sr-only">Choose quantity:</label>
                                                    <div class="relative flex items-center">
                                                        <button type="button" id="decrement-button-10"
                                                            data-input-counter-decrement="counter-input-10"
                                                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 2">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M1 1h16" />
                                                            </svg>
                                                        </button>
                                                        <input type="text" id="counter-input-10" data-input-counter
                                                            class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white"
                                                            placeholder="" value="2" required />
                                                        <button type="button" id="increment-button-10"
                                                            data-input-counter-increment="counter-input-10"
                                                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 1v16M1 9h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
                                                <button data-tooltip-target="tooltipRemoveItem15" type="button"
                                                    class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                                    <span class="sr-only"> Remove </span>
                                                    <svg class="h-4 w-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                    </svg>
                                                </button>
                                                <div id="tooltipRemoveItem15" role="tooltip"
                                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                                    Remove
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-y-4 border-t border-gray-200 pt-4 dark:border-gray-700">
                                            <dl class="space-y-2.5 text-center">
                                                <dt class="leading-none text-gray-500 dark:text-gray-400">Total payment
                                                </dt>

                                                <dd
                                                    class="text-lg font-semibold leading-none text-gray-900 dark:text-white">
                                                    $6,796</dd>
                                            </dl>

                                            <a href="{{ route('cart') }}" title=""
                                                class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                                role="button"> Ver carrito </a>
                                        </div>
                                    </div>
                                </div>
                            @endauth

                            @if (Auth::check())
                                <div>
                                    <button id="accountDropdownButton3" data-dropdown-toggle="accountDropdown3"
                                        type="button"
                                        class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                                        <span class="sr-only">
                                            Account
                                        </span>
                                        <span class="hidden sm:flex">
                                            {{  Auth::user()->name }}
                                        </span>
                                        <svg class="w-4 h-4 text-gray-900 dark:text-white ms-1 hidden sm:flex"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <!-- Dropdown Menu -->
                                    <div id="accountDropdown3"
                                        class="z-50 hidden w-52 divide-y divide-gray-100 overflow-hidden overflow-y-auto rounded-lg bg-white antialiased shadow dark:divide-gray-600 dark:bg-gray-700">
                                        <div class="space-y-2 px-2 pb-4 pt-2 text-center">
                                            <img class="mx-auto h-8 w-8 shrink-0 rounded-full object-cover"
                                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                                alt="" />

                                            <div>
                                                <p
                                                    class="truncate text-sm font-semibold leading-tight text-gray-900 dark:text-white">
                                                    Hello, Jese Leos</p>
                                                <p
                                                    class="truncate text-sm font-normal text-gray-500 dark:text-gray-400">
                                                    name@example.com</p>
                                            </div>

                                            <a href="#" title=""
                                                class="mb-2 me-2 block w-full rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-700"
                                                role="button"> View Profile </a>
                                        </div>

                                        <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
                                            <li>
                                                <a href="#" title=""
                                                    class="group inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <svg class="h-4 w-4 text-gray-500 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a9 9 0 0 0 5-1.5 4 4 0 0 0-4-3.5h-2a4 4 0 0 0-4 3.5 9 9 0 0 0 5 1.5Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    My Account
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" title=""
                                                    class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm text-red-600 hover:bg-red-50 dark:text-red-500 dark:hover:bg-gray-600">
                                                    <svg class="h-4 w-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                                    </svg>
                                                    Log Out
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div>
                                    <a href="{{ route('login') }}" title=""
                                        class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">Login</a>
                                </div>
                                <div>
                                    <a href="{{ route('register') }}" title=""
                                        class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">Register</a>

                                </div>
                            @endif





                        </div>
                    </div>
                </div>



            </div>
</div>
</nav>
</header>
</div>
