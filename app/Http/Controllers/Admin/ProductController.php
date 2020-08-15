<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\productAddRequest;
use App\Http\Requests\productEditRequest;
use App\Models\Tag;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::Search()->paginate(5);
        return view('admin.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = product::all();
        $supplier = Supplier::all();
        $unit = Unit::all();
        $tag = Tag::all();
        return view('admin.products.create', compact('product', 'supplier', 'unit', 'tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productAddRequest $request)
    {
        $addPro = new Product;
        $add = $addPro->createPro($request);
        if ($add) {
            Alert::toast('Tạo mới sản phẩm thành công', 'success');
            return redirect()->route('admin.products.index');
        } elseif (!$add) {
            Alert::toast('có lỗi xảy ra, không thể tạo mới sản phẩm', 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = product::all();
        $supplier = Supplier::all();
        $unit = Unit::all();
        $tag = Tag::all();
        $tag_assignment = $product->tags->pluck('name', 'id')->toArray();
        return view('admin.products.edit', compact('product', 'supplier', 'unit', 'tag', 'product', 'tag_assignment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(productEditRequest $request, Product $product)
    {

        $editPro = new Product;
        $add = $editPro->updatePro($request);
        if ($add) {
            Alert::toast('Update sản phẩm thành công', 'success');
            return redirect()->route('admin.products.index');
        } else {
            Alert::toast('Update sản phẩm không thành công !', 'error');
            return redirect()->route('admin.products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->images->count()) {
            Image::where('product_id', $product->id)->delete();
        }
        if ($product->delete()) {
            Alert::toast('Xóa sản phẩm thành công', 'success');
            return redirect()->back();
        };
    }
    public function trash(Request $request)
    {
        $product = Product::onlyTrashed()->Search()->paginate(5);
        return view('admin.products.trash', compact('product'));
    }
    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);
        if ($product->restore()) {
            Alert::toast('Khôi phục danh mục thành công', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Không thể khôi phục danh mục', 'error');
            return redirect()->back();
        }
    }
}
