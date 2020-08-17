<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubscribeController extends Controller
{
    public function sign(Request $request)
    {
        $add = Subscribe::create(['email' => $request->email_subscribe]);
        if ($add) {
            Alert::toast('Đăng ký email thành công', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Có lỗi xảy ra', 'error');
            return redirect()->back();
        }
    }
}
