<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . $this->route('user')->id,
            'username' => 'nullable|string|unique:users,username,' . $this->route('user')->id,
            'is_admin' => 'nullable|boolean',
            'password' => 'nullable|string|confirmed|min:6',
        ];
    }
}
