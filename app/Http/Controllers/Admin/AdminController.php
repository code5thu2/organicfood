<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function error()
    {
        $code = request()->code;
        $errors = config('error.' . $code);
        return view('admin.error', $errors);
    }
    public function login()
    {
        return view('admin.login');
    }
    public function post_login(loginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->has('remember'))) {
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('no', 'Email hoặc mật khẩu không chính xác');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
