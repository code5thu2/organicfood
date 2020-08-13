<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shipping;
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
        $shipping = Shipping::all();
        return view('checkout', compact('payment', 'shipping'));
    }
    public function submit_form(createOrderRequest $request, CartHelper $cart)
    {
        $createOrder = new Order;
        if ($createOrder->createOrder($cart)) {
            Alert::success('Đặt hàng thành công', 'Success');
            return redirect()->route('cart.view');
        } else {
            alert()->warning('Warning', 'Tài khoản của bạn không được đặt hàng');
            // Alert::toast('', 'error', 'center-center');
            return redirect()->back();
        }
    }
}
