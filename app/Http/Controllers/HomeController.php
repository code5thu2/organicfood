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
        $parentCat = Category::where('parent_id', 0)->get();
        $banner_top = Banner::where('position', 0)->where('status', 1)->get();
        $banner_mid = Banner::where('position', 1)->where('status', 1)->get();
        return view('home', compact('parentCat', 'banner_top', 'banner_mid'));
    }

    public function product_list()
    {
        $product = Product::where('status', '>', 0)->paginate(10);
        return view('page.product_list', compact('product'));
    }

    public function view($id, $slug)
    {
        $category = Category::where(['slug' => $slug, 'id' => $id])->first();
        if ($category) {
            $pro_by_id = Product::where('category_id', $category->id)->where('status', '>', 0)->paginate(20);
        }
        $product_detail = Product::where(['slug' => $slug, 'id' => $id])->first();
        if ($category) {
            return view('page.product_view', compact('category', 'pro_by_id'));
        } elseif ($product_detail) {
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
