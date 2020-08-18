<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class blogAddRequest extends FormRequest
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
            'name' => 'required|max:100|unique:blogs|',
            'summary' => 'required',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên blog không được để trống',
            'name.max' => 'Tên blog không quá 100 kí tự',
            'name.unique' => 'Tên blog đã tồn tại',
            'summary.required' => 'Tóm tắt không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'upload.required' => 'Ảnh không được để trống',
        ];
    }
}
