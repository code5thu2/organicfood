<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryEditRequest extends FormRequest
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
            'name' => 'required|max:100|unique:categories,name,' . request()->id,
            'slug' => 'unique:categories,slug,' . request()->id,
            'upload' => 'mimes:jpg,jpeg,png|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Category name cannot be empty',
            'name.max' => 'Category name cannot exceed 100 characters',
            'name.unique' => 'Category name already exists dasda',
            'slug.unique' => 'slug already exists',
            'upload.mimes' => 'Image format must be jpg, jpeg, png file',
            'upload.max' => 'Please choose a photo smaller than 2048'
        ];
    }
}
