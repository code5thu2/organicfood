<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\categoryAddRequest;
use App\Http\Requests\categoryEditRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::Search()->orderBy('id')->where('parent_id', 0)->paginate(5);
        return view('admin.categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('name', 'ASC')->get();
        return view('admin.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoryAddRequest $request, Category $category)
    {
        $cats = new Category;
        $addCat = $cats->createCat($request);
        if ($addCat) {
            Alert::toast('Thêm danh mục thành công', 'success');
            return redirect()->route('admin.categories.index');
        }
        Alert::toast('Không thể thêm danh mục', 'error');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parent = Category::whereNotIn('id', [$category->id])->orderBy('name', 'ASC')->get();
        return view('admin.categories.edit', compact('category', 'parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(categoryEditRequest $request, Category $category)
    {
        $cats = new Category;
        $up_cat = $cats->updateCat($category);
        if ($up_cat) {
            Alert::toast('Cập nhật danh mục thành công', 'success');
            return Redirect()->route('admin.categories.index');
        } else {
            Alert::toast('Không thể cập nhật danh mục', 'error');
            return  redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            Alert::toast('successfully completed', 'success');
            return Redirect()->back();
        }
        Alert::toast('Error', 'error');
        return Redirect()->back();
    }

    public function trash(Request $request)
    {
        $category = Category::onlyTrashed()->Search()->paginate(5);
        return view('admin.categories.trash', compact('category'));
    }
    public function restore($id)
    {
        $category = Category::withTrashed()->find($id);
        if ($category->restore()) {
            Alert::toast('Khôi phục danh mục thành công', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Không thể khôi phục danh mục', 'error');
            return redirect()->back();
        }
    }
}
