<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'sale', 'description', 'content', 'status', 'category_id', 'supplier_id', 'unit_id', 'image'];

    public function createPro()
    {
        if (request('upload')) {
            $file_name = uploadImg('upload');
            dd($file_name);
            request()->merge(['image' => $file_name]);
        }
        $slug = Str::slug(request()->name);
        request()->merge(['slug' => $slug]);
        $product_id = Product::create(
            [
                'name' => request()->name,
                'slug' => request()->slug,
                'price' => request()->price,
                'sale' => request()->sale,
                'description' => request()->description,
                'category_id' => request()->category_id,
                'supplier_id' => request()->supplier_id,
                'unit_id' => request()->unit_id,
                'status' => request()->status,
                'content' => request()->content,
                'image' => request()->image,
            ]
        );
        if (request()->other_image) {
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

    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function sup()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }
    public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
