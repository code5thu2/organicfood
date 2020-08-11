<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\models\Rating;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('cus');
    }
    public function submit_rating(Request $request, $id)
    {
        $pro_id = $id;
        if (Rating::create($request->all())) {
            $proRate = new Product;
            if ($proRate->addRating($pro_id)) {
                Alert::success('Đánh giá sản phẩm thành công', 'Thank you!');
                return redirect()->back();
            }
        }
    }
}
