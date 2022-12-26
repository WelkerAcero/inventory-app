<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'lastname' => 'required',
            'cellphone' => [],
            'document_type_id' => [],
            'document_number' => [],
            'role_id' => 'required',
            'department_id' => [],
            'city' => [],
            'street' => [],
            'email' => 'required',
            'password' =>
            [
                'required',
                'string',
                Password::min(6)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ];
    }


    public function attributes()
    {
        return [
            'name' => '"Nombre" es requerido"',
            'lastname' => '"Apellido" es requerido"',
            'email' => '"Email" es requerido"',
            'password' => '"password" es requerido'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo "Nombre es requerido"',
            'lastname.required' => 'El campo "Apellido es requerido"',
            'email.required' => 'El campo "Email es requerido"',
            'password.required' => 'El campo "password" es requerido'
        ];
    }
}
