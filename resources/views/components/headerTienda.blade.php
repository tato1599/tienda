<div x-data="{ openMenu: false }" class="sticky top-0 z-50">
    <header class="">
        <nav class="bg-white dark:bg-gray-800 antialiased shadow-sm">
            <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
                <div class="py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center flex-1 gap-4">
                            <a href="{{ route('welcome') }}" title="" class="shrink-0">
                                <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900 dark:text-white">ITCJ SERVICIOS</span>
                            </a>
                            <button @click="openMenu = !openMenu"
                                class="lg:hidden p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
                                <svg class="w-6 h-6 text-gray-900 dark:text-white" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                        <div class=" hidden lg:block lg:me-8">

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
                                {{-- @guest
                                    <li>
                                        <a href="{{ route('login') }}" title=""
                                            class="block text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                                            Iniciar sesión
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}" title=""
                                            class="block text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                                            Registrarse
                                        </a>
                                    </li>
                                @endguest --}}

                            </ul>
                        </div>

                        <div x-show="openMenu"
                            class="lg:hidden mt-2 bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-col gap-4">
                                <li><a href="/" class="text-gray-900 dark:text-white font-medium">Inicio</a></li>
                                <li><a href="{{ route('servicios') }}"
                                        class="text-gray-900 dark:text-white font-medium">Servicios</a></li>

                                {{-- @guest
                                    <li><a href="{{ route('login') }}"
                                            class="text-gray-900 dark:text-white font-medium">Iniciar sesión</a></li>
                                    <li><a href="{{ route('register') }}"
                                            class="text-gray-900 dark:text-white font-medium">Registrarse</a></li>
                                @endguest --}}

                                @auth
                                    <li>
                                        <a href="{{ route('profile.show') }}"
                                            class="text-gray-900 dark:text-white font-medium">
                                            Perfil ({{ Auth::user()->name }})
                                        </a>
                                    </li>

                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="w-full text-left text-red-600 dark:text-red-500 font-medium">
                                                Cerrar sesión
                                            </button>
                                        </form>
                                    </li>
                                @endauth
                            </ul>
                        </div>


                        <div class="flex items-center justify-end gap-2">
                            <button
                                x-data="{
                                    theme: localStorage.getItem('theme') || 'light',
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
                                class="btn btn-circle btn-ghost"
                            >
                                <svg x-show="theme === 'light'" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                </svg>
                                <svg x-show="theme === 'dark'" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </button>

                        @auth
                            <div class="flex items-center justify-end lg:space-x-2">







                                <livewire:header-cart />
                            @endauth

                            @if (Auth::check())
                                <div x-data="{ open: false }" class="ms-4">
                                    <button x-on:click="open = ! open" id="accountDropdownButton3" type="button"
                                        class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                                        <span class="sr-only">
                                            Account
                                        </span>
                                        <span class="hidden sm:flex">
                                            {{ Auth::user()->name }}
                                        </span>
                                        <svg class="w-4 h-4 text-gray-900 dark:text-white ms-1 hidden sm:flex"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <!-- Dropdown Menu -->
                                    <div id="accountDropdown3" x-show="open"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-95" @click.away="open = false"
                                        class="z-50 absolute  mt-2 w-80 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700
  ">
                                        <div class="space-y-2 px-2 pb-4 pt-2 text-center">
                                            <img class="mx-auto h-8 w-8 shrink-0 rounded-full object-cover"
                                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                                alt="" />

                                            <div>
                                                <p
                                                    class="truncate text-sm font-semibold leading-tight text-gray-900 dark:text-white">
                                                    Hola, {{ Auth::user()->name }}
                                                </p>
                                                <p
                                                    class="truncate text-sm font-normal text-gray-500 dark:text-gray-400">
                                                    {{ Auth::user()->email }}</p>
                                            </div>

                                            <a href="{{ route('profile.show') }}" title="Ver Perfil"
                                                class="mb-2 me-2 block w-full rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-700"
                                                role="button"> Ver Perfil </a>
                                        </div>

                                        <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">


                                            <li>
                                                <form method="POST" action="{{ route('logout') }}" x-data>
                                                    @csrf
                                                    <a href="{{ route('logout') }}" title=""
                                                        @click.prevent="$root.submit();"
                                                        class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm text-red-600 hover:bg-red-50 dark:text-red-500 dark:hover:bg-gray-600">
                                                        <svg class="h-4 w-4" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                                        </svg>
                                                        Cerrar sesión
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div>
                                    <a href="{{ route('login') }}" title=""
                                        class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">Iniciar
                                        sesión</a>
                                </div>
                                <div>
                                    <a href="{{ route('register') }}" title=""
                                        class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">Registrarse</a>
                                </div>
                            @endif





                        </div>
                        </div>
                    </div>
                </div>


            </div>

</div>
</nav>
</header>
</div>
