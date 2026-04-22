<x-app-layout hide-sidebar="true">
    <div class="relative">
        <!-- Ambient Glow -->
        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-primary/20 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8 relative z-10">
            <!-- Premium Header -->
            <div class="mb-16 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary/10 border border-primary/20 mb-6 shadow-[0_0_30px_rgba(0,174,239,0.1)]">
                    <span class="material-symbols-outlined text-4xl text-primary">account_circle</span>
                </div>
                <h2 class="font-space-grotesk text-4xl font-black text-white tracking-tighter mb-2">
                    Configuración de Perfil
                </h2>
                <p class="text-on-surface-variant max-w-md mx-auto">
                    Administra tu información personal, seguridad y preferencias de cuenta.
                </p>
            </div>

            <div class="space-y-12">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    @livewire('profile.update-password-form')
                @endif

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    @livewire('profile.two-factor-authentication-form')
                @endif

                @livewire('profile.logout-other-browser-sessions-form')

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    @livewire('profile.delete-user-form')
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
