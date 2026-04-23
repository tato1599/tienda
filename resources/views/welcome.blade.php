<x-guest-layout>



    <main class="">
        <!-- Hero Section -->
        <section
            class="relative min-h-[calc(100vh-64px)] flex flex-col items-center justify-center px-gutter overflow-hidden">
            <div class="relative z-10 text-center max-w-4xl mx-auto">
                <span
                    class="font-space-grotesk text-primary tracking-[0.2em] mb-stack-lg block text-sm uppercase mt-12">Innovación
                    & Soporte</span>
                <h1
                    class="text-5xl md:text-7xl font-black mb-stack-lg bg-gradient-to-br from-on-surface via-on-surface to-primary bg-clip-text text-transparent leading-tight tracking-tighter">
                    Impulsando tu Potencial Tecnológico
                </h1>
                <p class="text-xl text-on-surface-variant max-w-2xl mx-auto mb-10 font-medium leading-relaxed">
                    Soporte experto y soluciones integrales para la comunidad del ITCJ. Excelencia en mantenimiento e infraestructura digital.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('servicios') }}"
                        class="bg-primary text-on-primary px-8 py-4 rounded-xl font-bold text-lg hover:opacity-90 transition-all flex items-center justify-center gap-2 shadow-[0_0_20px_rgba(0,174,239,0.3)]">
                        Explorar Servicios
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                    <a href="#"
                        class="border border-outline-variant text-on-surface px-8 py-4 rounded-xl font-bold text-lg hover:bg-on-surface/5 transition-all">
                        Consultoría Gratis
                    </a>
                </div>
            </div>

            <!-- Hero Image/Mockup -->
            <div class="mt-20 w-full max-w-5xl mx-auto relative px-4">
                <div class="glass-card rounded-2xl p-2 shadow-2xl overflow-hidden aspect-video relative group">
                    <img class="w-full h-full object-cover rounded-xl grayscale-[0.5] group-hover:grayscale-0 transition-all duration-700"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDO-R4awXS4jzQjEeMk0_6k_1-6m2DaLvg2cFhyxkIuERK0Gvv4_6t_WapdOXTmLb_CmyhZZCC_3E_N7MLZcLg4AyAW_y54Gx77VnNiL1zvEDc1xiUU9hr7Ik73VRGAUdtR7BrqtevdLnq_IUMXpeDKBSYgwX3E_uIYvGmbnujoiUHxq7drWVaXWpeEDgh-0HeyXGqh509NHiVHyhcwT8-q77sCySxvPaZO_EUBf_D1YoqBC0DumnLyFwqxb7N_vSF2OpobbNATw4s"
                        alt="Tech Workspace">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>
            </div>
        </section>

        <!-- Cómo funciona -->
        <section class="py-32 px-gutter bg-surface">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-20">
                    <h2 class="text-4xl font-black text-primary mb-4 tracking-tighter uppercase">Proceso de Atención</h2>
                    <p class="text-on-surface-variant font-medium">Gestión simplificada y seguimiento en tiempo real para tu tranquilidad digital.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter relative">
                    <!-- Progress Line (Hidden on mobile) -->
                    <div class="hidden md:block absolute top-12 left-0 right-0 h-[2px] bg-outline-variant/30 z-0"></div>

                    <!-- Step 1 -->
                    <div class="relative z-10 flex flex-col items-center text-center group">
                        <div
                            class="w-24 h-24 rounded-full bg-surface-container border-2 border-primary flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-[0_0_20px_rgba(0,174,239,0.2)]">
                            <span class="material-symbols-outlined text-3xl text-primary">search</span>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Encuentra</h3>
                        <p class="text-sm text-on-surface-variant">Explora nuestro catálogo de servicios especializados.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative z-10 flex flex-col items-center text-center group">
                        <div
                            class="w-24 h-24 rounded-full bg-surface-container border-2 border-outline-variant flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-3xl text-primary">shopping_cart</span>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Realiza pedido</h3>
                        <p class="text-sm text-on-surface-variant">Solicita el servicio que necesitas en segundos.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative z-10 flex flex-col items-center text-center group">
                        <div
                            class="w-24 h-24 rounded-full bg-surface-container border-2 border-outline-variant flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-3xl text-primary">monitoring</span>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Sigue progreso</h3>
                        <p class="text-sm text-on-surface-variant">Mantente informado del estatus en tiempo real.</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative z-10 flex flex-col items-center text-center group">
                        <div
                            class="w-24 h-24 rounded-full bg-surface-container border-2 border-primary flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-[0_0_20px_rgba(0,174,239,0.2)]">
                            <span class="material-symbols-outlined text-3xl text-primary">task_alt</span>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Servicio completado</h3>
                        <p class="text-sm text-on-surface-variant">Disfruta de tus equipos en óptimas condiciones.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nuestros Servicios -->
        <section id="servicios" class="py-32 px-gutter space-y-20">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                    <div>
                        <span
                            class="font-space-grotesk text-primary mb-2 block uppercase tracking-[0.3em] text-xs font-bold">Servicios Especializados</span>
                        <h2 class="text-4xl font-black tracking-tighter">Excelencia Tecnológica</h2>
                    </div>
                    <p class="text-on-surface-variant max-w-md">
                        Soluciones integrales diseñadas para instituciones, empresas y usuarios particulares que buscan
                        excelencia.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Service 1 -->
                    <div class="glass-card p-8 rounded-2xl hover:border-primary/50 transition-all group cursor-pointer">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center mb-6 text-primary">
                            <span class="material-symbols-outlined">settings_suggest</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 group-hover:text-primary transition-colors">Mantenimiento de
                            Computadoras</h3>
                        <p class="text-on-surface-variant text-sm mb-6">Limpieza física y lógica para maximizar la vida
                            útil de tus equipos de escritorio y laptops.</p>
                        <div
                            class="flex items-center gap-2 text-primary text-sm font-bold opacity-0 group-hover:opacity-100 transition-opacity">
                            Ver detalles <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </div>
                    </div>
                    <!-- More services can be added here following same pattern -->
                    <div class="glass-card p-8 rounded-2xl hover:border-primary/50 transition-all group cursor-pointer">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center mb-6 text-primary">
                            <span class="material-symbols-outlined">terminal</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 group-hover:text-primary transition-colors">Instalación de
                            Software</h3>
                        <p class="text-on-surface-variant text-sm mb-6">Sistemas operativos, suites de oficina y
                            software especializado con licencias garantizadas.</p>
                        <div
                            class="flex items-center gap-2 text-primary text-sm font-bold opacity-0 group-hover:opacity-100 transition-opacity">
                            Ver detalles <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </div>
                    </div>
                    <div class="glass-card p-8 rounded-2xl hover:border-primary/50 transition-all group cursor-pointer">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center mb-6 text-primary">
                            <span class="material-symbols-outlined">phonelink_setup</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 group-hover:text-primary transition-colors">Reparación de
                            Dispositivos</h3>
                        <p class="text-on-surface-variant text-sm mb-6">Diagnóstico y reparación de componentes de
                            hardware, pantallas y periféricos.</p>
                        <div
                            class="flex items-center gap-2 text-primary text-sm font-bold opacity-0 group-hover:opacity-100 transition-opacity">
                            Ver detalles <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Final -->
        <section id="contacto" class="py-24 px-gutter">
            <div class="max-w-7xl mx-auto">
                <div class="relative rounded-3xl overflow-hidden p-12 md:p-20 text-center glass-card">
                    <div class="absolute inset-0 opacity-10 tech-pattern"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/5 via-transparent to-transparent"></div>

                    <div class="relative z-10 max-w-2xl mx-auto">
                        <h2 class="text-3xl md:text-5xl font-bold text-on-surface mb-8">¿Listo para resolver tus problemas
                            tecnológicos?</h2>
                        <p class="text-primary tracking-wide mb-10 text-lg font-medium uppercase">Únete a cientos de usuarios que
                            confían en ITCJ Servicios para mantener su vida digital en movimiento.</p>

                        @guest
                            <a href="{{ route('register') }}"
                                class="inline-block bg-primary text-on-primary px-12 py-5 rounded-full font-black text-xl hover:scale-105 active:scale-95 transition-all shadow-[0_0_30px_rgba(0,174,239,0.4)]">
                                REGÍSTRATE GRATIS
                            </a>
                        @else
                            <a href="{{ route('servicios') }}"
                                class="inline-block bg-primary text-on-primary px-12 py-5 rounded-full font-black text-xl hover:scale-105 active:scale-95 transition-all shadow-[0_0_30px_rgba(0,174,239,0.4)]">
                                EXPLORAR SERVICIOS
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer
        class="w-full py-12 px-8 flex flex-col md:flex-row justify-between items-center gap-6 bg-surface-container border-t border-outline-variant/20 font-sans text-sm mt-12">
        <div class="flex flex-col gap-2">
            <div class="text-lg font-bold text-primary tracking-tighter">ITCJ SERVICIOS</div>
            <p class="text-on-surface-variant text-xs uppercase tracking-widest">© {{ date('Y') }} ITCJ SERVICIOS.
                SISTEMA DE GESTIÓN V2.</p>
        </div>
        <div class="flex gap-8">
            <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Mantenimiento</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Software</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Redes</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Privacidad</a>
        </div>
        <div class="flex gap-4">
            <a class="text-primary p-2 hover:bg-primary/10 rounded-full transition-all" href="#">
                <span class="material-symbols-outlined">language</span>
            </a>
            <a class="text-primary p-2 hover:bg-primary/10 rounded-full transition-all" href="#">
                <span class="material-symbols-outlined">alternate_email</span>
            </a>
        </div>
    </footer>
</x-guest-layout>