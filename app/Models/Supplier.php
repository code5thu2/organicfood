<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Supplier extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $fillable = ['name', 'image', 'status'];
    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id', 'id');
    }
    public function createSup($request)
    {
        $img = str_replace(url('uploads') . '/', '', $request->image);
        $request->merge(['image' => $img]);
        $cat = Supplier::create($request->all());
        return $cat;
    }
    public function updateSup($supplier)
    {
        if (request()->image) {
            $img = str_replace(url('uploads') . '/', '', request()->image);
            request()->merge(['image' => $img]);
        }
        return $supplier->update(request()->all());
    }
}
