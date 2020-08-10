@extends('layouts.app')
@section('main')
<section>
    <div class="container-fluid sub-banner">
        <img src="images/banner/adli-wahid-nmF_6DxByAw-unsplash.jpg" class="img-fluid" alt="" />
    </div>
    <div class="container">
        <div class="row">
            <div class="breadcrumb-main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">home</a></li>
                    <li class="breadcrumb-item active">vegetables</li>
                </ol>
                <h1>vegetables</h1>
            </div>
        </div>
    </div>

    <!-- BẮt đầu phần checkout box -->
    <div class="container checkout-box text-left">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h2 class="checkout-head">02 / Billing &amp; Shipping details</h2>
                <form action="" method="POST">
                    @csrf
                    <div class=" row checkout-form text-left">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" value="{{Auth::guard('cus')->user()->name}}" class="form-control" placeholder="Tên người nhận">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="phone" value="{{Auth::guard('cus')->user()->phone}}" class="form-control" placeholder="Số điện thoại">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" name="email" value="{{Auth::guard('cus')->user()->email}}" class="form-control" placeholder="Email người nhận">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" name="address" value="{{Auth::guard('cus')->user()->address}}" class="form-control" placeholder="Địa chỉ người nhận">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select class="form-control" name="payment_id">
                                @foreach($payment as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
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
    <div class="container help-box mt-4">
        <div class="row align-items-center">
            <div class="col-sm-3 p-0">
                <div class="row align-items-center">
                    <div class="col-4 help-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="col-8 help-content">
                        <h3>free shipping</h3>
                        <p>worldwide</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-0">
                <div class="row align-items-center">
                    <div class="col-4 help-icon">
                        <i class="fas fa-headphones-alt"></i>
                    </div>
                    <div class="col-8 help-content">
                        <h3>24x7</h3>
                        <p>customer support</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-0">
                <div class="row align-items-center">
                    <div class="col-4 help-icon">
                        <i class="fas fa-headphones-alt"></i>
                    </div>
                    <div class="col-8 help-content">
                        <h3>returns</h3>
                        <p>and exchange</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-0">
                <div class="row align-items-center">
                    <div class="col-4 help-icon">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <div class="col-8 help-content">
                        <h3>hotline</h3>
                        <p>0969906925</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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