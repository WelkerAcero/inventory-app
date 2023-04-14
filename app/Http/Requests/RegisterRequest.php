<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
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

    protected function prepareForValidation()
    {
        if (Auth::user() && Auth::user()->role_id === 1) {
            $role_id = 1;
        } else {
            $role_id = 2;
        }

        if ($this->password === $this->password_confirmation) {
            $pass = $this->password;
        } else {
            $pass = '';
        }

        $this->merge([
            'role_id' => $role_id,
            'password' => $pass
        ]);
    }

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
            'email' => ['required', 'unique:users'],
            'role_id' => 'required',
            'password' => [
                'required',
                'confirmed',
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
