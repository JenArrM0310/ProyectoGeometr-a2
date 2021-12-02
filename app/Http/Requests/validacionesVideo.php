<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validacionesVideo extends FormRequest
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
            'nombre_video' => 'required|max:100|unique:tvideos,titulo',
            'descripcion' => 'required|max:250',
            'materia' =>'required',
            'metodo' => 'required',
            'archivo_video' => 'required_without:link_video|mimes:mp4|max:100000',
            'link_video' => 'required_without:archivo_video|url',
        ];
    }
    public function messages(){
        return [
            'nombre_video.required' => 'No ingresó el título del video',
            'nombre_video.max' => 'El título contiene más de 100 caracteres',
            'nombre_video.unique' => 'El título del video ya existe',
            'descripcion.required' => 'No ingresó la descripción del video',
            'descripcion.max' => 'La descripción contiene más de 250 caracteres',
            'materia.required' => 'No seleccionó la materia',
            'metodo.required' => 'No seleccionó el método para subir el video',
            'archivo_video.required_without' => 'No ingresó el link o cargó el archivo del video',
            'archivo_video.mimes' => 'El formato del video debe de ser mp4',
            'archivo_video.max' => 'El tamaño del archivo no puede ser mayor a 100mb',
            'link_video.required_without' => 'No ingresó el link o cargó el archivo del video', 
            'link_video.url' => 'El link no tiene un formato válido (youtube)',
        ];
    }
}

