<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'sale', 'description', 'content', 'status', 'category_id', 'supplier_id', 'unit_id', 'status'];
}
