<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcrise;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\subcriseAddRequest;
class SubcriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcrise = Subcrise::all();
        return view('admin.subcrises.index',compact('subcrise'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subcrises.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(subcriseAddRequest $request)
    {
        if (Subcrise::create($request->all())) {
            Alert::toast('Tạo mới thành công','success');
            return redirect()->route('admin.subcrises.index');
        }
         Alert::toast('Có lỗi xảy ra','error');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcrise  $subcrise
     * @return \Illuminate\Http\Response
     */
    public function show(Subcrise $subcrise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcrise  $subcrise
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcrise $subcrise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcrise  $subcrise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcrise $subcrise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcrise  $subcrise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcrise $subcrise)
    {
        if ($subcrise->delete()){
            Alert::toast('Xóa thành công','success');
            return redirect()->back();
        }
            Alert::toast('Có lỗi xảy ra','error');
            return redirect()->back();
    }
}
