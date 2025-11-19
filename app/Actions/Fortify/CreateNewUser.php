<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
// 1. Importar el modelo Customer de Lunar
use Lunar\Models\Customer;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // 1. Validar la Matrícula y ajustar la validación del correo
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            // El campo 'email' contendrá solo la parte antes del '@', lo validamos como requerido y con caracteres válidos
            'email' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z0-9._%+-]+$/'],
            // Nueva validación para la matrícula (comprobar unicidad sobre la columna matricula)
            'matricula' => ['required', 'string', 'max:50', 'unique:users,matricula'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Construye el email completo para la verificación de unicidad final
        $fullEmail = $input['email'] . '@cdjuarez.tecnm.mx';

        // Re-validar la unicidad del email completo después de construirlo
        Validator::make(['email_completo' => $fullEmail], [
            'email_completo' => ['unique:users,email'],
        ])->validate();

        // --- INICIO: Lógica para la creación del User ---
        $user = User::create([
            'name' => $input['name'] . ' ' . $input['apellido'],
            'email' => $fullEmail, // Usamos el email completo
            'matricula' => $input['matricula'], // Guardar la Matrícula
            'password' => Hash::make($input['password']),
        ]);
        // --- FIN: Lógica para la creación del User ---

        // 2. Crear el Customer de Lunar
        $customer = Customer::create([
            // Puedes añadir 'title' si lo solicitas en el formulario de registro
            // 'title' => $input['title'] ?? null,
            'first_name' => $input['name'],
            'last_name' => $input['apellido'],
            // Si necesitas otros campos como company_name, agrégalos aquí.
        ]);


        // 3. Asociar el User con el Customer
        // Se utiliza la relación 'users' en el modelo Customer de Lunar
        $customer->users()->attach($user);

        return $user;
    }
}
