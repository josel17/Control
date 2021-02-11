<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'id_tipodocumento' => 'required',
            'documento' => ['required', 'integer', Rule::unique('personas')->ignore($this->route('cliente'))],
            'nombre' => 'required',
            'apellidos' => 'required',
            'id_genero' => 'required',
            'email' => '',
            'telefono' => 'required|integer',
            'direccion' => 'required',
            'id_departamento' => '',
            'id_ciudad' => '',
            'observacion' => '',
            'tipo' => '',
        ];
    }

    public function messages()
    {
        return [
            'documento.required' => 'El campo documento es obligatorio',
            'documento.unique' => 'Numero de documento ya registrado',
            'id_genero.required' => 'El campo genero es obligatorio',
            'id_ciudad.required' => 'El campo ciudad es obligatorio',
            'id_departamento.required' => 'El campo departamento es obligatorio',
            'id_tipodocumento.required' => 'El campo tipo de documento es obligatorio'
        ];
    }
}
