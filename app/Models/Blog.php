<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   protected $fillable = ['name', 'image', 'summary', 'content', 'meta_key', 'meta_descript', 'meta_title', 'status', 'slug', 'create_at'];

   public function comments()
   {
      return $this->hasMany(Comment::class)->whereNull('parent_id');
   }
   public function commentsTotal()
   {
      return $this->hasMany(Comment::class);
   }
}
