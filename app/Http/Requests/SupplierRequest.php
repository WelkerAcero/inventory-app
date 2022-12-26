<?php

namespace App\Http\Requests;

use App\Models\Supplier;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

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
        if ($this->isMethod('PUT')) {
            return [
                'sup_code' => 'required', Rule::unique('suppliers')->ignore($this->supplier->id),
                'sup_email' => 'required', Rule::unique('suppliers')->ignore($this->supplier->id),
                'document_type_id' => [],
                'document_number' => [],
                'sup_cellphone' => [],
                'sup_name' => 'required',
                'sup_lastname' => [],
                'department_id' => 'required',
                'sup_city' => 'required',
                'sup_street' => 'required'
            ];
        }
        if ($this->isMethod('POST')) {
            return [
                'sup_code' => 'required|unique:suppliers',
                'document_type_id' => [],
                'document_number' => [],
                'sup_email' => 'unique:suppliers',
                'sup_cellphone' => [],
                'sup_name' => 'required',
                'sup_lastname' => [],
                'department_id' => 'required',
                'sup_city' => 'required',
                'sup_street' => 'required'
            ];
        }
    }

    public function attributes()
    {
        return [
            'sup_code' => '"Código del proveedor"',
            'sup_name' => '"El nombre del proveedor"',
            'sup_email' => '"Email del proveedor"',
            'department_id' => '"El campo departamento"',
            'sup_city' => '"La ciudad es"',
            'sup_street' => '"Dirección de calle o nro de local"'
        ];
    }

    public function messages()
    {
        return [
            'sup_code.required.unique:suppliers' => '"Código del proveedor es requerido"',
            'sup_email.unique:suppliers' => '"El email del proveedor ya esapdkasd"',
            'sup_name.required' => '"El nombre del proveedor es requerido"',
            'department_id.required' => '"El departamento es requerido"',
            'sup_city.required' => '"La ciudad es requerida"',
            'sup_street.required' => '"Dirección de calle o nro de local requerido"'
        ];
    }
}
