<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        return [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Password phải có từ 6 kí tự trở lên'

        ];
    }

}
