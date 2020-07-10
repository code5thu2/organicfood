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
              'name' => 'required|max:100|unique:suppliers|',
            'upload' => 'required|mimes:jpg,jpeg,png|max:1024',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên nhà cung cấp không được để trống',
            'name.max' => 'Tên nhà cung cấp không quá 100 kí tự',
            'name.unique' => 'Tên nhà cung cấp đã tồn tại',
            'upload.mimes' => 'Định dạnh ảnh phải là jpg, jpeg, png',
            'upload.max' => 'Kích thước ảnh không được quá 1024kb',
            'upload.required' => 'Ảnh không được để trống',
            
        ];
    }
}
