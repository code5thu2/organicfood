<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class shippingRequest extends FormRequest
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
            'cost' => 'required|numeric|min:0|not_in:0',
        ];
    }
    public function messages()
    {
        return [
            'cost.required' => 'Phương thức vận chuyển Không được để trống',
            'cost.required' => 'Phí vận chuyển Không được để trống',
            'cost.numeric' => 'Phí vận chuyển phải là dạng số',
            'cost.min' => 'Phí vận chuyển phải lớn hơn 0',
            'cost.not_in' => 'Phí vận chuyển phải lớn hơn 0',
        ];
    }
}
