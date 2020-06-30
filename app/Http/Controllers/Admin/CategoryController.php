<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\categoryAddRequest;
use App\Http\Requests\categoryEditRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::paginate(5);
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
        $file_name = $category->upload();
        $slug = Str::slug($request->name, '-');
        $request->merge(['image' => $file_name, 'slug' => $slug]);
        if (Category::create($request->all())) {
            return redirect()->route('categories.index')->with('yes', 'Add new category successfully');
        }
        return redirect()->back()->with('no', 'Adding new category failed');
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
        if ($request->hasFile('upload')) {
            $file_name = $category->upload();
            $request->merge(['image' => $file_name]);
        }
        $slug = Str::slug($request->name, '-');
        $request->merge(['slug' => $slug]);
        if ($category->update($request->all())) {
            return Redirect()->route('categories.index')->with('yes', 'Update category successfully');
        }
        return  redirect()->back()->with('no', 'Update category failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
