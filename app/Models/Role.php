<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'permissions'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }
}
