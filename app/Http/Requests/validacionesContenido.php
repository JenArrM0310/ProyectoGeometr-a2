<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validacionesContenido extends FormRequest
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
            'titulo' => 'required|max:80|unique:tavisos,titulo',
            'descripcion' => 'required|min:10|max:150|unique:tavisos,descripcion',
            'imagen' => 'required|image|mimes:jpg,png,gif|max:10000',


        ];
    }
    public function messages(){
        return[
            'titulo.required' => 'No ha escrito el título',
            'titulo.max' => 'El título no debe de contener más de 80 caracteres',
            'titulo.unique' => 'El aviso ya existe',
            'descripcion.required' => 'No ha escrito la descripción',
            'descripcion.min' => 'El contenido debe de tener por lo menos 10 caracteres',
            'descripcion.max' => 'El contenido no debe de contener más de 120 caracteres',
            'descripcion.unique' => 'La descripcion ya existe',
            'imagen.required' => 'No ha elegido una imagen',
            'imagen.image' => 'El archivo debe de ser una imagen',
            'imagen.mimes' => 'La extensión debe de ser jpeg, png o gif',

            
        ];
    }
}
