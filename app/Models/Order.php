<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Helper\CartHelper;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'note', 'customer_id', 'payment_id', 'total', 'status'];

    public function createOrder($cart)
    {
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
}
