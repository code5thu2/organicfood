<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\customerAddRequest;

class CustomerController extends Controller
{
    public function login()
    {
        return view('customer.login');
    }
    public function register(customerAddRequest $request)
    {
        dd($request->all());
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
}
