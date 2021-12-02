<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validacionesRegistro extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ]+$/u|max:100',
            'email' => 'required|email|max:60|unique:tusuarios,email',
            'password' => 'required|min:8|max:30',
            'repetir' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
             'nombre.required' => 'El nombre es un campo requerido',
             'nombre.regex' => 'El cambo debe tener solamente letras',
             'nombre.max' => 'El nombre contiene más de 100 caracteres',
             'email.required' => 'El email es un campo requerido',
             'email.email' => 'El correo debe tener un formato válido',
             'email.max' => 'El email contiene más de 60 caracteres',
             'email.unique' => 'El email ya está registrado',
             'password.required' => 'La contraseña es un campo requerido',
             'password.max' => 'La contraseña tiene más de 30 caracteres',
             'password.min' => 'La contraseña debe de tener almenos 8 caracteres',
             'repetir.required' => 'Vuelva a escribir la contraseña',
             'repetir.same' => 'Las contraseñas no coinciden',
        ];
    }
}
