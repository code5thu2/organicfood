<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'status', 'meta_title', 'meta_description', 'meta_keyword', 'prioty', 'parent_id'];

    public function upload()
    {
        $file = request()->file('upload');
        $image_name = $file->getClientOriginalName();
        $file->move(public_path('upload'), $image_name);
        return  $image_name;
    }
    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function parentCat()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }
}
