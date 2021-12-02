<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validacionesEditarVideo extends FormRequest
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
            'nombre_video' => 'required|max:100',
            'descripcion' => 'required|max:250',
        ];
    }
    public function messages(){
        return [
            'nombre_video.required' => 'No ingresó el título del video, si no desea actualizar este campo, dejelo como estabá',
            'nombre_video.max' => 'El título contiene más de 100 caracteres',
            'descripcion.required' => 'No ingresó la descripción del video, si no desea actualizar este campo, dejelo como estabá',
            'descripcion.max' => 'La descripción contiene más de 250 caracteres',
        ];
    }
}
