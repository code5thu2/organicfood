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
            'name' => 'required|max:100|',
            'image' => 'required',
            'link' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên banner không được để trống',
            'name.max' => 'Tên banner không quá 100 kí tự',
            'image.required' => 'Ảnh banner không được để trống',
            'link.required' => 'Link không được để trống',
            'description.required' => 'Mô tả chính không được để trống',
        ];
    }
}
