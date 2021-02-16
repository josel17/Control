<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveCategoriaRequest extends FormRequest
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
            'nombre' => ['required',Rule::unique('categoria')->ignore($this->route('categorias'))],
            'id_estado' => 'required',
            'descripcion' => ['max:255','required'],
            'user_register_id' => '',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'descripcion.max' => 'La descripcion no puede exceder mas de 255 caracteres',
            'descripcion.required' => 'Debes ingresar una descripcion de la categoria',
            'id_estado.required' => 'El campo estado es obligatorio'
        ];
    }
}
