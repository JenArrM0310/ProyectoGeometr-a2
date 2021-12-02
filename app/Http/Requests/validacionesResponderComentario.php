<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validacionesResponderComentario extends FormRequest
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
            'respuesta' => 'required|max:350',
        ];
    }
    public function messages(){
        return [
            'respuesta.required' => 'No ha escrito su respuesta',
            'required.max' => 'La respuesta no debe de contener más de 350 caracteres',
        ];
    }
}
