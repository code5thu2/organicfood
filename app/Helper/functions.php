<?php

use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Route;
// Tạo hàm upload ảnh và thay đổi tên ảnh
if (!function_exists('uploadImg')) {
    function uploadImg($field_name)
    {
        $info = pathinfo(request()->$field_name->getClientOriginalName());
        $image_name = $info['filename'];
        $image_ex = $info['extension'];
        $full_name = time() . '-' . Str::slug($image_name) . '.' . $image_ex;
        request()->$field_name->move('uploads', $full_name);
        return $full_name;
    }
}
if (!function_exists('slugName')) {
    function slugName($field_name)
    {
        return $slug = Str::slug(request()->$field_name);
    }
}
//Hàm láy ra mảng route admin
if (!function_exists('adminRoute')) {
    function adminRoute()
    {
        $routes = [];
        $all = Route::getRoutes();
        foreach ($all as $r) {
            $name = $r->getName();
            $pos = strpos($name, 'admin');
            if ($pos !== false && !in_array($name, $routes)) {
                array_push($routes, $r->getName());
            }
        }
        return $routes;
    }
}
if (!function_exists('addProduct')) {
    function addProduct()
    {
        $product_id = Product::create(
            [
                'name' => request()->name,
                'price' => request()->price,
                'sale' => request()->sale,
                'description' => request()->description,
                'category_id' => request()->category_id,
                'supplier_id' => request()->supplier_id,
                'unit_id' => request()->unit_id,
                'status' => request()->status,
                'content' => request()->content,
                'slug' => request()->slug,
                'image' => request()->image,
            ]
        );
        $photos = json_decode(request()->other_image, true);
        foreach ($photos as $photo) {
            $image_name = str_replace(url('uploads') . '/', '', $photo);
            Image::create([
                'product_id' => $product_id->id,
                'name' => $image_name,
                'prioty' => 1,
                'status' => 1,
            ]);
        }
    }
}
