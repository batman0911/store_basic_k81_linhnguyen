<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'full' => 'required|min:7',
            'email' => 'required|email',
            'phone'=> 'required|min:7|max:10',
        ];
    }

    public function messages()
    {
        return [
            'full.required' => "Không được để trống họ và tên",
            'email.required' => 'Không được để trống email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'phone.required' => 'Không được để trống điện thoại',
            'phone.min' => 'Số điện thoại không được ít hơn 7 kí tự',
            'phone.max' => 'Số điện thoại không được nhiều hơn 10 kí tự',
        ];
    }
}
