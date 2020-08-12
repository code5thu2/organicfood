<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Helper\CartHelper;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\createOrderRequest;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('cus');
    }
    public function form()
    {
        $payment = Payment::all();
        return view('checkout', compact('payment'));
    }
    public function submit_form(createOrderRequest $request, CartHelper $cart)
    {
        $createOrder = new Order;
        if ($createOrder->createOrder($cart)) {
            Alert::success('Đặt hàng thành công', 'Success');
            return redirect()->route('cart.view');
        } else {
            Alert::error('Đặt hàng không thành công', 'Error');
            return redirect()->back();
        }
    }
}
