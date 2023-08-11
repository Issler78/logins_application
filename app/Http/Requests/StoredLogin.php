<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoredLogin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|min:4|unique:logins,username',
            'email' => 'required|unique:logins,email|email',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Please enter a username.',
            'username.unique' => 'This user already exists.',
            'username.min' => 'Minimum of 4 characters.',
            'email.required' => 'Please enter a valid email.',
            'email.email' => 'Please enter a valid email.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'Minimum 6 characters.'
        ];
    }
}
