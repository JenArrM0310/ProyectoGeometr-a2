<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validacionesLogin extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'emaillog' => 'required|email',
            'passlog' => 'required',
        ];
    }

     public function messages()
    {
        return [
            'emaillog.required' => 'No ha ingresado su email',
            'emaillog.email' => 'El correo debe tener un formato válido',
            'passlog.required' => 'No ha ingresado su contraseña',
        ];
    }
}
