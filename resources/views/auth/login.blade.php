<x-guest-layout inherit="false">
    {{-- We disable the inherited header from the guest layout if possible, or just wrap in a full-screen div --}}
    <div class="fixed inset-0 z-[-1] overflow-hidden bg-background">
        <div class="ambient-glow-top"></div>
        <div class="ambient-glow-bottom"></div>
    </div>

    <main class="flex items-center justify-center p-gutter relative z-10">
        <!-- Login Card Container -->
        <div class="max-w-[440px] w-full">
            <div
                class="bg-surface border border-primary/20 p-10 rounded-xl shadow-[0_0_50px_-12px_rgba(37,99,235,0.15)] relative">
                <!-- Top Glow Line -->
                <div
                    class="absolute -top-px left-1/2 -translate-x-1/2 w-1/2 h-px bg-gradient-to-r from-transparent via-primary to-transparent">
                </div>

                <!-- Form Header -->
                <div class="mb-10 text-center">
                    <h1 class="text-3xl font-bold tracking-tight text-white mb-2">Bienvenido</h1>
                    <p class="text-sm text-on-surface-variant">Ingresa tus credenciales para acceder a la plataforma
                        tecnológica.</p>
                </div>

                <!-- Session Status / Errors -->


                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-widest text-on-surface-variant ml-1"
                            for="email">Correo electrónico</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span
                                    class="material-symbols-outlined text-on-surface-variant text-[18px] group-focus-within:text-primary transition-colors">alternate_email</span>
                            </div>
                            <input class="input-premium {{ $errors->has('email') ? 'border-red-500/50' : '' }}"
                                id="email" name="email" type="email" value="{{ old('email') }}"
                                placeholder="usuario@itcj.edu.mx" required autofocus autocomplete="username" />
                        </div>
                        @error('email')
                            <p class="text-red-500 text-[10px] font-bold uppercase tracking-wider mt-1 ml-1">{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center px-1">
                            <label class="text-[11px] font-bold uppercase tracking-widest text-on-surface-variant"
                                for="password">Contraseña</label>
                            @if (Route::has('password.request'))
                                <a class="text-[11px] font-semibold text-primary hover:text-blue-400 transition-colors"
                                    href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                            @endif
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span
                                    class="material-symbols-outlined text-on-surface-variant text-[18px] group-focus-within:text-primary transition-colors">lock</span>
                            </div>
                            <input class="input-premium {{ $errors->has('password') ? 'border-red-500/50' : '' }}"
                                id="password" name="password" type="password" placeholder="••••••••" required
                                autocomplete="current-password" />
                        </div>
                        @error('password')
                            <p class="text-red-500 text-[10px] font-bold uppercase tracking-wider mt-1 ml-1">{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center pt-2">
                        <label class="flex items-center cursor-pointer group">
                            <input name="remember" type="checkbox"
                                class="w-4 h-4 rounded border-surface-variant bg-background text-primary focus:ring-offset-background focus:ring-primary/50 transition-colors" />
                            <span
                                class="ml-3 text-sm text-on-surface-variant group-hover:text-on-surface transition-colors">Mantener
                                sesión iniciada</span>
                        </label>
                    </div>

                    <!-- Action Button -->
                    <div class="pt-4">
                        <button type="submit" class="btn-premium">
                            Iniciar Sesión
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </button>
                    </div>
                </form>

                <!-- Footer Links -->
                <div class="mt-10 pt-8 border-t border-surface-variant text-center">
                    <p class="text-sm text-on-surface-variant">
                        ¿No tienes una cuenta?
                        <a class="text-primary font-bold hover:text-blue-400 transition-colors"
                            href="{{ route('register') }}">Solicitar acceso</a>
                    </p>
                </div>
            </div>

            <!-- System Status Hint -->
            <div class="mt-8 flex items-center justify-center gap-3 opacity-60">
                <div class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_8px_rgba(37,99,235,0.8)] animate-pulse">
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Sistemas
                    Operativos Activos</span>
            </div>
        </div>
    </main>



    <!-- Tech Visual Decor -->
    <div class="fixed right-0 bottom-0 pointer-events-none select-none hidden xl:block">
        <div class="flex flex-col items-end p-12 space-y-2">
            <span class="text-[120px] font-black text-white/[0.02] tracking-tighter leading-none">SISTEMA</span>
            <span class="text-[120px] font-black text-primary/[0.04] tracking-tighter leading-none">ACTIVO</span>
        </div>
    </div>
</x-guest-layout>