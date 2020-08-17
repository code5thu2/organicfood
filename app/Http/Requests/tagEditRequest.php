<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tagEditRequest extends FormRequest
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
            'name' => 'required|max:100|unique:tags,name,' . request()->id,
            'slug' => 'max:100|unique:tags,slug,' . request()->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên tag không được để trống',
            'name.unique' => 'Tên tag đã được sử dụng',
            'name.max' => 'Tên tag quá dài',
            'slug.max' => 'slug quá dài',
            'slug.unique' => 'slug đã được sử dụng',
        ];
    }
}
