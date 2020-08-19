<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use App\Models\Comment;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Customer;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Subscribe;

class AdminController extends Controller
{
    public function index()
    {
        $cus_total = Customer::count();
        $ord_total = Order::count();
        $pro_total = Product::where('status', '>', 0)->count();
        $revenue = Order::where('status', 3)->sum('total');
        return view('admin.index', compact('cus_total', 'ord_total', 'revenue', 'pro_total'));
    }
    public function error()
    {
        $code = request()->code;
        $errors = config('error.' . $code);
        return view('admin.error', $errors);
    }
    public function login()
    {
        return view('admin.login');
    }
    public function post_login(loginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->has('remember'))) {
            return redirect()->route('admin.index');
        }
        Alert::toast('Email hoặc mật khẩu không chính xác', 'error')->position('top');
        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function customer_list()
    {
        $customers = Customer::Search()->paginate(15);
        return view('admin.customers.customer_list', compact('customers'));
    }
    public function customer_update_status($id)
    {
        $cus = new Customer;
        $cus_update = $cus->updateCusStatus($id);
        if ($cus_update) {
            Alert::toast('cập nhật tài khoản khách hàng thành công', 'success');
            return redirect()->back();
        }
        Alert::toast('Lỗi, cập nhật không thành công', 'error');
        return redirect()->back();
    }
    public function comment_list()
    {
        $comment = Comment::Search()->paginate(10);
        return view('admin.comments.comment_list', compact('comment'));
    }
    public function comment_del($id)
    {
        $comment = Comment::find($id);
        if ($comment->replies->count()) {
            foreach ($comment->replies as $model) {
                $model->delete();
            }
            $comment->delete();
            Alert::toast('Xóa bình luận thành công', 'success');
            return redirect()->back();
        } elseif (!$comment->replies->count()) {
            $comment->delete();
            Alert::toast('Xóa bình luận thành công', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Không thể xóa bình luận', 'error');
            return redirect()->back();
        }
    }
    public function subscribe_list()
    {
        $email = Subscribe::orderBy('id', 'DESC')->paginate(10);
        return view('admin.subscribe_list', compact('email'));
    }
    public function subscribe_del($id)
    {
        $email = Subscribe::find($id)->first();
        if ($email->delete()) {
            Alert::toast('Xóa email thành công', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Không thể xóa email này', 'error');
            return redirect()->back();
        }
    }
    public function rating_list()
    {
        $rate = Rating::orderBy('id', 'DESC')->paginate(10);
        return view('admin.rating_list', compact('rate'));
    }
    public function rating_up($id)
    {
        $rate = Rating::where('id', $id)->first();
        if ($rate->status == 1) {
            $up_status = $rate->update(['status' => 0]);
            Alert::toast('Ẩn đánh giá thành công', 'success');
        } else {
            $up_status = $rate->update(['status' => 1]);
            Alert::toast('Hiện đánh giá thành công', 'success');
        }
        if ($up_status) {
            return redirect()->back();
        } else {
            Alert::toast('Error!', 'error');
            return redirect()->back();
        }
    }
    public function rating_del($id)
    {
        $rate = Rating::find($id)->first();
        if ($rate->delete()) {
            Alert::toast('Xóa đánh giá thành công', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Không thể xóa đánh giá này', 'error');
            return redirect()->back();
        }
    }
    public function feedback_list()
    {
        $feedback = Feedback::orderBy('id', 'DESC')->paginate(10);
        return view('admin.feedback_list', compact('feedback'));
    }
}
