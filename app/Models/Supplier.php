<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'image', 'status'];
    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id', 'id');
    }
}
