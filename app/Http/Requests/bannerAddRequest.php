<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bannerAddRequest extends FormRequest
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
            'name' => 'required|max:100|unique:banners|',
            'upload' => 'mimes:jpg,jpeg,png|max:2048',
            'prioty' => 'integer',
            'link' => 'required',
            'descript' => 'required',
            'prioty' => 'numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên banner không được để trống',
            'name.max' => 'Tên banner không quá 100 kí tự',
            'name.unique' => 'Tên banner đã tồn tại',
            'upload.mimes' => 'Định dạnh ảnh phải là jpg, jpeg, png',
            'upload.max' => 'Kích thước ảnh không được quá 2048kb',
            'upload.required' => 'Ảnh không được để trống',
            'link.required' => 'Link không được để trống',
            'descript.required' => 'Mô tả không được để trống',
            'prioty.numeric' => 'chỉ được nhập số',
        ];
    }
}
