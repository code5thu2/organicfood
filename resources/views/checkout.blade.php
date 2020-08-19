@extends('layouts.app')
@section('title','Thanh toán')
@section('meta')
<meta name="description" content="Thanh toán">
<meta name="keywords" content="Thanh toán">
@stop()
@section('main')
<?php
$br_item = 'Thanh toán';
?>
@include('page.breadcrumb',['br_item' => $br_item,'data' => ''])
<!-- BẮt đầu phần checkout box -->
<div class="container checkout-box text-left">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h2 class="checkout-head">Thông tin người nhận</h2>
            <form action="" method="POST">
                @csrf
                <div class=" row checkout-form text-left">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="name" value="{{Auth::guard('cus')->user()->name}}" class="form-control @error('name') border border-danger @enderror" placeholder="Tên người nhận">
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="phone" value="{{Auth::guard('cus')->user()->phone}}" class="form-control @error('phone') border border-danger @enderror" placeholder="Số điện thoại">
                        @error('phone')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" name="email" value="{{Auth::guard('cus')->user()->email}}" class="form-control @error('email') border border-danger @enderror" placeholder="Email người nhận">
                        @error('email')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" name="address" value="{{Auth::guard('cus')->user()->address}}" class="form-control @error('address') border border-danger @enderror" placeholder="Địa chỉ người nhận">
                        @error('address')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <select class="form-control @error('payment_id') border border-danger @enderror" name="payment_id">
                            @foreach($payment as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                        </select>
                        @error('payment_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <select class="form-control @error('shipping_id') border border-danger @enderror" name="shipping_id">
                            @foreach($shipping as $s)
                            <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                        @error('shipping_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <textarea rows="5" placeholder="Ghi chú..." class="form-control pt-2" name="note"></textarea>
                    </div>
                </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h2 class="checkout-head">Your Order</h2>
            <div class="checkout-order-table text-left table-responsive">
                <table class="table ">
                    <thead>
                        <tr class="th-head">
                            <th scope="col" width="68%">PRODCUT</th>
                            <th scope="col" width="42%">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->items as $item)
                        <tr>
                            <td>{{$item['name']}} x {{$item['quantity']}} {{$item['unit']}}</td>
                            <td>{{number_format($item['price']*$item['quantity'])}} đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="cart-subtotal">
                            <td>Tạm tính</td>
                            <td>{{number_format($cart->total_price)}} đ</td>
                        </tr>
                        <!-- <tr class="cart-shopping">
                                <td>Phí vận chuyển</td>
                                <td>Flat rate: $ 2.00</td>
                            </tr> -->
                        <tr class="cart-total">
                            <td>Tổng tiền</td>
                            <td>{{number_format($cart->total_price)}} đ</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="place-order">
                <button type="submit" class="btn btn-primary btn-block ">Đặt hàng</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Kết thúcthúc phần checkout box -->

<!-- bắt đầu phần help box -->
@include('page.help_box')
<!-- kết thúc phần help box -->
</section>
@stop()
@section('js')
<script>
    $(function() {
        $(":input").bind('keydown', function() {
            $('form#quantity_update').submit();
        });
    })
</script>
@stop()