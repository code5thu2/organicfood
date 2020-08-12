<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createOrderRequest extends FormRequest
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
            'email' => 'required|email|',
            'phone' => 'required|numeric',
            'address' => 'required',
            'payment_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên người nhận không được để trống',
            'email.required' => 'Email người nhận không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'số điện thoại không được để trống',
            'phone.numeric' => 'số điện thoại không đúng định dạng',
            'address.required' => 'Địa chỉ không được để trống',
            'payment_id.required' => 'vui lòng chọn phương thức thanh toán',
        ];
    }
}
