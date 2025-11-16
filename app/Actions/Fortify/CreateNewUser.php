<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            // El campo 'email' contendrá solo la parte antes del '@', lo validamos como requerido y string
            'email' => ['required', 'string', 'max:255'],
            // Nueva validación para la matrícula
            'matricula' => ['required', 'string', 'max:255', 'unique:users'], // Asumiendo que la matrícula es única
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Construye el email completo para la verificación de unicidad final
        $fullEmail = $input['email'] . '@cdjuarez.tecnm.mx';

        // Re-validar la unicidad del email completo después de construirlo
        Validator::make(['email_completo' => $fullEmail], [
            'email_completo' => ['unique:users,email'],
        ])->validate();


        // Esta funcion crea un nuevo usuario en la base de datos con los datos validados
        return User::create([
            'name' => $input['name'] . ' ' . $input['apellido'],
            'email' => $fullEmail, // Usamos el email completo
            'matricula' => $input['matricula'], // 3. Guardar la Matrícula
            'password' => Hash::make($input['password']),
        ]);
    }
}
