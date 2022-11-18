<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
/*         if (!empty(session('authenticated'))) {
            return false;
        } */

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
            'sup_code' => 'required',
            'sup_name' => 'required',
            'department_id' => 'required',
            'sup_city' => 'required',
            'sup_street' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'sup_code' => '"Código del proveedor es requerido"',
            'sup_name' => '"El nombre del proveedor es requerido"',
            'department_id' => '"El departamento es requerido"',
            'sup_city' => '"La ciudad es requerida"',
            'sup_street' => '"Dirección de calle o nro de local requerido"'
        ];
    }

    public function messages()
    {
        return [
            'sup_code.required' => '"Código del proveedor es requerido"',
            'sup_name.required' => '"El nombre del proveedor es requerido"',
            'department_id.required' => '"El departamento es requerido"',
            'sup_city.required' => '"La ciudad es requerida"',
            'sup_street.required' => '"Dirección de calle o nro de local requerido"'
        ];
    }

}
