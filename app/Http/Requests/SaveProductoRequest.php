<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveProductoRequest extends FormRequest
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
            'codigo'=>['required',Rule::unique('productos')->ignore($this->route('producto'))],
            'nombre' => 'required',
            'referencia' => 'required',
            'id_categoria' => 'required',
            'id_proveedor' => 'required',
            'id_laboratorio' => 'required',
            'reg_sanitario' => 'required',
            'ean' => '',
            'id_presentacion' => 'required',
            'contenido' => 'required',
            'id_ume' => 'required',
            'precio_compra' => 'required',
            'id_regla_impuesto' => 'required',
            'precio_venta' => 'required',
            'id_estado' => 'required',
            'descripcion' => 'max:255',
        ];
    }

    public function messages()
    {
       return [
            'codigo.required'=>'El campo codigo es obligatorio',
            'nombre.required' =>'El campo nombre es obligatorio',
            'referencia.required' =>'El campo referencia es obligatorio',
            'id_categoria.required' =>'El campo categoria es obligatorio',
            'id_proveedor.required' =>'El campo proveedor es obligatorio',
            'id_laboratorio.required' =>'El campo laboratorio es obligatorio',
            'reg_sanitario.required'  => 'El campo registro sanitario es obligatorio',
            'id_presentacion.required' => 'El campo Presentacion es obligatorio',
            'contenido.required' => 'El campo cantidad por caja es obligatorio',
            'id_ume.required' =>'El campo unidad de medida es obligatorio',
            'precio_compra.required' => 'El campo precio de compra es obligatorio',
            'id_regla_impuesto.required' => 'El campo regla de impuesto es obligatorio',
            'precio_venta.required' => 'El campo  precio de venta es obligatorio',
            'id_estado.required' => 'El campo estado es obligatorio',
        ];
    }
}

