<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RequestSessionWeb extends FormRequest
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
            'email' => 'required',
            'password' => [
                'required',
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
            'email' => '"Email" es requerido',
            'password' => '"password" es requerido'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El campo "Email" es requerido',
            'password.required' => 'El campo "password" es requerido'
        ];
    }
}
