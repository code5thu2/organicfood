<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'sale', 'description', 'content', 'status', 'category_id', 'supplier_id', 'unit_id', 'image'];

    public function createPro()
    {
        $img = str_replace(url('uploads') . '/', '', request()->image);
        $slug = Str::slug(request()->name);
        $product_id = Product::create(
            [
                'name' => request()->name,
                'slug' => $slug,
                'price' => request()->price,
                'sale' => request()->sale,
                'description' => request()->description,
                'category_id' => request()->category_id,
                'supplier_id' => request()->supplier_id,
                'unit_id' => request()->unit_id,
                'status' => request()->status,
                'content' => request()->content,
                'image' => $img,
            ]
        );
        // dd($product_id->all());
        if (request()->tag) {
            foreach (request()->tag as $tag_id) {
                ProductTag::create([
                    'product_id' => $product_id->id,
                    'tag_id' => $tag_id
                ]);
            }
        }
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
    public function updatePro()
    {
        // dd(request()->all());
        $img = str_replace(url('uploads') . '/', '', request()->image);
        $slug = Str::slug(request()->name);
        $product_id = Product::where('id', request()->id)->update(
            [
                'name' => request()->name,
                'slug' => $slug,
                'price' => request()->price,
                'sale' => request()->sale,
                'description' => request()->description,
                'category_id' => request()->category_id,
                'supplier_id' => request()->supplier_id,
                'unit_id' => request()->unit_id,
                'status' => request()->status,
                'content' => request()->content,
                'image' =>  $img,
            ]
        );
        if (is_array(request()->tag)) {
            // dd(request()->tag);
            ProductTag::where('product_id', request()->id)->delete();
            foreach (request()->tag as $tag_id) {
                ProductTag::create([
                    'product_id' => request()->id,
                    'tag_id' => $tag_id
                ]);
            }
        } else {
            ProductTag::where('product_id', request()->id)->delete();
        }
        if (request()->other_image) {
            Image::where('product_id', request()->id)->delete();
            $photos = json_decode(request()->other_image, true);
            foreach ($photos as $photo) {
                $image_name = str_replace(url('uploads') . '/', '', $photo);
                Image::create([
                    'product_id' => request()->id,
                    'name' => $image_name,
                    'prioty' => 1,
                    'status' => 1,
                ]);
            }
        }
    }
    public function deletePro($id)
    {
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
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }
}
