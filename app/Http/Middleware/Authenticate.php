<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) { //chưa đăng nhập
            return redirect()->route('login');
        }
        $user = Auth::user(); //Lấy thông tin người dùng
        $route = $request->route()->getName();
        // dd($route);
        // $user->can($route);
        // dd($user->can($route));
        return $next($request);
    }
}
