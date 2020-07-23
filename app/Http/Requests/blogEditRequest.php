<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class blogEditRequest extends FormRequest
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
            'slug' => 'unique:blogs,slug,' . request()->id,
            'upload' => 'mimes:jpg,jpeg,png|max:1024',
            'summary' => 'required', 
            'content' => 'required' 
        ];
    }
     public function messages()
    {
        return [
            'name.required' => 'Tên blog không được để trống',
            'name.max' => 'Tên blog không quá 100 kí tự',
            'upload.mimes' => 'Định dạnh ảnh phải là jpg, jpeg, png',
            'upload.max' => 'Kích thước ảnh không được quá 1024kb',
             'summary.required' => 'Tóm tắt không được để trống',
             'content.required' => 'Nội dung không được để trống',
              'upload.required' => 'Ảnh không được để trống',
        ];
    }
}
