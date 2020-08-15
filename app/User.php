<?php

namespace App;

use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'description', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function hasPermission($route)
    {
        $routes = $this->routes();
        if (in_array($route, $routes)) {
            return true;
        }
        return false;
        // return in_array($route, $routes) ? true : false;
    }
    //test phan quyen
    public function routes()
    {
        $data = [];
        $roles = $this->getRoles;
        foreach ($roles as $role) {
            $permission = json_decode($role->permissions);
            if ($permission) {
                foreach ($permission as $per) {
                    if (!in_array($per, $data)) {
                        array_push($data, $per);
                    }
                }
            }
        }
        return $data;
    }
    public function getRoles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id', 'role_id');
    }
}
