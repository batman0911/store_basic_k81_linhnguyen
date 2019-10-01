<?php

namespace App\Http\Requests\Backend;

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
        return [
            'email'=>'required|email',
            'password' => 'required',
            'name'=>'required|min:5',
            'phone'=>'required',
            'address'=>'required|min:8',
            'id_number'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'Không được để trống email',
            'email.email'=>'Email không đúng định dạng',
            'password.required' => 'Password không được để trống',
            'name.required'=>'Không được để trống Họ và tên',
            'name.min'=>'Họ tên không được nhỏ hơn 5 ký tự',
            'phone.required'=>'số điện thoại không được để trống',
            'address.required'=>'địa chỉ không được để trống',
            'address.min'=>'Địa chỉ không được nhỏ hơn 8 ký tự',
            'id_number.min'=>'số CMT không được để trống',
        ];
    }
}
