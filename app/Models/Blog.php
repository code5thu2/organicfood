<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   protected $fillable= ['name','image','summary','content','meta_key','meta_descript','meta_title','status','slug'];
}

