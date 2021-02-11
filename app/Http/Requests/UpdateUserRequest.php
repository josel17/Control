<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth()->user()->hasRole('Admin'))
        {
            return true;
        }
        else
        {
            return false;
        }

    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
                    'username' => ['required', Rule::unique('users')->ignore($this->route('usuario')->id)],
                    'id_persona' => 'required',
                    'observacion' => ''
            ];

            if($this->filled('password'))
            {
                $rules['password'] = ['confirmed','min:8','max:12'];
            }
        return $rules;
    }

    public function messages()
    {
        return [
            'username.required' => 'Nombre de usuario es requerido',
            'id_persona.required' => 'Se necesita un responsable para la cuenta',
            'password.required' => 'Se necesita una contraseña',

        ];
    }
}
