<?php

namespace App\Http\Requests\Admin\Auth;

use C247\Codebank\Requests\BaseRequest;

class ResetPassword extends BaseRequest
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
        ];
    }
    public function messages()
    {
        return [
            'email.required' => __('validation_messages.forgot_password.email.required'),
            'email.email' => __('validation_messages.forgot_password.email.valid'),
            'email.exists' => __('validation_messages.forgot_password.email.not_registered'),
        ];
    }
}
