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

        //este es un validador de datos para crear un nuevo usuario
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'], // Aqui se valida el nombre del usuario que sea requerido,
            // string y maximo 255 caracteres
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Aqui se valida el email del usuario que
            //sea requerido, string, formato email, maximo 255 caracteres y unico en la tabla users
            'password' => $this->passwordRules(), // Aqui se valida la contraseña del usuario con las reglas definidas en el
            //trait PasswordValidationRules
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '', // Aqui se valida que los
            //terminos y condiciones sean aceptados si la caracteristica esta habilitada
        ])->validate();
        /* Un trait es un
            mecanismo para reutilizar codigo en lenguajes de programacion orientados a objetos como PHP.
            Los traits permiten agrupar metodos y propiedades que pueden ser utilizados en multiples clases,
            evitando la duplicacion de codigo y facilitando el mantenimiento.
        */


        // Esta funcion crea un nuevo usuario en la base de datos con los datos validados
        return User::create([ // Se utiliza el modelo User para crear un nuevo registro en la tabla users
            'name' => $input['name'], // Se asigna el nombre del usuario
            'email' => $input['email'], // Se asigna el email del usuario
            'password' => Hash::make($input['password']), // Se asigna la contraseña del usuario encriptada
        ]);
    }
}
