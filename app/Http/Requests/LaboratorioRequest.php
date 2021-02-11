<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboratorioRequest extends FormRequest
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
            'nombre' => ['required'],
            'web' => ['required','url'],
            'email' => ['required','email'],
            'descripcion' => '',
        ];
    }

    function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'web.required' => 'El campo pagina web es obligatorio',
            'web.url' => 'El campo pagina web no es correcto',
            'email.redquired' => 'El campo E-mail es obligatorio',
        ];
    }
}
