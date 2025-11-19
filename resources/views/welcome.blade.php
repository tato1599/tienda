<x-guest-layout>
    <!DOCTYPE html>

    <html class="dark" lang="es">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>ITCJ Tech Services - Landing Page</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com" rel="preconnect" />
        <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&amp;display=swap"
            rel="stylesheet" />
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
        <style>
            .material-symbols-outlined {
                font-variation-settings:
                    'FILL' 0,
                    'wght' 400,
                    'GRAD' 0,
                    'opsz' 24
            }
        </style>
    </head>

    <body class="bg-background-light dark:bg-background-dark font-display text-[#EAEAEA]">
        <div class="relative flex min-h-screen w-full flex-col group/design-root overflow-x-hidden">
            <div class="layout-container flex h-full grow flex-col">
                <!-- TopNavBar -->

                <main class="flex flex-col items-center">
                    <div class="layout-content-container flex flex-col max-w-[960px] flex-1 w-full px-4 sm:px-0">
                        <!-- HeroSection -->
                        <section class="w-full ">
                            <div class="@container">
                                <div class="@[480px]:p-0">
                                    <div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-start justify-end px-4 pb-10 @[480px]:px-10"
                                        data-alt="Abstract technological pattern with blue and dark tones"
                                        style='background-image: linear-gradient(rgba(16, 25, 34, 0.4) 0%, rgb(16, 25, 34) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuD8Okh7-7IrDNxFZGIkpRdtjhEovGQClRoATFD7ESaymOeiS8JQTPFHHvnXL4ruc_GOxZ7LDnCGoc4__6iu7z4JhXUXVeLzwd8qta2RKw80iLDRuu2FnZcz8RHDVqvUNKqA5uWekdkhmNQOr2LxWHyNa7FBWXwykNjk69WNUNbw5gsv6F9qybyx_6F5UjhbMp0A_jwWno2z6H44iv4Z4MxMjOGsDchrWM8BOnKeJomyH-R9PsqD5DVOJvXxBJLP1-S9kNpLOloUkEA");'>
                                        <div class="flex flex-col gap-2 text-left max-w-2xl">
                                            <h1
                                                class="text-white text-4xl font-bold leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-bold @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                                                Tu sol tecnológica al alcance de un clic
                                            </h1>
                                            <h2
                                                class="text-white/80 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
                                                Conectándote con técnicos estudiantes capacitados para todas tus necesidades de servicios de TI. Rápido, asequible y confiable.
                                            </h2>
                                        </div>
                                        <a
                                            href="{{ route('servicios') }}"
                                            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary hover:bg-primary/90 text-white text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em] transition-colors">
                                            <span class="truncate">Explorar Servicios</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- How It Works Section -->
                        <section class="w-full py-10 sm:py-16" id="how-it-works">
                            <h2
                                class="text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-5 pt-5 text-center sm:text-left sm:text-3xl">
                                Cómo Funciona</h2>
                            <div class="grid grid-cols-[40px_1fr] gap-x-4 px-4">
                                <div class="flex flex-col items-center gap-1 pt-3">
                                    <div
                                        class="text-primary flex items-center justify-center size-10 rounded-full bg-primary/20">
                                        <span class="material-symbols-outlined">search</span></div>
                                    <div class="w-[1.5px] bg-white/20 h-full"></div>
                                </div>
                                <div class="flex flex-1 flex-col pt-3 pb-8">
                                    <h3 class="text-white text-base font-medium leading-normal">1. Encuentra tu servicio
                                    </h3>
                                    <p class="text-white/70 text-sm mt-1">Explora nuestro catálogo de servicios ofrecidos por talentosos estudiantes del ITCJ.</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <div class="w-[1.5px] bg-white/20 h-full"></div>
                                    <div
                                        class="text-primary flex items-center justify-center size-10 rounded-full bg-primary/20">
                                        <span class="material-symbols-outlined">shopping_cart</span></div>
                                    <div class="w-[1.5px] bg-white/20 h-full"></div>
                                </div>
                                <div class="flex flex-1 flex-col pt-3 pb-8">
                                    <h3 class="text-white text-base font-medium leading-normal">2. Realiza un pedido</h3>
                                    <p class="text-white/70 text-sm mt-1">Selecciona el servicio que necesitas, proporciona detalles,
                                        y envía tu solicitud de manera segura.</p>
                                </div>
                                <div class="flex flex-col items-center gap-1">
                                    <div class="w-[1.5px] bg-white/20 h-full"></div>
                                    <div
                                        class="text-primary flex items-center justify-center size-10 rounded-full bg-primary/20">
                                        <span class="material-symbols-outlined">route</span></div>
                                    <div class="w-[1.5px] bg-white/20 h-full"></div>
                                </div>
                                <div class="flex flex-1 flex-col pt-3 pb-8">
                                    <h3 class="text-white text-base font-medium leading-normal">3. Sigue tu progreso
                                    </h3>
                                    <p class="text-white/70 text-sm mt-1">Comunícate con tu técnico y sigue el estado de tu servicio en tiempo real.</p>
                                </div>
                                <div class="flex flex-col items-center gap-1 pb-3">
                                    <div class="w-[1.5px] bg-white/20 h-full"></div>
                                    <div
                                        class="text-primary flex items-center justify-center size-10 rounded-full bg-primary/20">
                                        <span class="material-symbols-outlined">task_alt</span></div>
                                </div>
                                <div class="flex flex-1 flex-col pt-3 pb-5">
                                    <h3 class="text-white text-base font-medium leading-normal">4. Servicio completado</h3>
                                    <p class="text-white/70 text-sm mt-1">Recibe tu servicio completado y disfruta de tu tecnología funcionando perfectamente.</p>
                                        perfectly working tech.</p>
                                </div>
                            </div>
                        </section>
                        <!-- Service Category Section -->
                        <section class="w-full py-10 sm:py-16" id="services">
                            <h2
                                class="text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-5 pt-5 text-center sm:text-left sm:text-3xl">
                                Explora Nuestros Servicios</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
                                <div
                                    class="bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col items-start gap-4 hover:bg-white/10 hover:border-white/20 transition-all">
                                    <div class="text-primary bg-primary/20 p-3 rounded-lg"><span
                                            class="material-symbols-outlined text-3xl">desktop_windows</span></div>
                                    <h3 class="text-lg font-bold text-white">Mantenimiento de Computadoras</h3>
                                    <p class="text-sm text-white/70">Mantén tu PC funcionando sin problemas con limpiezas,
                                        optimizaciones y revisiones de hardware.</p>
                                </div>
                                <div
                                    class="bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col items-start gap-4 hover:bg-white/10 hover:border-white/20 transition-all">
                                    <div class="text-primary bg-primary/20 p-3 rounded-lg"><span
                                            class="material-symbols-outlined text-3xl">terminal</span></div>
                                    <h3 class="text-lg font-bold text-white">Instalación de Software</h3>
                                    <p class="text-sm text-white/70">Desde sistemas operativos hasta software especializado,
                                        lo instalaremos y configuraremos.</p>
                                </div>
                                <div
                                    class="bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col items-start gap-4 hover:bg-white/10 hover:border-white/20 transition-all">
                                    <div class="text-primary bg-primary/20 p-3 rounded-lg"><span
                                            class="material-symbols-outlined text-3xl">build</span></div>
                                    <h3 class="text-lg font-bold text-white">Reparación de Dispositivos</h3>
                                    <p class="text-sm text-white/70">Pantallas rotas, reemplazos de baterías y otras
                                        reparaciones de hardware para tus dispositivos.</p>
                                </div>
                                <div
                                    class="bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col items-start gap-4 hover:bg-white/10 hover:border-white/20 transition-all">
                                    <div class="text-primary bg-primary/20 p-3 rounded-lg"><span
                                            class="material-symbols-outlined text-3xl">wifi</span></div>
                                    <h3 class="text-lg font-bold text-white">Configuración de Red</h3>
                                    <p class="text-sm text-white/70">Configuración de routers, optimización de Wi-Fi y solución de problemas de red.</p>
                                </div>
                                <div
                                    class="bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col items-start gap-4 hover:bg-white/10 hover:border-white/20 transition-all">
                                    <div class="text-primary bg-primary/20 p-3 rounded-lg"><span
                                            class="material-symbols-outlined text-3xl">restore_from_trash</span></div>
                                    <h3 class="text-lg font-bold text-white">Recuperación de Datos</h3>
                                    <p class="text-sm text-white/70">¿Archivos eliminados accidentalmente? Podemos ayudarte a
                                        recuperar tus datos importantes.</p>
                                </div>
                                <div
                                    class="bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col items-start gap-4 hover:bg-white/10 hover:border-white/20 transition-all">
                                    <div class="text-primary bg-primary/20 p-3 rounded-lg"><span
                                            class="material-symbols-outlined text-3xl">school</span></div>
                                    <h3 class="text-lg font-bold text-white">Tutoría Personalizada</h3>
                                    <p class="text-sm text-white/70">Obtén ayuda individualizada con software, programación o cualquier tema relacionado con la tecnología.</p>
                                </div>
                            </div>
                        </section>
                        <!-- Final CTA Section -->
                        <section class="w-full py-10 sm:py-20">
                            <div
                                class="bg-primary/90 rounded-xl flex flex-col items-center justify-center text-center p-8 sm:p-12">
                                <h2
                                    class="text-white text-3xl sm:text-4xl font-bold leading-tight tracking-[-0.015em]">
                                    ¿Listo para resolver tus problemas tecnológicos?</h2>
                                <p class="text-white/80 mt-2 max-w-xl">Únete a la comunidad tecnológica de ITCJ hoy. Regístrate gratis y obtén acceso a ayuda técnica confiable de tus compañeros.</p>

                                @auth
                                <a href="{{ route('servicios') }}"
                                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-white text-black text-base font-bold leading-normal tracking-[0.015em] mt-8 hover:bg-white/90 transition-colors">
                                    <span class="truncate">Explorar Servicios</span>
                                </a>
                                @endauth
                                @guest
                                <a href="{{ route('register') }}"
                                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-white text-black text-base font-bold leading-normal tracking-[0.015em] mt-8 hover:bg-white/90 transition-colors">
                                    <span class="truncate">Regístrate Gratis</span>
                                </a>
                                @endguest
                            </div>
                        </section>
                    </div>
                </main>
                <!-- Footer -->
                <footer class="w-full border-t border-solid border-white/10 mt-16">
                    <div
                        class="max-w-5xl mx-auto px-4 sm:px-10 py-8 flex flex-col sm:flex-row justify-between items-center gap-6">
                        <div class="flex items-center gap-3">
                            <div class="size-5 text-white/70">
                                <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M44 4H30.6666V17.3334H17.3334V30.6666H4V44H44V4Z" fill="currentColor">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-white/70 text-sm">© 2024 ITCJ Servicios Tecnológicos. Todos los derechos reservados.</p>
                        </div>
                        <div class="flex items-center gap-6 text-sm text-white/70">
                            <a class="hover:text-white transition-colors" href="#">Términos de Servicio</a>
                            <a class="hover:text-white transition-colors" href="#">Política de Privacidad</a>
                            <a class="hover:text-white transition-colors" href="#">Contacto</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>

    </html>
</x-guest-layout>
