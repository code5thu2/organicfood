<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userEditRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . request()->id,
        ];
        if (request()->password != '') {
            $rules['password'] = 'min:8';
            $rules['confirm_password'] = 'required|same:password';
        }
        return $rules;
    }
    public function messages()
    {
        $messages = [
            'name.required' => 'Tên người dùng không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã được sử dụng bởi người dùng khác',
        ];
        if (request()->password != '') {
            $messages['password.min'] = 'mật khẩu tối thiểu 8 ký tự';
            $messages['confirm_password.required'] = 'Nhập lại mật khẩu';
            $messages['confirm_password.same'] = 'Mật khẩu nhập lại không đúng';
        }
        return $messages;
    }
}
