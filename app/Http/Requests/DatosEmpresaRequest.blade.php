<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatosEmpresaRequest extends FormRequest
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
            'nit' => ['required','numeric'],
            'nombre' => ['required'],
            'direccion' => ['required'],
            'telefono' => ['required','numeric'],
            'email' => ['']
        ];

    }

    public function messages()
    {
      return [
        'nit.required' => 'El campo NIT es obligatorio',
        'nit.numeric' => 'El campo NIT debe ser un numero',
        'nombre.required' => 'El campo nombre es obligatorio',
        'direccion.required' => 'El campo direccion es obligatorio',
        'telefono.required' => 'El campo telefono es obligatorio',
        'telefono.numeric' => 'El campo telefono debe ser un numero'
        ];
    }
}
