<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\blogAddRequest;
use App\Http\Requests\blogEditRequest;
use RealRashid\SweetAlert\Facades\Alert;

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
            Alert::toast('Tạo mới thành công','success');
            return redirect()->route('admin.blogs.index');
        }
            Alert::toast('Có lỗi xảy ra','error');
            return redirect()->back();
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
            Alert::toast('Cập nhật thành công','success');
            return Redirect()->route('admin.blogs.index');
        }
        Alert::toast('Có lỗi xảy ra','error');
        return  redirect()->back();
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
            Alert::toast('Xóa thành công','success');
            return Redirect()->back();
        }
        Alert::toast('Có lỗi xảy ra','error');
        return Redirect()->back();
    }
}
