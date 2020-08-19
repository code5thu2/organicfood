<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'slug', 'image', 'status', 'meta_title', 'meta_description', 'meta_keyword', 'prioty', 'parent_id'];
    protected $dates = ['deleted_at'];

    public function createCat($request)
    {
        $img = str_replace(url('uploads') . '/', '', $request->image);
        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug, 'image' => $img]);
        $cat = Category::create($request->all());
        return $cat;
    }
    public function updateCat($category)
    {
        if (request()->image) {
            $img = str_replace(url('uploads') . '/', '', request()->image);
            request()->merge(['image' => $img]);
        }
        $slug = Str::slug(request()->name);
        request()->merge(['slug' => $slug]);
        return $category->update(request()->all());
    }
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
    public function scopeSearch($query)
    {
        $filter  = request()->key;
        if (request()->key != null) {
            if (request()->filter == 'id_f') {
                $query->where('id', $filter);
            }
            if (request()->filter == 'name_f') {
                $query->where('name', 'LIKE', '%' . $filter . '%');
            }
        }
        if (request()->status != null) {
            $status  = request()->status;
            $query->where('status', $status - 1);
        }
    }
}
