@extends('layouts.app')
@section('main')
<div class="container whishlist-page">
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th class="product">PRODUCT</th>
                    <th class="name">Name &amp; Description</th>
                    <th class="price">Price</th>
                    <th class="quantity">product status</th>
                    <th class="total">add to cart</th>
                    <th class="cancle">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="cart-image-wrapper">
                        <a href="#"><img class="cart-image" src="images/cart-img-1.jpg" alt=""></a>
                    </td>
                    <td class="product-tit"><a href="#">Strawberries, 16 oz</a></td>
                    <td class="price"><span class="money">$2.50 / ea</span></td>
                    <td>
                        In stock
                    </td>
                    <td class="total"><a class="add-to-cart" href="#">Add to cart</a></td>
                    <td class="cancle"><a href="#"><i class="icon-cancel-music"></i></a></td>
                </tr>
                <tr>
                    <td class="cart-image-wrapper"><a href="#"><img class="cart-image" src="images/cart-img-2.jpg" alt=""></a></td>
                    <td class="product-tit"><a href="#">Broccoli, bunch</a></td>
                    <td class="price"><span class="money">$2.50 / ea</span></td>
                    <td>
                        In stock
                    </td>
                    <td class="total"><a class="add-to-cart" href="#">Add to cart</a></td>
                    <td class="cancle"><a href="#"><i class="icon-cancel-music"></i></a></td>
                </tr>
                <tr>
                    <td class="cart-image-wrapper"><a href="#"><img class="cart-image" src="images/cart-img-3.jpg" alt=""></a></td>
                    <td class="product-tit"><a href="#">Strawberries, 16 oz</a></td>
                    <td class="price"><span class="money">$2.50 / ea</span></td>
                    <td>
                        In stock
                    </td>
                    <td class="total"><a class="add-to-cart" href="#">Add to cart</a></td>
                    <td class="cancle"><a href="#"><i class="icon-cancel-music"></i></a></td>
                </tr>
                <tr>
                    <td class="cart-image-wrapper"><a href="#"><img class="cart-image" src="images/cart-img-4.jpg" alt=""></a></td>
                    <td class="product-tit"><a href="#">Broccoli, bunch</a></td>
                    <td class="price"><span class="money">$2.50 / ea</span></td>
                    <td>
                        In stock
                    </td>
                    <td class="total"><a class="add-to-cart" href="#">Add to cart</a></td>
                    <td class="cancle"><a href="#"><i class="icon-cancel-music"></i></a></td>
                </tr>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</div>
@include('page.help_box')
@stop()