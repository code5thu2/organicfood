<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'phone', 'address', 'email_verified_at', 'password', 'sex', 'status'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
