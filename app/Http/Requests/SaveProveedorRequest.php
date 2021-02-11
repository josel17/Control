<?php

namespace App\Http\Requests;


use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveProveedorRequest extends FormRequest
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
            'nit' => ['required','numeric',Rule::unique('proveedor')->ignore($this->route('proveedor'))],
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'tipo_proveedor' => '',
        ];
    }

    public function messages()
    {
        return [
            'nit.required' => 'El Campo NIT es obligatorio',
            'nit.numeric' => 'El campo NIT es de tipo numerico',
            'nit.unique' => 'Este NIT ya se encuentra registrado',
            'nombre.required' => 'El campo nombre es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio',
        ];
    }
}
