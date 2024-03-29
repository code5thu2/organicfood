<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tagAddRequest extends FormRequest
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
            'name' => 'required|max:100|unique:tags',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên tag không được để trống',
            'name.unique' => 'Tên tag đã được sử dụng',
            'name.max' => 'Tên tag quá dài',
        ];
    }
}
