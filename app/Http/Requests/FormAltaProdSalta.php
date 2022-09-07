<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormAltaProdSalta extends FormRequest
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
            'id_formulario' => 'required',
            'price' => 'required|min:0',
        ];
    }
    public function messages()
    {
        return [
            'id_formulario.required' => 'El :attribute es obligatorio.'
        ];
    }
    /*public function attributes()
    {
        return [
            'name' => 'nombre del producto',
            'price' => 'precio de venta',
        ];
    }*/
}
