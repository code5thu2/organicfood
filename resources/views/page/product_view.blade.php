@extends('layouts.app')
@section('main')

<section>
    <?php
    $br_item = 'Danh sách sản phẩm';
    ?>
    @include('page.breadcrumb',['br_item' => $br_item,'data' => $category])
    <!-- bắt đầu phần product list -->
    <div class="product-list-content">
        <div class="container">
            <div class="row">
                @include('page.category_widget')
                <div class="col-md-8 col-sm-12 col xs-12">
                    <div class="row">
                        @include('page.filter_pro')
                        @if($category->products->count())
                        @foreach($pro_by_id as $model)
                        <div class="col-md-4">
                            @include('page.product_box_vertical',$model)
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div>{{$pro_by_id->withQueryString()->links()}}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- kết thúc phần product list -->
    @include('page.help_box')
</section>
@stop()