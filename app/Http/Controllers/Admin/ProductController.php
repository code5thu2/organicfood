<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB as FacadesDB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(10);
        return view('admin.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $supplier = Supplier::all();
        $unit = Unit::all();
        return view('admin.products.create', compact('category', 'supplier', 'unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $slug =  slugName('name');
        $request->merge(['slug' => $slug]);
        if ($request->hasFile('upload')) {
            $file_name = uploadImg('upload');
            $request->merge(['image' => $file_name]);
        }
        $product_id = Product::create(
            [
                'name' => $request->name,
                'price' => $request->price,
                'sale' => $request->sale,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'unit_id' => $request->unit_id,
                'status' => $request->status,
                'content' => $request->content,
                'slug' => $request->slug,
                'image' => $request->image,
            ]
        );
        // $addImage = DB::table('images')->insert(
        //     [
        //         'name' => $request->other_image,
        //         'prioty' => 1,
        //         'status' => 1,
        //         'product_id' => $product_id->id
        //     ]
        // );
        $photos = json_decode($request->other_image, true);
        // // dd($photos);
        foreach ($photos as $photo) {
            $image_name = str_replace(url('uploads') . '/', '', $photo);
            // $file_infor = pathinfo($photo);
            // $image_name = $file_infor['filename'];
            // $image_ex = $file_infor['extension'];
            // $full_name = time() . '-' . Str::slug($image_name) . '.' . $image_ex;
            // $filename = $photo->move('uploads', $full_name);
            Image::create([
                'product_id' => $product_id->id,
                'name' => $image_name,
                'prioty' => 1,
                'status' => 1,
            ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
