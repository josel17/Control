<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuscarOrdenRequest extends FormRequest
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
            'numero_orden' => ['required','numeric'],
        ];
    }

    public function messages()
    {
        return
        [
            'numero_orden.required' => 'Campo requerido',
            'numero_orden.numeric' => 'El campo debe ser numerico',

        ];
    }
}
