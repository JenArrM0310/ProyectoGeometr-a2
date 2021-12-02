<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validacionesComentarios extends FormRequest
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
            'comentario' => 'required|max:350|min:40',
            'respuesta' => 'required',
        ];
    }
    public function messages(){
        return[
            'comentario.required' => 'No has escrito tus comentarios',
            'comentario.max' => 'Tu comentario contiene más de 350 caracteres',
            'comentario.min' => 'Tu comentario debe de contener por lo menos 40 caracteres',
            'respuesta.required' => 'Seleccione una opción',
        ];
    }
}
