<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\customerAddRequest;
use Carbon\Carbon;
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
        $customer = new Customer;
        $customerAcc = $customer->registerAccount();
        if ($customerAcc) {
            toast('Đăng ký thành công, vui lòng vào email để xác thực tài khoản của bạn', 'success');
            return redirect()->back();
        }
        toast('Đăng ký thất bại, có lỗi xảy ra', 'error');
        return redirect()->back();
    }
    public function profile()
    {
        $cus = new Customer;
        $cus_id = Auth::guard('cus')->user()->id;
        if ($cus->checkStatus($cus_id)) {
            return view('customer.profile');
        } else {
            alert()->warning('Warning', 'Tài khoản của bạn đã bị chặn!');
            return redirect()->back();
        }
    }
    public function verify_account(Request $request)
    {
        $cus = new Customer;
        $id = $request->id;
        $code = $request->code;
        if ($cus->submitVerify($id, $code)) {
            Alert::toast('Tài khoản của bạn đã được kích hoạt', 'success');
            return redirect()->route('home');
        } else {
            Alert::toast('Đường dẫn xác nhận tài khoản không chính xác', 'error');
            return redirect()->route('home');
        }
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
