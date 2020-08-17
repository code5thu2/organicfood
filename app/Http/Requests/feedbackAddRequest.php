<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class feedbackAddRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng điền tên của bạn',
            'email.required' => 'Vui lòng điền email của bạn',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Vui lòng điền số điện thoại của bạn',
            'phone.numeric' => 'Số điện thoại không đúng định dạng',
            'content.required' => 'Vui lòng điền nội dung phản hồi',
        ];
    }
}
