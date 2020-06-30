<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryAddRequest extends FormRequest
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
            'name' => 'required|max:100|unique:categories|',
            'upload' => 'mimes:jpg,jpeg,png|max:1024'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Category name cannot be empty',
            'name.max' => 'Category name cannot exceed 100 characters',
            'name.unique' => 'Category name already exists',
            'upload.mimes' => 'Image format must be jpg, jpeg, png file',
            'upload.max' => 'Please choose a photo smaller than 1024kb'
        ];
    }
}
