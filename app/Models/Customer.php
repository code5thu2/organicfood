<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'phone', 'address', 'email_verified_at', 'password', 'sex', 'status'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'customer_id', 'id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function registerAccount()
    {
        request()->merge(['password' => bcrypt(request()->password)]);
        $customer = Customer::create(request()->all());
        $cus_email = $customer->email;
        $cus_name = $customer->name;
        if ($customer) {
            $code = bcrypt(md5(time() . $customer->email));
            $customer->code_active = $code;
            $customer->save();
            $url = route('customer.verify_account', ['id' => $customer->id, 'code' => $code]);
            Mail::send('mail.verify_mail', [
                'route' => $url,
                'cus_name' => $cus_name,
            ], function ($mail) use ($cus_email, $cus_name) {
                $mail->to($cus_email);
                $mail->from('levietanhtdvp@gmail.com');
                $mail->subject('Xác thực tài khoản');
            });
        }
        return $customer;
    }
    public function submitVerify($id, $code)
    {
        $email_verified_at = Carbon::now();
        $submit_acc = Customer::where(['id' => $id, 'code_active' => $code])->update([
            'status' => 1,
            'email_verified_at' => $email_verified_at
        ]);
        return $submit_acc;
    }
    public function checkStatus($id)
    {

        $cus = Customer::where(['id' => $id, 'status' => 1])->first();
        if ($cus != null) {
            return true;
        }
        return false;
    }
    public function updateCusStatus($id)
    {
        $recent_status = request()->status;
        if ($recent_status == 1) {
            Customer::where('id', $id)->update(['status' => 2]);
            return true;
        } elseif ($recent_status == 2) {
            Customer::where('id', $id)->update(['status' => 1]);
            return true;
        } else {
            return false;
        }
    }
}
