<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class payEditRequest extends FormRequest
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
            'name' => 'required|max:100|unique:pays,name,' . request()->id,
            'prioty'=>'numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Tên không quá 100 kí tự',
            'name.unique' => 'Tên đã tồn tại',
            'prioty.numeric' => 'Chỉ được nhập số',
        ];
    }
}
