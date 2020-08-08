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
    <!-- bắt đầu phần product list -->
    <div class="product-list-content">
        <div class="container">
            <div class="row">
                @include('page.category_widget')
                <div class="col-md-8 col-sm-12 col xs-12">
                    <div class="row">
                        @foreach($product as $model)
                        <div class="col-md-4">
                            <div class="card shadow card-pro">
                                <div class="img-pro">
                                    <img class="lazy card-img-top img-fluid" data-src="{{url('uploads/Products')}}/{{$model->image}}" alt="Card image">
                                    <div class="overlay-pro">
                                        <ul class="icon-content">
                                            <li><a href="{{route('home.view',['slug' => $model->slug])}}" class="icon-pro">
                                                    <i class="far fa-eye"></i>
                                                </a></li>
                                            <li><a href="#" class="icon-pro">
                                                    <i class="far fa-heart"></i>
                                                </a></li>
                                            <li><a href="#" class="icon-pro">
                                                    <i class="fas fa-cart-arrow-down"></i>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body text-center body-pro">
                                    <span class="card-title title-pro">{{$model->name}}</span>
                                    <div class="price-pro">
                                        <span>đ {{$model->sale >0 ? number_format($model->sale) : number_format($model->price)}}</span>
                                        <span><del>đ {{$model->sale > 0 ? number_format($model->price) : '0.00'}}</del></span>
                                    </div>
                                    <div class="buy-now">
                                        <a href="#" class="btn btn-outline-primary stretched-link"><i class="fas fa-shopping-basket"></i> buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> <!-- end-row -->
                    <div>{{$product->links()}}</div>
                    <!-- end-container -->
                </div> <!-- end-col-8 -->
            </div>
        </div>
    </div>

    <!-- kết thúc phần product list -->
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