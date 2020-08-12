<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Helper\CartHelper;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'note', 'customer_id', 'payment_id', 'total', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderDetail()
    {
        return $this->hasMany(DetailOrder::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function orderSearchByStatus($status, $key)
    {
        if ($key) {
            $orders = Order::where('status', $status - 1)->where('id', 'like', '%' . $key . '%')->orderBy('id', 'DESC')->paginate(15);
        } else {
            $orders = Order::where('status', $status - 1)->orderBy('id', 'DESC')->paginate(15);
        }
        return $orders;
    }
    public function createOrder($cart)
    {
        dd(request()->all());
        $cus_id = Auth::guard('cus')->user()->id;
        $cus_email = Auth::guard('cus')->user()->email;
        $cus_name = Auth::guard('cus')->user()->name;
        $order = Order::create([
            'name' => request()->name,
            'email' => request()->email,
            'phone' => request()->phone,
            'address' => request()->address,
            'note' => request()->note,
            'customer_id' => $cus_id,
            'payment_id' => request()->payment_id,
            'total' => $cart->total_price,
        ]);
        if ($order) {
            foreach ($cart->items as $pro_id => $item) {
                $quantity = $item['quantity'];
                $price = $item['price'];
                DetailOrder::create([
                    'order_id' => $order->id,
                    'product_id' => $pro_id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);
            }
            Mail::send('mail.order_mail', [
                'cus_name' => $cus_name,
                'order' => $order,
                'items' => $cart->items
            ], function ($mail) use ($cus_email, $cus_name) {
                $mail->to($cus_email, $cus_name);
                $mail->from('levietanhtdvp@gmail.com');
                $mail->subject('Đặt hàng thành công');
            });
            session(['cart' => '']);
        }
        return $cart;
    }
    public function statusUpdateByAd($id, $status)
    {
        $order = Order::find($id);
        switch ($status) {
            case 0:
                $orderUpdate = $order->update(['status' => 1]);
                break;
            case 1:
                $orderUpdate = $order->update(['status' => 2]);
                break;
            case 2:
                $orderUpdate = $order->update(['status' => 3]);
                break;
            case 4:
                $orderUpdate = $order->update(['status' => 4]);
                break;
            default:
                break;
        }
        if ($orderUpdate) {
            return true;
        }
        return false;
    }
}
