<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\bannerAddRequest;
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
        $bans = new Banner;
        $add_ban = $bans->createBan($request);
        if ($add_ban) {
            Alert::toast('Tạo mới banner thành công', 'success');
            return redirect()->route('admin.banners.index');
        } else {
            Alert::toast('Không thể tạo mới banner, có lỗi xảy ra', 'error');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(bannerAddRequest $request, Banner $banner)
    {
        $bans = new Banner;
        $up_ban = $bans->updateBan($banner);
        if ($up_ban) {
            Alert::toast('Cập nhật banner thành công', 'success');
            return redirect()->route('admin.banners.index');
        } else {
            Alert::toast('Không thể cập nhật banner', 'error');
            return redirect()->back();
        }
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
            Alert::toast('Xóa thành công', 'success');
            return Redirect()->back();
        }
        Alert::toast('Có lỗi xảy ra', 'error');
        return Redirect()->back();
    }
}
