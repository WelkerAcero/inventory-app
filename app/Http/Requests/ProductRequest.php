<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'pro_img' => 'required',
            'pro_code' => 'required',
            'pro_name' => 'required',
            'pro_presentation' => 'required',
            'pro_state' => 'required',
            'pro_stock' => 'required',
            'pro_cost' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'pro_img' => '"Imagen del producto"',
            'pro_code' => '"Código del producto"',
            'pro_name' => 'Nombre del producto',
            'pro_presentation' => 'Presentación del item',
            'pro_state' => 'Estado del item',
            'pro_stock' => 'Stock actual',
            'pro_cost' => 'Costo o precio actual',
            'category_id' => 'Categoría del producto',
            'supplier_id' => 'Proveedor del item'
        ];
    }

    public function messages()
    {
        $campo = "Campo requerido";
        return [
            'pro_img.required' => $campo,
            'pro_code.required' => $campo,
            'pro_name.required' => $campo,
            'pro_presentation.required' => $campo,
            'pro_state.required' => $campo,
            'pro_stock.required' => $campo,
            'pro_cost.required' => $campo,
            'category_id.required' => $campo,
            'supplier_id.required' => $campo
        ];
    }
}
