<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Requests\shippingRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping = Shipping::all();
        return view('admin.shippings.index', compact('shipping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(shippingRequest $request)
    {
        if (Shipping::create($request->all())) {
            Alert::toast('Thêm mới thành công', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Có lỗi xảy ra, vui lòng thử lại sau', 'error');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        return view('admin.shippings.edit', compact('shipping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(shippingRequest $request, Shipping $shipping)
    {
        if ($shipping->update($request->all())) {
            Alert::toast('Cập nhật thành công', 'success');
            return redirect()->route('admin.shippings.index');
        } else {
            Alert::toast('Có lỗi xảy ra, vui lòng thử lại sau', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        if ($shipping->delete()) {
            Alert::toast('Xóa thành công', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Có lỗi xảy ra, vui lòng thử lại sau', 'error');
            return redirect()->back();
        }
    }
}
