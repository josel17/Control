<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuscarBalanceRequest extends FormRequest
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
            'init' => ['required','date'],
            'end' => ['required','date','after_or_equal:init'],
        ];

    }

    public function attributes()
    {
        return [
            'init' => 'Fecha Inicial',
            'end' => 'Fecha Final'
        ];
    }
}
