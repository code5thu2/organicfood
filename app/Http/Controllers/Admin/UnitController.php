<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\unitRequest;
use RealRashid\SweetAlert\Facades\Alert;


class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::all();
        return view('admin.units.index', compact('unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.units.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(unitRequest $request)
    {
        if (Unit::create($request->all())) {
           Alert::toast('Tạo mới thành công','success');
             return redirect()->route('admin.units.index');
        }
        Alert::toast('Có lỗi xảy ra','error');
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('admin.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(unitRequest $request, Unit $unit)
    {
        if ($unit->update($request->all())) {
           Alert::toast('Cập nhật thành công', 'success');
            return Redirect()->route('admin.units.index');
        }
        Alert::toast('Có lỗi xảy ra', 'error');
        return  redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        if ($unit->delete()) {
            Alert::toast('Xóa thành công','success');
            return redirect()->back();
        }
        Alert::toast('Có lỗi xảy ra','error');
        return redirect()->back();
    }
}
