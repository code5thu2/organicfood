<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkPassRequest extends FormRequest
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
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'pasword.required' => 'password không được để trống',
            'pasword.min' => 'password tối thiểu 8 ký tự',
            'confirm_password.required' => 'nhập lại mật khẩu',
            'confirm_password.same' => 'mật khẩu nhập lại không chính xác'
        ];
    }
}
