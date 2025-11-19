<x-guest-layout>
    <div class="text-center">
        <x-mary-icon name="m-user-group" class="w-12 h-12 text-blue-500" />
        <div class="w-full md:1/2  md:w-1/2 mx-auto mt-3 p-1">
            <x-mary-header title="Crea tu cuenta" subtitle="Únete a la plataforma de servicios del ITCJ" separator />
        </div>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <x-validation-errors class="mb-4" />
        <div class="w-full md:1/2 md:w-1/2 mx-auto mt-10 p-3">
            <div class="grid grid-cols-2 gap-4">
                <x-mary-input label="Nombre" id="name" wire:model="name" name="name"
                    placeholder="Ingresa tu nombre" icon="o-user" hint="Tu nombre completo" value="{{ old('name') }}" required />

                <x-mary-input label="Apellido" wire:model="apellido" name="apellido" placeholder="Ingresa tus apellido"
                    icon="o-user" hint="Tus apellidos completos" value="{{ old('apellido') }}" required />
            </div><br>

            <div class="grid gap-8">
                <x-mary-input label="Correo electrónico institucional" id="email" name="email"
                    placeholder="Tu parte del correo" prefix="" suffix="@cdjuarez.tecnm.mx" value="{{ old('email') }}"
                    required pattern="[A-Za-z0-9._%+-]+" title="Solo la parte antes de @ (letras, números y ._%+-)" />

                <x-mary-input label="Matrícula" id="matricula" name="matricula" placeholder="Ingresa tu matrícula" value="{{ old('matricula') }}" required pattern="[A-Za-z0-9-]+" title="Matrícula válida" />

                <x-mary-password label="Contraseña" id="password" name="password" right required />

                <x-mary-password label="Confirmar contraseña" id="password_confirmation" name="password_confirmation"
                    password-icon="o-lock-closed" password-visible-icon="o-lock-open" required />
            </div><br>
            <div class="grid gap-8">
                <x-mary-button label="Registrarse" class="btn-primary" type="submit" />

            </div>
    </form>
    </div>
</x-guest-layout>
