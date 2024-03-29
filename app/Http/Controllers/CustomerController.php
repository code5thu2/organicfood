<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\customerAddRequest;
use App\Http\Requests\checkMailRequest;
use App\Http\Requests\checkPassRequest;
use App\Models\Order;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    public function login()
    {
        return view('customer.login');
    }
    public function post_login(Request $request)
    {
        $login  = Auth::guard('cus')->attempt($request->only('email', 'password'), $request->has('remember'));
        if ($login) {
            return redirect()->route('home');
        }
        toast('Đăng nhập thất bại', 'error');
        return redirect()->back();
    }
    public function register(customerAddRequest $request)
    {
        $customer = new Customer;
        $customerAcc = $customer->registerAccount();
        if ($customerAcc) {
            toast('Đăng ký thành công, vui lòng vào email để xác thực tài khoản của bạn', 'success');
            return redirect()->back();
        }
        toast('Đăng ký thất bại, có lỗi xảy ra', 'error');
        return redirect()->back();
    }
    public function profile()
    {
        $cus = new Customer;
        $cus_id = Auth::guard('cus')->user()->id;
        if ($cus->checkStatus($cus_id)) {
            return view('customer.profile');
        } else {
            alert()->warning('Warning', 'Tài khoản của bạn đã bị chặn!');
            return redirect()->back();
        }
    }
    public function wishlist($pro_id)
    {
        $te = Wishlist::where(['product_id' => $pro_id, 'customer_id' => Auth::guard('cus')->user()->id])->first();
        if (isset($te)) {
            Alert::toast('sản phẩm đã có trong danh sách yêu thích');
            return redirect()->back();
        } else {
            $add_wish = Wishlist::create([
                'product_id' => $pro_id,
                'customer_id' => Auth::guard('cus')->user()->id,
            ]);
            Alert::toast('Thêm sản phẩm yêu thích thành công');
            return redirect()->back();
        }
    }
    public function wishlist_list()
    {
        return view('customer.wishlist_list');
    }
    public function wishlist_del($id)
    {
        $wishlist_del = Wishlist::find($id)->first();
        if ($wishlist_del->delete()) {
            Alert::toast('Xóa sản phẩm yêu thích thành công');
            return redirect()->back();
        } else {
            Alert::toast('Có lỗi, vui lòng thử lại sau');
            return redirect()->back();
        };
        return view('customer.wishlist_list');
    }
    public function verify_account(Request $request)
    {
        $cus = new Customer;
        $id = $request->id;
        $code = $request->code;
        if ($cus->submitVerify($id, $code)) {
            Alert::toast('Tài khoản của bạn đã được kích hoạt', 'success');
            return redirect()->route('home');
        } else {
            Alert::toast('Đường dẫn xác nhận tài khoản không chính xác', 'error');
            return redirect()->route('home');
        }
    }
    public function order()
    {
        return view('customer.order');
    }
    public function order_cancle($id)
    {
        $or = Order::find($id)->first();
        if ($or->status == 0) {
            if ($or->update(['status' => 4])) {
                alert()->success('success', 'Đã hủy đơn hàng #' . $or->id);
                return redirect()->back();
            } else {
                alert()->error('error', 'Có lỗi xảy ra, không thể hủy đơn hàng' . $or->id);
                return redirect()->back();
            }
        } else {
            alert()->error('error', 'Có lỗi xảy ra, không thể hủy đơn hàng' . $or->id);
            return redirect()->back();
        }
    }
    public function forgot_password()
    {
        return view('customer.forgot_password');
    }
    public function send_code(checkMailRequest $request)
    {
        $customers = new Customer;
        $cus = $customers->where('email', $request->email)->first();
        // dd($cus);
        if ($cus) {
            $customers->saveCode($cus);
            Alert::toast('Vui lòng kiểm tra email để lấy lại mật khâủ', 'success')->position('top-center');
            return redirect()->route('home');
        } else {
            Alert::toast('Email không tồn tại', 'warning')->position('top-center');
            return redirect()->back();
        }
    }
    public function reset_password(Request $request)
    {
        $email = $request->email;
        $code = $request->code;
        $check_cus = Customer::where(['email' => $email, 'code_active' => $code])->first();
        if ($check_cus) {
            return view('customer.reset_password', compact('email', 'code'));
        } else {
            Alert::toast('Đường dẫn lấy lại mật khẩu không đúng', 'warning')->position('top-center');
            return redirect()->route('home');
        }
    }
    public function confirm_reset_password(checkPassRequest $request)
    {
        $cus = Customer::where(['email' => $request->email, 'code_active' => $request->code])->first();
        if ($cus) {
            $cus->password = bcrypt($request->password);
            $cus->save();
            alert()->success('success', 'Thay đổi mật khẩu thành công!');
            return redirect()->route('home');
        } else {
            alert()->error('error', 'có lỗi, không thể thay đổi mật khẩu');
            return redirect()->back();
        }
    }
    public function change_password()
    {
        return view('customer.change_password');
    }
    public function logout()
    {
        Auth::guard('cus')->logout();
        return redirect()->route('home');
    }
}
