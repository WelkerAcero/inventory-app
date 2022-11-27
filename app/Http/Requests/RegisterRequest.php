<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:40'],
            'lastname' => [],
            'cellphone' => [],
            'document_type_id' => [],
            'document_number' => [],
            'department_id' => [],
            'document_number' => [],
            'department_id' => [],
            'city' => [],
            'street' => [],
            'email' => [],
            'role_id' => ['required'],
            'password' => [
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
}
