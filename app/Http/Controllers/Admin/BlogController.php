<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\blogAddRequest;
use App\Http\Requests\blogEditRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blogs.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(blogAddRequest $request)
    {
          
        if ($request->hasFile('upload')) {
            $file_name = uploadImg('upload');
            $request->merge(['image' => $file_name]);
        }
        $slug =  slugName('name');
        $request->merge(['slug' => $slug]);
        if  (Blog::create($request->all())) {
            return redirect()->route('admin.blogs.index')->with('yes', 'Tạo mới blog thành công');
        } 
            return redirect()->back()->with('no', 'Có lỗi xảy ra khi tải ảnh blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(blogEditRequest $request, Blog $blog)
    {
        if ($request->hasFile('upload')) {
            $file_name = uploadImg('upload');
            $request->merge(['image' => $file_name]);
        }
        $slug =  slugName('name');
        $request->merge(['slug' => $slug]);
        if ($blog->update($request->all())) {
            return Redirect()->route('admin.blogs.index')->with('yes', 'Cập nhật thành công');
        }
        return  redirect()->back()->with('no', 'Cập nhật thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
         if ($blog->delete()) {
            return Redirect()->back()->with('yes', 'Xóa thành công');
        }
        return Redirect()->back()->with('no', '');
    }
}
