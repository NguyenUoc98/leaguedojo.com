<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules()
    {
        if ($this->has(['name', 'email'])) {
            return [
                'name'  => 'required|string|max:40',
                'email' => 'required|string|email|max:60|unique:users,email,' . auth()->user()->id,
            ];
        } elseif ($this->has(['password'])) {
            return [
                'old_password' => 'required',
                'password'     => 'required|string|min:8|confirmed|different:old_password',
            ];
        } else {
            return [];
        };
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.different' => 'Oop! Mật khẩu mới phải khác mật khẩu cũ chứ?',
        ];
    }
}
