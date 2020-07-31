<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\customerAddRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    public function login()
    {
        return view('customer.login');
    }
    public function post_login(Request $request)
    {
        $login  = Auth::guard('cus')->attempt($request->only('email', 'password'), $request->has('remember'));
        if ($login) {
            return redirect()->route('home');
        }
        toast('Đăng nhập thất bại', 'error');
        return redirect()->back();
    }
    public function register(customerAddRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        if (Customer::create($request->all())) {
            toast('Đăng ký thành công', 'success');
            return redirect()->back();
        }
        toast('Đăng ký thất bại, có lỗi xảy ra', 'error');
        return redirect()->back();
    }
    public function profile()
    {
        return view('customer.profile');
    }
    public function order()
    {
        return view('customer.order');
    }
    public function change_password()
    {
        return view('customer.change_password');
    }
    public function logout()
    {
        Auth::guard('cus')->logout();
        return redirect()->route('home');
    }
}
