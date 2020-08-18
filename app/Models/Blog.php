<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
   public function createBlog($request)
   {
      $img = str_replace(url('uploads') . '/', '', $request->image);
      $slug = Str::slug($request->name);
      $request->merge(['slug' => $slug, 'image' => $img]);
      $blog = Blog::create($request->all());
      return $blog;
   }
   public function updateBlog($blog)
   {
      if (request()->image) {
         $img = str_replace(url('uploads') . '/', '', request()->image);
         request()->merge(['image' => $img]);
      }
      $slug = Str::slug(request()->name);
      request()->merge(['slug' => $slug]);
      return $blog->update(request()->all());
   }
}
