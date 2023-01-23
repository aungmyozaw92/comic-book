<?php

namespace App\Http\Requests\Profile;

use Illuminate\Support\Facades\Hash;
use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'old_password'       => 'required_with:new_password|string|min:6',
            'new_password'       => 'nullable|confirmed|string|min:6',
        ];
    }

    /**
    * Configure the validator instance.
    *
    * @param  \Illuminate\Validation\Validator  $validator
    * @return void
    */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->has('old_password') && !Hash::check($this->old_password, \Auth::user()->password)) {
                $validator->errors()->add('old_password', 'Old password not valid');
            }
        });
    }
}
