<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'slug', 'image', 'status', 'meta_title', 'meta_description', 'meta_keyword', 'prioty', 'parent_id'];
    protected $dates = ['deleted_at'];

    // public function upload()
    // {
    //     $file = request()->file('upload');
    //     $image_name = $file->getClientOriginalName();
    //     $file->move(public_path('upload'), $image_name);
    //     return  $image_name;
    // }
    public function childCat()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function parentCat()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class)->where('status', '>', 0);
    }
}
