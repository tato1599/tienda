<x-guest-layout>
        <div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="bg-gray-100 w-full max-w-md rounded-2xl shadow-lg p-10 border border-gray-200">

    <div class="text-center">
        <x-mary-icon name="m-user-group" class="w-12 h-12 text-blue-500" /> 
    <div class="w-full max-w-lg mx-auto mt-10 p-3">
        <x-mary-header title="Iniciar Sesión" subtitle="Bienvenido de nuevo, por favor, ingresa tus datos" />
    </div>
    </div>
    <div class="w-full max-w-lg mx-auto mt-.5 p-3">
        <div class="grid gap-5">
            <x-mary-input label="Correo electrónico institucional/Matricula" wire:model="name" prefix="" suffix="@cdjuarez.tecnm.mx" />

            <x-mary-password label="Contraseña" wire:model="password" right />

        </div><br>
        <div class="grid gap-8">
            <x-mary-button label="Registrarse" class="btn-primary" type="submit"/>
            
        </div>
    </div>
    </div>
    </div>
</x-guest-layout>