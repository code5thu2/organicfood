<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class supplierEditRequest extends FormRequest
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
        $id = request()->id;
        return [
            'name' => 'required|max:100|unique:suppliers,name,' .$id,
            'upload' => 'mimes:jpg,jpeg,png|max:1024'
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Tên nhà cung cấp không được để trống',
            'name.max' => 'Tên nhà cung cấp không quá 100 kí tự',
            'name.unique' => 'Tên nhà cung cấp đã tồn tại',
            'upload.mimes' => 'Ảnh phải là định dạng jpq, jpeg, png',
            'upload.max' => 'Kích thước ảnh không quá 1024kb'
        ];
    }
}
