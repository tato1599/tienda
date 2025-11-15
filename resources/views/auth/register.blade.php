<x-guest-layout>
    <div class="text-center">
        <x-mary-icon name="m-user-group" class="w-12 h-12 text-blue-500" /> 
    <div class="w-1/2 mx-auto mt-3 p-1">
        <x-mary-header title="Crea tu cuenta" subtitle="Únete a la plataforma de servicios del ITCJ" separator />
    </div>
    </div>
    
    <div class="w-1/2 mx-auto mt-10 p-3">
        <div class="grid grid-cols-2 gap-4">
            <x-mary-input label="Nombre" wire:model="name" placeholder="Ingresa tu nombre" icon="o-user" hint="Tu nombre completo" />

            <x-mary-input label="Apellido" wire:model="name" placeholder="Ingresa tus apellido" icon="o-user" hint="Tus apellidos completos" />
        </div><br>
    
        <div class="grid gap-8">
            <x-mary-input label="Correo electrónico institucional" wire:model="name" prefix="" suffix="@cdjuarez.tecnm.mx" />

            <x-mary-input label="Matrícula" wire:model="name" placeholder="Ingresa tu matrícula" />

            <x-mary-password label="Contraseña" wire:model="password" right />

            <x-mary-password label="Confirmar contraseña" wire:model="password" password-icon="o-lock-closed" password-visible-icon="o-lock-open" />

        </div><br>
        <div class="grid gap-8">
            <x-mary-button label="Registrarse" class="btn-primary" type="submit"/>
            
        </div>
    </div>
</x-guest-layout>