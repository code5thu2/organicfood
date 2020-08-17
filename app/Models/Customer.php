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
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'customer_id', 'id');
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
    public function scopeSearch($query)
    {
        $filter  = request()->key;
        if (request()->key != null) {
            if (request()->filter == 'id_f') {
                $query->where('id', $filter);
            }
            if (request()->filter == 'name_f') {
                $query->where('name', 'LIKE', '%' . $filter . '%');
            }
            if (request()->filter == 'email_f') {
                $query->where('email', $filter);
            }
        }
        if (request()->status != null) {
            $status  = request()->status;
            $query->where('status', $status - 1);
        }
        return $query;
    }
    public function saveCode($cus)
    {
        $code =  bcrypt(md5(time() . $cus->email));
        $cus_name = $cus->name;
        $cus_email = $cus->email;
        $url = route('customer.reset_password', ['email' => $cus_email, 'code' => $code]);
        $upcode = Customer::where('id', $cus->id)->update([
            'code_active' =>  $code,
        ]);
        if ($upcode) {
            Mail::send('mail.reset_password_mail', [
                'url' =>  $url,
                'cus_name' => $cus_name,
            ], function ($mail) use ($cus_email, $cus_name) {
                $mail->to($cus_email, $cus_name);
                $mail->from('levietanhtdvp@gmail.com');
                $mail->subject('Lấy lại mật khẩu');
            });
            return $upcode;
        }
    }
}
