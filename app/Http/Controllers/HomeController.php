<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

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
        $cat_menu = Category::where(['status' => 1, 'parent_id' => 0, 'prioty' => 1])->limit(3)->get();
        $banner_top = Banner::where(['status' => 1, 'position' => 0])->where('status', 1)->get();
        $banner_mid_l = Banner::where(['status' => 1, 'position' => 1])->where('status', 1)->first();
        $banner_mid_r = Banner::where(['status' => 1, 'position' => 2])->first();
        $pro_new = Product::where(['status' => 3])->limit(5)->get();
        return view('home', compact('parentCat', 'banner_top', 'banner_mid_l', 'banner_mid_r', 'cat_slide', 'cat_menu', 'pro_new'));
    }

    public function product_list()
    {
        $product = Product::where('status', '>', 0)->paginate(10);
        return view('page.product_list', compact('product'));
    }

    public function view($id, $slug)
    {
        $category = Category::where(['slug' => $slug, 'id' => $id])->first();
        $product_detail = Product::where(['slug' => $slug, 'id' => $id])->first();
        if ($category) {
            $pro_by_id = Product::where('category_id', $category->id)->where('status', '>', 0)->paginate(20);
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
