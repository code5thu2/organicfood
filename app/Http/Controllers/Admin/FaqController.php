<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Requests\faqAddRequest;
use App\Http\Requests\faqEditRequest;

use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::all();
        return view('admin.faqs.index', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(faqAddRequest $request)
    {
        if (Faq::create($request->all())) {
            Alert::toast('Tạo mới thành công', 'success');
            return redirect()->route('admin.faqs.index');
        }
        Alert::toast('Có lỗi xảy ra', 'error');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(faqEditRequest $request, Faq $faq)
    {
        if ($faq->update($request->all())) {
            Alert::toast('Cập nhật thành công', 'success');
            return Redirect()->route('admin.faqs.index');
        }
        Alert::toast('Có lỗi xảy ra', 'error');
        return  redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        if ($faq->delete()) {
            Alert::toast('Xóa thành công', 'success');
            return redirect()->Route('admin.faqs.index');
        }
        Alert::toast('Có lỗi xảy ra', 'error');
        return redirect()->back();
    }
}
