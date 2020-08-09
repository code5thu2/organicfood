<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view()
    {
        return view('cart');
    }
    public function add(CartHelper $cart, $id)
    {
        $product = Product::find($id);
        $cart->add($product);
        return redirect()->back();
    }
    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }
    public function update(CartHelper $cart, $id, $quantity)
    {
        $cart->update($id, $quantity);
        return redirect()->back();
    }
    public function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->back();
    }
}
