<?php
// Tạo hàm upload ảnh và thay đổi tên ảnh
if (!function_exists('uploadImg')) {
    function uploadImg($field_name)
    {
        $info = pathinfo(request()->$field_name->getClientOriginalName());
        $image_name = $info['filename'];
        $image_ex = $info['extension'];
        $full_name = time() . '-' . Str::slug($image_name) . '.' . $image_ex;
        request()->$field_name->move(public_path('uploads'), $full_name);
        return $full_name;
    }
}
if (!function_exists('slugName')) {
    function slugName($field_name)
    {
        return $slug = Str::slug(request()->$field_name);
    }
}
