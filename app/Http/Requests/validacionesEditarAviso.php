<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validacionesEditarAviso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required|max:80', 
            'descripcion' => 'required|max:150',

        ];
    }
    public function messages(){
        return [
            'titulo.required' => 'Este campo no puede estar vacío, si no desea actualizarlo, deje el texto como estabá',
            'titulo.max' => 'El título contiene más de 80 caracteres',
            'descripcion.required' => 'Este campo no puede estar vacío, si no desea actualizarlo, deje el texto como estaba',
            'descripcion.max' => 'La descripcion contiene más de 150 caracteres',
        ];
    }
}
