<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuscarClienteRequest extends FormRequest
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
            'documento' => ['numeric','required'],
        ];
    }
    public function messages()
    {
        return [
            'documento.required' => 'Numero de documento requerido',
            'documento.numeric' => 'Solo puedes digitar numeros en el campo documento',
        ];
    }
}
