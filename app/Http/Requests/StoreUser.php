<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return true;
/*         if (session('authenticated')) {
            return true;
        }else{
            return false;
        } */
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:40',
            'lastname' => 'required|max:40',
            'email' => 'required',
            'password' => 'required',
        ];
    }

    
    public function attributes()
    {
        return [
            'email' => '"Email" es requerido"',
            'password' => '"password" es requerido'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El campo "Email es requerido"',
            'password.required' => 'El campo "password" es requerido'
        ];
    }
}
