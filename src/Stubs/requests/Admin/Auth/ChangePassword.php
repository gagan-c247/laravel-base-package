<?php

namespace App\Http\Requests\Admin\Auth;

use App\Http\Requests\BaseRequest;

class ChangePassword extends BaseRequest
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
            'old_password' => 'required', // Ensure old password is provided
            'password' => 'required|confirmed|min:8|max:15', // Password is required, must be confirmed, and length should be between 6 and 15
            'password_confirmation' => 'required|same:password', // Confirm password must match the password field
        ];
    }
}
