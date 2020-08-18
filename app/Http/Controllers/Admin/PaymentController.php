<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Requests\paymentRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::all();
        return view('admin.payments.index', compact('payment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(paymentRequest $request)
    {
        if (Payment::create($request->all())) {
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
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('admin.payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(paymentRequest $request, Payment $payment)
    {

        if ($payment->update($request->only('name', 'status'))) {
            Alert::toast('Cập nhật thành công', 'success');
            return redirect()->route('admin.payments.index');
        } else {
            Alert::toast('Có lỗi xảy ra, vui lòng thử lại sau', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        if ($payment->delete()) {
            Alert::toast('Xóa thành công', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Có lỗi xảy ra, vui lòng thử lại sau', 'error');
            return redirect()->back();
        }
    }
}
