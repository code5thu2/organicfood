<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Product;
use App\Http\Requests\feedbackAddRequest;
use App\Models\DetailOrder;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Supplier;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $parentCat = Category::where(['status' => 1, 'parent_id' => 0])->get();
        $cat_slide = Category::where(['status' => 1, 'parent_id' => 0, 'prioty' => 2])->limit(4)->get();
        $banner_top = Banner::where(['status' => 1, 'position' => 0])->where('status', 1)->get();
        $banner_mid_l = Banner::where(['status' => 1, 'position' => 1])->where('status', 1)->first();
        $banner_mid_r = Banner::where(['status' => 1, 'position' => 2])->first();
        $pro_new = Product::where(['status' => 3])->limit(5)->get();
        $pro_order = DetailOrder::all();
        $pro_array = DetailOrder::pluck('product_id')->toArray();
        $pro_sell = Product::where('status', '>', 0)->whereIn('id', $pro_array)->get();
        $sup_slider = Supplier::where('status', 1)->get();

        if (request()->name_pro != null) {
            $product = Product::Search()->where('status', '>', 0)->paginate(10);
            return view('page.product_list', compact('product'));
        }
        return view('home', compact('parentCat', 'banner_top', 'banner_mid_l', 'banner_mid_r', 'cat_slide', 'pro_new', 'pro_sell'));
    }

    public function product_list()
    {
        $product = Product::Search()->where('status', '>', 0)->paginate(10);
        return view('page.product_list', compact('product'));
    }
    public function contact()
    {
        if (request()->name_pro != null) {
            $product = Product::Search()->where('status', '>', 0)->paginate(10);
            return view('page.product_list', compact('product'));
        }
        return view('page.contact');
    }
    public function about()
    {
        if (request()->name_pro != null) {
            $product = Product::Search()->where('status', '>', 0)->paginate(10);
            return view('page.product_list', compact('product'));
        }
        return view('page.about');
    }
    public function faq()
    {
        if (request()->name_pro != null) {
            $product = Product::Search()->where('status', '>', 0)->paginate(10);
            return view('page.product_list', compact('product'));
        }
        $faq = Faq::where('status', 1)->limit(5)->orderBy('id', 'DESC')->get();
        return view('page.faq', compact('faq'));
    }
    public function submit_feedback(feedbackAddRequest $request)
    {
        if (Feedback::create($request->all())) {
            Alert::toast('Gửi phản hồi thành công', 'success');
            return view('page.contact');
        } else {
            Alert::toast('Gửi phản hồi không thành công', 'warning');
            return view('page.contact');
        };
    }
    public function view($id, $slug)
    {
        $category = Category::where(['slug' => $slug, 'id' => $id])->first();
        $tag = Tag::where(['slug' => $slug, 'id' => $id])->first();
        $product_detail = Product::where(['slug' => $slug, 'id' => $id])->first();
        if ($category) {
            $pro_by_id = Product::Search()->where('category_id', $category->id)->where('status', '>', 0)->paginate(20);
            return view('page.product_view', compact('category', 'pro_by_id'));
        }
        if ($tag) {
            $category = $tag;
            $pro_tag = $tag->products->pluck('id')->toArray();
            $pro_by_id = Product::Search()->whereIn('id', $pro_tag)->where('status', '>', 0)->paginate(20);
            return view('page.product_view', compact('category', 'pro_by_id'));
        }
        if ($product_detail) {
            $total_review = 0;
            $svg_rate = 0;
            $cus_array = $product_detail->ratings->pluck('customer_id')->toArray();
            if ($product_detail->ratings->count()) {
                $total_review = $product_detail->ratings->count('product_id');
                $svg_rate = $product_detail->ratings->avg('number');
            }
            return view('page.product_detail', compact('product_detail', 'total_review', 'svg_rate', 'cus_array'));
        } else {
            return view('404');
        }
    }
}
