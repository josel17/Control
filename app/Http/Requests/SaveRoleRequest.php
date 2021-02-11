<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveRoleRequest extends FormRequest
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
            'display_name' => 'required',
            'guard_name' => 'required'
        ];

         if($this->method()!=='PATCH')
            {
                 $rules['name'] = ['required',Rule::unique('Roles')->ignore($this->route('role'))];
            }

            return $rules;

    }

    public function messages()
    {
         return [
            'name.required' => 'Se requiere un identificador para el role',
            'display_name.required' => 'Se requiere un nombre para el role',
            'guard_name.required' => 'Seleccione un guard para el role'
        ];
    }
}
