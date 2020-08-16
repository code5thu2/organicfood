<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class faqEditRequest extends FormRequest
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
            'name' => 'required|unique:faqs,name,'  . request()->id,
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên faq không được để trống',
            'name.unique' => 'Tên faq đã tồn tại',
            'content.required' => 'Nội dung không được để trống',
        ];
    }
}
