<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class contactAddRequest extends FormRequest
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
            'email' => 'required|email|max:100',
            'phone' => 'required|numeric',
            'address' => 'required|max:100',
            'map' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email quá dài',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.numeric' => 'Số điện thoại không đúng định dạng',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ quá dài',
            'map.required' => 'Bản đồ không được để trống',
        ];
    }
}
