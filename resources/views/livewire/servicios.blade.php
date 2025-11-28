<div class="relative flex min-h-screen w-full flex-col">
        <!-- TopNavBar -->

        <main class="flex w-full flex-1 flex-col items-center py-10 px-6">
            <div class="flex w-full max-w-7xl flex-col gap-8">
                <!-- PageHeading -->
                <div class="flex flex-col items-center gap-3 text-center">
                    <p class="text-gray-900 dark:text-white text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em]">Technical
                        Services Marketplace</p>
                    <p class="text-gray-600 dark:text-gray-400 text-base font-normal leading-normal max-w-lg">Find the technical
                        help you need, offered by fellow students from ITCJ.</p>
                </div>
                <!-- SearchBar -->
                <div class="w-full max-w-2xl mx-auto">
                    <label class="flex flex-col h-12 w-full">
                        <div class="flex w-full flex-1 items-stretch rounded-lg h-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                            <div class="text-gray-500 dark:text-gray-400 flex items-center justify-center pl-4">
                                <span class="material-symbols-outlined">search</span>
                            </div>
                            <input
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden text-gray-900 dark:text-white focus:outline-0 focus:ring-0 border-none bg-transparent h-full placeholder:text-gray-500 dark:placeholder:text-gray-400 px-4 pl-2 text-base font-normal leading-normal"
                                placeholder="Search for services like 'PC repair'..." value="" />
                        </div>
                    </label>
                </div>
                <!-- Chips -->
                <div class="flex flex-wrap justify-center gap-3">
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-blue-600 px-4 text-white text-sm font-medium leading-normal">All</button>
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 px-4 text-gray-900 dark:text-white text-sm font-medium leading-normal transition-colors hover:bg-gray-50 dark:hover:bg-gray-700">Software
                        Installation</button>
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 px-4 text-gray-900 dark:text-white text-sm font-medium leading-normal transition-colors hover:bg-gray-50 dark:hover:bg-gray-700">Hardware
                        Repair</button>
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 px-4 text-gray-900 dark:text-white text-sm font-medium leading-normal transition-colors hover:bg-gray-50 dark:hover:bg-gray-700">Web
                        Development</button>
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 px-4 text-gray-900 dark:text-white text-sm font-medium leading-normal transition-colors hover:bg-gray-50 dark:hover:bg-gray-700">Technical
                        Support</button>
                </div>
                <!-- ImageGrid -->
                <div class="grid grid-cols-[repeat(auto-fill,minmax(240px,1fr))] gap-6">
                    @foreach ( $servicios as $servicio )
                        <div
                        class="group flex cursor-pointer flex-col gap-3 rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-4 transition-all hover:-translate-y-1 hover:shadow-xl">
                        <div class="w-full bg-center bg-no-repeat aspect-[4/3] bg-cover rounded-lg overflow-hidden"

                        >
                            <img src="{{ asset($servicio->getFirstMediaUrl('images')) }}"
                                alt="Service Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform" />
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-gray-900 dark:text-white text-base font-bold leading-normal">
                                {{ $servicio->translateAttribute('name') }}
                            </p>
                            <div class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-normal">
                                {{ $servicio->translateAttribute('description') }}
                            </div>

                            <div class="flex items-center justify-between pt-2">
                                <p class="text-gray-900 dark:text-white text-base font-bold leading-normal">
                                    ${{ $servicio->variants->first()->prices->first()->price->decimal }}
                                </p>
                                <a class="text-blue-600 dark:text-blue-400 text-sm font-medium leading-normal opacity-0 group-hover:opacity-100 transition-opacity"
                                   href="{{ route('product.show', $servicio) }}">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <!-- Pagination -->
                <div class="flex items-center justify-center gap-2 pt-6">
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400 transition-colors hover:bg-gray-50 dark:hover:bg-gray-700">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600 text-white">1</button>
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white transition-colors hover:bg-gray-50 dark:hover:bg-gray-700">2</button>
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white transition-colors hover:bg-gray-50 dark:hover:bg-gray-700">3</button>
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400 transition-colors hover:bg-gray-50 dark:hover:bg-gray-700">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        </main>
    </div>

