<?php

use App\Models\Product;
use App\Models\Image;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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
if (!function_exists('filter')) {
    function filter($table, $Number_page)
    {
        $filter  = request()->key;
        $query =  DB::table($table);
        if (request()->key != null) {
            if (request()->filter == 'id_f') {
                $query =  $query->where('id', $filter);
            }
            if (request()->filter == 'name_f') {
                $query =  $query->where('name', 'LIKE', '%' . $filter . '%');
            }
            if (request()->filter == 'email_f') {
                $query =  $query->where('email', $filter);
            }
        }
        if (request()->status != null) {
            $status  = request()->status;
            $query =  $query->where('status', $status - 1);
        }
        return  $query->paginate($Number_page);
    }
}
