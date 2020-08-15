<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productEditRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|numeric|min:0|not_in:0',
            'sale' => 'numeric|min:0|lt:price',
            'image' => 'required|max:100',
            'description' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'unit_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.numeric' => 'Giá sản phẩm phải là dạng số',
            'price.min' => 'Giá sản phẩm phải lớn hơn 0',
            'price.not_in' => 'Giá sản phẩm phải lớn hơn 0',
            'sale.numeric' => 'Giá sale sản phẩm phải là dạng số',
            'sale.min' => 'Giá sale sản phẩm phải lớn hơn 0',
            'sale.lt' => 'Giá sale sản phẩm phải nhỏ hơn giá gốc',
            'image.required' => 'Ảnh sản phẩm không được để trống',
            'image.max' => ' Tên ảnh sản phẩm quá dài',
            'description.required' => 'Mô tả sản phẩm không được để trống',
            'status.required' => 'Trạng tháithái sản phẩm không được để trống',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'supplier_id.required' => 'Vui lòng chọn nhà cung cấp',
            'unit_id.required' => 'Vui lòng chọn đơn vị tính',
        ];
    }
}
