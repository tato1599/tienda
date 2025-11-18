<!DOCTYPE html>

<html class="dark" lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ITCJ Services Marketplace</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2b8cee",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                        "surface-dark": "#18232f",
                        "text-main-dark": "#e0e0e0",
                        "text-secondary-dark": "#9dabb9",
                        "border-dark": "#283039"
                    },
                    fontFamily: {
                        "display": ["Space Grotesk", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-text-main-dark">
    <div class="relative flex min-h-screen w-full flex-col">
        <!-- TopNavBar -->

        <main class="flex w-full flex-1 flex-col items-center py-10 px-6">
            <div class="flex w-full max-w-7xl flex-col gap-8">
                <!-- PageHeading -->
                <div class="flex flex-col items-center gap-3 text-center">
                    <p class="text-white text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em]">Technical
                        Services Marketplace</p>
                    <p class="text-text-secondary-dark text-base font-normal leading-normal max-w-lg">Find the technical
                        help you need, offered by fellow students from ITCJ.</p>
                </div>
                <!-- SearchBar -->
                <div class="w-full max-w-2xl mx-auto">
                    <label class="flex flex-col h-12 w-full">
                        <div class="flex w-full flex-1 items-stretch rounded-lg h-full bg-surface-dark">
                            <div class="text-text-secondary-dark flex items-center justify-center pl-4">
                                <span class="material-symbols-outlined">search</span>
                            </div>
                            <input
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden text-white focus:outline-0 focus:ring-0 border-none bg-surface-dark h-full placeholder:text-text-secondary-dark px-4 pl-2 text-base font-normal leading-normal"
                                placeholder="Search for services like 'PC repair'..." value="" />
                        </div>
                    </label>
                </div>
                <!-- Chips -->
                <div class="flex flex-wrap justify-center gap-3">
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-primary px-4 text-white text-sm font-medium leading-normal">All</button>
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-surface-dark px-4 text-white text-sm font-medium leading-normal transition-colors hover:bg-border-dark">Software
                        Installation</button>
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-surface-dark px-4 text-white text-sm font-medium leading-normal transition-colors hover:bg-border-dark">Hardware
                        Repair</button>
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-surface-dark px-4 text-white text-sm font-medium leading-normal transition-colors hover:bg-border-dark">Web
                        Development</button>
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-surface-dark px-4 text-white text-sm font-medium leading-normal transition-colors hover:bg-border-dark">Technical
                        Support</button>
                </div>
                <!-- ImageGrid -->
                <div class="grid grid-cols-[repeat(auto-fill,minmax(240px,1fr))] gap-6">
                    @foreach ( $servicios as $servicio )
                        <div
                        class="group flex cursor-pointer flex-col gap-3 rounded-xl bg-surface-dark p-4 transition-all hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                        <div class="w-full bg-center bg-no-repeat aspect-[4/3] bg-cover rounded-lg overflow-hidden"

                        >
                            <img src="{{ asset($servicio->getFirstMediaUrl('images')) }}"
                                alt="Service Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform" />
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-white text-base font-bold leading-normal">
                                {{ $servicio->translateAttribute('name') }}
                            </p>
                            <div class="text-text-secondary-dark text-sm font-normal leading-normal">
                                {{ $servicio->translateAttribute('description') }}
                            </div>

                            <div class="flex items-center justify-between pt-2">
                                <p class="text-white text-base font-bold leading-normal">
                                    ${{ $servicio->price }}
                                </p>
                                <a class="text-primary text-sm font-medium leading-normal opacity-0 group-hover:opacity-100 transition-opacity"
                                   href="{{ route('product.show', $servicio) }}">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <!-- Pagination -->
                <div class="flex items-center justify-center gap-2 pt-6">
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-dark text-text-secondary-dark transition-colors hover:bg-border-dark">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary text-white">1</button>
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-dark text-text-main-dark transition-colors hover:bg-border-dark">2</button>
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-dark text-text-main-dark transition-colors hover:bg-border-dark">3</button>
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-dark text-text-secondary-dark transition-colors hover:bg-border-dark">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
