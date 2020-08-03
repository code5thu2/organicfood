<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shiping;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\shipingAddRequest;
use App\Http\Requests\shipingEditRequest;

class ShipingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $shiping = Shiping::all();
        return view('admin.shipings.index',compact('shiping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shipings.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(shipingAddRequest $request)
    {
        if(Shiping::create($request->all())){
            Alert::toast('Tạo mới thành công','success');
            return redirect()->route('admin.shipings.index');
        }
        Alert::toast('Có lỗi xảy ra', 'error'); 
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shiping  $shiping
     * @return \Illuminate\Http\Response
     */
    public function show(Shiping $shiping)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shiping  $shiping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shiping $shiping)
    {
        return view('admin.shipings.edit',compact('shiping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shiping  $shiping
     * @return \Illuminate\Http\Response
     */
    public function update(shipingEditRequest $request, Shiping $shiping)
    {
        if($shiping->update($request->all())){
       Alert::toast('Cập nhật thành công','success');
            return redirect()->route('admin.shipings.index');
        }
        Alert::toast('Có lỗi xảy ra', 'error'); 
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shiping  $shiping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shiping $shiping)
    {
        if($shiping->delete()){
        Alert::toast('Xóa thành công','success');
            return redirect()->route('admin.shipings.index');
        }
        Alert::toast('Có lỗi xảy ra', 'error'); 
            return redirect()->back();
    }
}
