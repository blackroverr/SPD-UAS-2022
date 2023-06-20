<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return[
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:255',
            'role_id' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return[
            
            'name.required' => 'Name Wajib diisi',
            'email.required' => 'Email Wajib diisi',
            'password.required' => 'Password Wajib diisi',
            'role_id.required' => 'Role Wajib diisi',
            
        ];
        
    }   
}
