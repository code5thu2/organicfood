<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['customer_id', 'blog_id', 'parent_id', 'content', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
