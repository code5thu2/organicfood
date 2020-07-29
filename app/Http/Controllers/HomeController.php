<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
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
        $banner_top = Banner::where('position', 0)->get();
        $banner_mid = Banner::where('position', 1)->get();
        return view('home', compact('parentCat'));
    }
}
