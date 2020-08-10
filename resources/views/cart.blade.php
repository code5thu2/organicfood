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
    <!-- bắt đầu phần add to cart-->
    <div class="container order-detail-page">
        <div class="row">
            <div class="col-md-8">
                @foreach($cart->items as $item)
                <div class="card mt-3 border-0 shadow">
                    <div class="row no-gutters">
                        <div class="col-sm-2 p-2">
                            <img src="{{url('uploads')}}/{{$item['image']}}" class="card-img-top img-fluid" alt="...">
                        </div>
                        <div class="col-sm-10 p-2">
                            <div class="row">
                                <div class="col-8">
                                    <h3>{{$item['name']}}</h3>
                                    <p>{{number_format($item['price'])}}đ / {{$item['unit']}}</p>
                                    <a class=" mt-2" href="{{route('cart.remove',['id' => $item['id']])}}">Xóa</a>
                                </div>
                                <div class="col-4">
                                    <form action="{{route('cart.update',['id' => $item['id']])}}" id="quantity_update" method="get">
                                        <div class="product-quantity" style="border: 1px solid #D9D5D2;">
                                            <div class="def-number-input number-input safari_only">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="1" name="quantity" value="{{$item['quantity']}}" type="number">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>
                                        </div>
                                    </form>
                                    <h5 class="mt-3 float-right">{{number_format($item['price']*$item['quantity'])}} đ</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="left-part mt-3">
                    <a href="{{route('home.product_list')}}" class="continue-shopping-btn">Tiếp tục mua sắm</a>
                </div>
                <div class="right-part mt-3">
                    <a class="cancle-cart-btn" href="{{route('cart.clear')}}">cancle cart</a>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card text-left border-0 shadow">
                    <div class="card-body">
                        <span>Tạm tính:</span> <span class="float-right text-danger">
                            <h5>{{number_format($cart->total_price)}} đ</h5>
                        </span>
                    </div>
                </div>
                <button type="button" name="" id="" class="btn btn-danger btn-lg btn-block mt-3">Tiến hành thanh toán</button>
            </div>
        </div>
    </div>
    <!-- kết thúc phần add to cart-->
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