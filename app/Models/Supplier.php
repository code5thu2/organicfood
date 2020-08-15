<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $fillable = ['name', 'image', 'status'];
    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id', 'id');
    }
}
