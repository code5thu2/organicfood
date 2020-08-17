<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Tag extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'status', 'slug'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tags');
    }
    public function createTag($request)
    {
        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);
        $cat = Tag::create($request->all());
        return $cat;
    }
    public function updateTag($tag)
    {
        $slug = Str::slug(request()->name);
        request()->merge(['slug' => $slug]);
        return $tag->update(request()->all());
    }
}
