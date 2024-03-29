<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['product_id', 'customer_id', 'number', 'content', 'status'];
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
