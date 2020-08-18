@extends('layouts.app')
@section('title','Danh sách yêu thích')
@section('meta')
<meta name="description" content="Danh sách yêu thích">
<meta name="keywords" content="Wishlist">
@stop()
@section('main')
<?php
$br_item = 'Danh sách yêu thích';
?>
@include('page.breadcrumb',['br_item' => $br_item,'data' =>''])
<div class="container wishlist-page">
    <div class="row justify-content-md-center">
        <div class="col-md-10 offset-md-2 table-responsive text-center">
            <table class="table table-hover table-responsive w-100">
                <thead class="w-100">
                    <tr>
                        <th class="product">PRODUCT</th>
                        <th class="name">Name &amp; Description</th>
                        <th class="price">Price</th>
                        <th class="total">add to cart</th>
                        <th class="cancle"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(Auth::guard('cus')->user()->wishlist)
                    @foreach(Auth::guard('cus')->user()->wishlist as $model)
                    <tr>
                        <td class="cart-image-wrapper" style="width: 100px;">
                            <a href="#"><img class="cart-image" src="{{url('uploads')}}/{{$model->product->image}}" alt=""></a>
                        </td>
                        <td class="product-tit"><a href="{{route('home.view',['id'=> $model->product->id,'slug' => $model->product->slug])}}">{{$model->product->name}}</a></td>
                        <td class="price"><span class="money">{{$model->product->sale >0 ? number_format($model->product->sale) : number_format($model->product->price)}} đ</span></td>
                        <td class="total"><a class="add-to-cart" href="{{route('cart.add',['id'=> $model->product->id])}}">Add to cart</a></td>
                        <td class="cancle">
                            <form action="{{route('customer.wishlist_del',$model->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@include('page.help_box')
@stop()