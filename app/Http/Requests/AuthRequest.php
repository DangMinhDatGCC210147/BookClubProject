<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|max:255|email',
            'email' => 'required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Please enter your email to login',
            'email.email' => 'Please enter your correct email to login',
            'password.required' => 'Please enter your password to login',
        ];
    }
}
