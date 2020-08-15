<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::Search()->orderBy('id', 'DESC')->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }
    public function show($id)
    {
        $order = Order::find($id);
        return view('admin.orders.show', compact('order'));
    }
    public function status_update($id, $status)
    {
        $statusUpdate = new Order;
        if ($statusUpdate->statusUpdateByAd($id, $status)) {
            Alert::toast('Cập nhật trạng thái đơn hàng thành công', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Có lỗi, cập nhật không thành công', 'error');
            return redirect()->back();
        };
    }
}
