<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['customer_id', 'blog_id', 'parent_id', 'content', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function scopeSearch($query)
    {
        $filter  = request()->key;
        if (request()->key != null) {
            if (request()->filter == 'id_f') {
                $query->where('id', $filter);
            }
            if (request()->filter == 'cus_name_f') {
                $query->customer->where('name', 'LIKE', '%' . $filter . '%');
            }
            if (request()->filter == 'blog_name_f') {
                $query->blog->where('name', 'LIKE', '%' . $filter . '%');
            }
        }
        return $query;
    }
}
