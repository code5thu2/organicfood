<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'sale', 'description', 'content', 'status', 'category_id', 'supplier_id', 'unit_id', 'status'];

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
}
