<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\bannerAddRequest;
use App\Http\Requests\bannerEditRequest;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        return view('admin.banners.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(bannerAddRequest $request)
    {
        if ($request->hasFile('upload')) {
            $file_name = uploadImg('upload');
            $request->merge(['image' => $file_name]);
        }
        if (Banner::create($request->all())) {
            Alert::toast('Tạo mới thành công', 'success');
            return redirect()->route('admin.banners.index');
        }
        Alert::toast('Có lỗi xảy ra','error');
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(bannerEditRequest $request, Banner $banner)
    {
        if ($request->hasFile('upload')) {
            $file_name = uploadImg('upload');
            $request->merge(['image' => $file_name]);
        }
        if ($banner->update($request->all())) {
            return redirect()->route('admin.banners.index')->with('yes', 'Update supplier successfully');
        }
        return redirect()->back()->with('no', 'Update supplier failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if ($banner->delete()) {
            Alert::toast('Xóa thành công','success');
            return Redirect()->back();
        }
        Alert::toast('Có lỗi xảy ra','error');
        return Redirect()->back();
    }
}
