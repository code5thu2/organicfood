<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $fillable = ['product_id', 'order_id', 'quantity', 'product_name', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
