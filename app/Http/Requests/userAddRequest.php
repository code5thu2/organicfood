<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userAddRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Tên không được quá 100 ký tự',
            'email.required' => 'email không được để trống',
            'email.email' => 'email không đúng định dạng',
            'email.unique' => 'email đã được sử dụng',
            'pasword.required' => 'password không được để trống',
            'pasword.min' => 'password tối thiểu 8 ký tự',
            'confirm_password.required' => 'nhập lại mật khẩu',
            'confirm_password.same' => 'mật khẩu nhập lại không chính xác'
        ];
    }
}
