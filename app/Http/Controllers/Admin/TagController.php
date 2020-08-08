<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\tagAddRequest;
use App\Http\Requests\tagEditRequest;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::paginate(5);
        return view('admin.tags.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tagAddRequest $request)
    {
        if (Tag::create($request->only('name'))) {
            toast('Thêm tag mới thành công', 'success');
            return redirect()->back();
        }
        toast('Có lỗi xảy ra, không thể tạo tag mới', 'error');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(tagEditRequest $request, Tag $tag)
    {
        if ($tag->update($request->only('name'))) {
            toast('Update tag thành công', 'success');
            return redirect()->route('admin.tags.index');
        }
        toast('Có lỗi xảy ra, update tag không thành công', 'error');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if ($tag->delete()) {
            toast('Xóa tag thành công', 'success');
            return redirect()->back();
        }
        toast('Có lỗi xảy ra, không thể xóa tag', 'error');
        return redirect()->back();
    }
}
