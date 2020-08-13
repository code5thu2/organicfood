<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Helper\CartHelper;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'note', 'customer_id', 'payment_id', 'total', 'status', 'shipping_id', 'payment', 'shipping', 'shipping_cost'];

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
        return $this->hasOne(Payment::class, 'id', 'payment_id');
    }
    public function shipping()
    {
        return $this->hasOne(Shipping::class, 'id', 'shipping_id');
    }

    public function scopeSearch($query)
    {
        // dd(request()->all());
        if (request()->id) {
            $id  = request()->id;
            $query->where('id', $id);
        }
        if (request()->status != null) {
            $status  = request()->status;
            $query->where('status', $status - 1);
        }
        return $query;
    }
    public function createOrder($cart)
    {
        $customer = new Customer;
        $payment = new Payment;
        $shipping = new Shipping;
        $payment_check = $payment->where('id', request()->payment_id)->first();
        $shipping_check = $shipping->where('id', request()->shipping_id)->first();
        // dd($shipping_check->cost);
        $cus_id = Auth::guard('cus')->user()->id;
        $cus_email = Auth::guard('cus')->user()->email;
        $cus_name = Auth::guard('cus')->user()->name;
        if ($customer->checkStatus($cus_id)) {
            $order = Order::create([
                'name' => request()->name,
                'email' => request()->email,
                'phone' => request()->phone,
                'address' => request()->address,
                'note' => request()->note,
                'customer_id' => $cus_id,
                'payment_id' => request()->payment_id,
                'total' => $cart->total_price,
                'payment' => $payment_check->name,
                'shipping_id' => $shipping_check->id,
                'shipping' => $shipping_check->name,
                'shipping_cost' => $shipping_check->cost,
            ]);
            if ($order) {
                foreach ($cart->items as $pro_id => $item) {
                    $product_name = $item['name'];
                    $quantity = $item['quantity'];
                    $price = $item['price'];
                    DetailOrder::create([
                        'order_id' => $order->id,
                        'product_id' => $pro_id,
                        'quantity' => $quantity,
                        'price' => $price,
                        'product_name' => $product_name
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
        return false;
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
        return $orderUpdate;
    }
}
