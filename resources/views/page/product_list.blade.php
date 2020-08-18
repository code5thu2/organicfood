@extends('layouts.app')
@section('title','Danh sách sản phẩm')
@section('meta')
<meta name="description" content="Danh sách sản phẩm">
<meta name="keywords" content="Hoa quả sạch">
@stop()
@section('main')
<section>
    <?php
    $br_item = 'Danh sách sản phẩm';
    ?>
    @include('page.breadcrumb',['br_item' => $br_item,'data' => ''])
    <!-- bắt đầu phần product list -->
    <div class="product-list-content">
        <div class="container">
            <div class="row">
                @include('page.category_widget')
                <div class="col-md-8 col-sm-12 col xs-12">
                    <div class="row">
                        @include('page.filter_pro')
                        @foreach($product as $model)
                        <div class="col-md-4">
                            @include('page.product_box_vertical',$model)
                        </div>
                        @endforeach
                    </div>
                    <div>{{$product->withQueryString()->links()}}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- kết thúc phần product list -->
    @include('page.help_box')
</section>
@stop()