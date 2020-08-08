<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
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

    public function view($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $product_detail = Product::where('slug', $slug)->first();
        if ($category) {
            return view('page.product_view', compact('category'));
        } elseif ($product_detail) {
            return view('page.product_detail', compact('product_detail'));
        } else {
            return view('404');
        }
    }
}
