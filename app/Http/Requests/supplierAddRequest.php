<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class supplierAddRequest extends FormRequest
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
            'name' => 'required|max:100|unique:suppliers',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'Tên nhà cung cấp không được để trống',
            'name.required' => 'Tên nhà cung cấp không được để trống',
            'name.max' => 'Tên nhà cung cấp không quá 100 kí tự',
            'name.unique' => 'Tên nhà cung cấp đã tồn tại',
        ];
    }
}
