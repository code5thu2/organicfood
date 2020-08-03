<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pay;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\payAddRequest;
use App\Http\Requests\payEditRequest;
class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pay = Pay::all();
        return view('admin.pays.index',compact('pay'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pays.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(payAddRequest $request)
    {
        if(Pay::create($request->all())){
            Alert::toast('Tạo mới thành công','success');
            return redirect()->route('admin.pays.index');
        }
        Alert::toast('Có lỗi xảy ra', 'error'); 
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show(Pay $pay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay $pay)
    {
        return view('admin.pays.edit',compact('pay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function update(payEditRequest $request, Pay $pay)
    {
        if($pay->update($request->all())){
       Alert::toast('Cập nhật thành công','success');
            return redirect()->route('admin.pays.index');
        }
        Alert::toast('Có lỗi xảy ra', 'error'); 
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay $pay)
    {
        if($pay->delete()){
        Alert::toast('Xóa thành công','success');
            return redirect()->route('admin.pays.index');
        }
        Alert::toast('Có lỗi xảy ra', 'error'); 
            return redirect()->back();
    }
}
