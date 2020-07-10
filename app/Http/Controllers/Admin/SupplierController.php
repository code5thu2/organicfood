<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\supplierAddRequest;
use App\Http\Requests\supplierEditRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::paginate(5);
        return view('admin.suppliers.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(supplierAddRequest $request)
    {
        // thay doi
        if ($request->hasFile('upload')) {
            $file_name = uploadImg('upload');
            $request->merge(['image' => $file_name]);
        }
        if (Supplier::create($request->all())) {
            return redirect()->route('suppliers.index')->with('yes', 'Add new supplier successfully');
        }
        return redirect()->back()->with('no', 'Adding new supplier failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {

        return view('admin.suppliers.edit',compact('supplier'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(supplierEditRequest $request, Supplier $supplier)
    {

        if($request->hasFile('upload')){
            $file_name = uploadImg('upload');
            $request->merge(['image' => $file_name]);
        }
        if ($supplier->update($request->all())){
            return redirect()->route('suppliers.index')->with('yes','Update supplier successfully');
        }
        return redirect()->back()->with('no','Update supplier failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        if ($supplier->delete()){
        return redirect()->back()->with('yes','Successfully deleted the supplier');
        }
      return redirect()->back()->with('no','cannot deleted the supplier');
    }
 }