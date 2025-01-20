<?php

namespace App\Http\Requests\Admin\Auth;

use C247\Codebank\Requests\BaseRequest;

class LoginRequest extends BaseRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => __('validation_messages.login.email.required'),
            'email.email' => __('validation_messages.login.email.valid'),
            'email.exists' => __('validation_messages.login.email.not_registered'),
            'password.required' => __('validation_messages.login.password.required'),
        ];
    }
}
