<x-guest-layout inherit="false">
    <div class="fixed inset-0 z-[-1] overflow-hidden bg-background">
        <div class="ambient-glow-top"></div>
        <div class="ambient-glow-bottom"></div>
    </div>

    <main class="flex items-center justify-center p-gutter relative z-10">
        <!-- Register Card Container -->
        <div class="max-w-[600px] w-full">
            <div class="bg-surface border border-primary/20 p-10 rounded-xl shadow-[0_0_50px_-12px_rgba(37,99,235,0.15)] relative">
                <!-- Top Glow Line -->
                <div class="absolute -top-px left-1/2 -translate-x-1/2 w-1/2 h-px bg-gradient-to-r from-transparent via-primary to-transparent"></div>
                
                <!-- Form Header -->
                <div class="mb-10 text-center">
                    <h1 class="text-3xl font-bold tracking-tight text-on-surface mb-2">Crea tu cuenta</h1>
                    <p class="text-sm text-on-surface-variant">Únete a la plataforma tecnológica del ITCJ.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name Field -->
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold uppercase tracking-widest text-on-surface-variant ml-1" for="name">Nombre</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-on-surface-variant text-[18px] group-focus-within:text-primary transition-colors">person</span>
                                </div>
                                <input 
                                    class="input-premium {{ $errors->has('name') ? 'border-red-500/50' : '' }}" 
                                    id="name" 
                                    name="name" 
                                    type="text" 
                                    value="{{ old('name') }}" 
                                    placeholder="Tu nombre" 
                                    required 
                                    autofocus 
                                />
                            </div>
                            @error('name')
                                <p class="text-red-500 text-[10px] font-bold uppercase tracking-wider mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Apellido Field -->
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold uppercase tracking-widest text-on-surface-variant ml-1" for="apellido">Apellido</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-on-surface-variant text-[18px] group-focus-within:text-primary transition-colors">person_add</span>
                                </div>
                                <input 
                                    class="input-premium {{ $errors->has('apellido') ? 'border-red-500/50' : '' }}" 
                                    id="apellido" 
                                    name="apellido" 
                                    type="text" 
                                    value="{{ old('apellido') }}" 
                                    placeholder="Tus apellidos" 
                                    required 
                                />
                            </div>
                            @error('apellido')
                                <p class="text-red-500 text-[10px] font-bold uppercase tracking-wider mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-widest text-on-surface-variant ml-1" for="email">Correo electrónico institucional</label>
                        <div class="relative group flex items-center">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-on-surface-variant text-[18px] group-focus-within:text-primary transition-colors">alternate_email</span>
                            </div>
                            <input 
                                class="input-premium {{ $errors->has('email') ? 'border-red-500/50' : '' }} pr-40" 
                                id="email" 
                                name="email" 
                                type="text" 
                                value="{{ old('email') }}" 
                                placeholder="Parte del correo" 
                                required 
                                pattern="[A-Za-z0-9._%+-]+"
                            />
                            <div class="absolute right-3 text-xs font-bold text-on-surface-variant pointer-events-none">
                                @cdjuarez.tecnm.mx
                            </div>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-[10px] font-bold uppercase tracking-wider mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Matrícula Field -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-widest text-on-surface-variant ml-1" for="matricula">Matrícula</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-on-surface-variant text-[18px] group-focus-within:text-primary transition-colors">badge</span>
                            </div>
                            <input 
                                class="input-premium {{ $errors->has('matricula') ? 'border-red-500/50' : '' }}" 
                                id="matricula" 
                                name="matricula" 
                                type="text" 
                                value="{{ old('matricula') }}" 
                                placeholder="Ingresa tu matrícula" 
                                required 
                            />
                        </div>
                        @error('matricula')
                            <p class="text-red-500 text-[10px] font-bold uppercase tracking-wider mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold uppercase tracking-widest text-on-surface-variant ml-1" for="password">Contraseña</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-on-surface-variant text-[18px] group-focus-within:text-primary transition-colors">lock</span>
                                </div>
                                <input 
                                    class="input-premium {{ $errors->has('password') ? 'border-red-500/50' : '' }}" 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    placeholder="••••••••" 
                                    required 
                                    autocomplete="new-password"
                                />
                            </div>
                            @error('password')
                                <p class="text-red-500 text-[10px] font-bold uppercase tracking-wider mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold uppercase tracking-widest text-on-surface-variant ml-1" for="password_confirmation">Confirmar</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-on-surface-variant text-[18px] group-focus-within:text-primary transition-colors">lock_reset</span>
                                </div>
                                <input 
                                    class="input-premium" 
                                    id="password_confirmation" 
                                    name="password_confirmation" 
                                    type="password" 
                                    placeholder="••••••••" 
                                    required 
                                    autocomplete="new-password"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="pt-4">
                        <button type="submit" class="btn-premium">
                            Registrarse
                            <span class="material-symbols-outlined text-[18px]">how_to_reg</span>
                        </button>
                    </div>
                </form>

                <!-- Footer Links -->
                <div class="mt-10 pt-8 border-t border-surface-variant text-center">
                    <p class="text-sm text-on-surface-variant">
                        ¿Ya tienes una cuenta? 
                        <a class="text-primary font-bold hover:text-blue-400 transition-colors" href="{{ route('login') }}">Iniciar sesión</a>
                    </p>
                </div>
            </div>

            <!-- System Status Hint -->
            <div class="mt-8 flex items-center justify-center gap-3 opacity-60">
                <div class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_8px_rgba(37,99,235,0.8)] animate-pulse"></div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Sistemas Operativos Activos</span>
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
