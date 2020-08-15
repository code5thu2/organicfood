<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Customer;

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
        Alert::toast('Email hoặc mật khẩu không chính xác', 'error')->position('top');
        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function customer_list()
    {
        $customers = Customer::Search()->paginate(15);
        return view('admin.customers.customer_list', compact('customers'));
    }
    public function customer_update_status($id)
    {
        $cus = new Customer;
        $cus_update = $cus->updateCusStatus($id);
        if ($cus_update) {
            Alert::toast('cập nhật tài khoản khách hàng thành công', 'success');
            return redirect()->back();
        }
        Alert::toast('Lỗi, cập nhật không thành công', 'error');
        return redirect()->back();
    }
}
