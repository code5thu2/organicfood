@extends('layouts.app')
@section('title','Trang chủ')
@section('meta')
<meta name="description" content="Organic food">
<meta name="keywords" content="Organic">
@stop()
@section('main')
<?php

use Carbon\Carbon;
?>
<section>
    <!-- bắt đầu top banner -->
    <div class="container-fluid banner-top">
        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach($banner_top as $bt)
                <div class="carousel-item {{$bt->prioty == 1 ? 'active' : ''}} text-center">
                    <img src="{{url('uploads')}}/{{$bt->image}}" alt="First slide" class="img-fluid" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{$bt->sub_description}}</h5>
                        <h3>{{$bt->description}}</h3>
                        <a href="{{$bt->link}}" type="button" class="btn btn-outline-light">Learn more</a>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                <span class="prev-btn" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                <span class="next-btn" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- kết thúc top banner -->
    <!-- bắt đầu danh sách danh mục theo dạng carousel -->
    <div class="container category-banner">
        <div class="category-carousel owl-carousel owl-theme text-center">
            @foreach($cat_slide as $cs)
            <div class="item">
                <img src="{{url('uploads')}}/{{$cs->image}}" class="img-fluid" alt="" />
                <h2><a href="{{route('home.view',['id' => $cs -> id,'slug' => $cs -> slug])}}">{{$cs->name}}</a></h2>
            </div>
            @endforeach
        </div>
    </div>
    <!-- kết thúc danh sách danh mục theo dạng carousel -->
    <!-- bắt đầu show sản phẩm theo new arrivals -->
    <div class="new-arrivals container-fluid text-center clearfix">
        <div class="sub-logo">
            <img src="{{url('public')}}/app/images/logo/sub-logo.png" alt="" />
        </div>
        <div class="title-box container">
            <div class="row">
                <div class="col-3 bg-img">
                    <div class="left-bg-img">
                        <img class="img-fluid float-right" src="{{url('public')}}/app/images/background-img/bg-img-3.png" alt="" />
                    </div>
                </div>
                <div class="col-6 title-text">
                    <span class="green-text">new</span> <span>arrivals</span>
                </div>
                <div class="col-3 bg-img">
                    <div class="right-bg-img">
                        <img class="img-fluid float-left" src="{{url('public')}}/app/images/background-img/bg-img-4.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
        @if(isset($pro_new))
        <div class="container">
            <div class="product-carousel owl-carousel owl-theme text-center">
                @foreach($pro_new as $model)
                <div class="item">
                    @include('page.product_box_vertical',$model)
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    <!-- kết thúc show sản phẩm theo new arrivals -->
    <!-- bắt đầu phần main show sản phẩm -->
    <div class="main text-center">
        <div class="sub-logo">
            <img src="{{url('public')}}/app/images/logo/sub-logo.png" alt="" />
        </div>
        <div class="title-box container">
            <div class="row">
                <div class="col-3 bg-img">
                    <div class="left-bg-img">
                        <img class="img-fluid float-right" src="{{url('public')}}/app/images/background-img/bg-img-3.png" alt="" />
                    </div>
                </div>
                <div class="col-6 title-text">
                    <span class="green-text">deal of</span> <span>the day</span>
                </div>
                <div class="col-3 bg-img">
                    <div class="right-bg-img">
                        <img class="img-fluid float-left" src="{{url('public')}}/app/images/background-img/bg-img-4.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <ol class="breadcrumb w-75 justify-content-center">
                <li class="breadcrumb-item"><a href="#">all</a></li>
                <li class="breadcrumb-item"><a href="#">fruit</a></li>
                <li class="breadcrumb-item"><a href="#">meet</a></li>
                <li class="breadcrumb-item"><a href="#">vegetable</a></li>
            </ol>
        </nav>
        <div class="product-show container">
            <div class="row justify-content-around">
                @if($pro_sell)
                @foreach($pro_sell as $ps)
                <div class="col-md-4 pt-3 pb-3">
                    <div class="card product-item w-100">
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <img data-src="{{url('uploads')}}/{{$ps->image}}" class="lazy card-img-top img-fluid" alt="..." />
                            </div>
                            <div class="col-sm-7">
                                <div class="text-left card-body">
                                    <h5 class="">{{$ps->name}}</h5>
                                    <div class="product-rated" data-rating="{{$ps->ratings->avg('number')}}"></div>
                                    <span>{{$ps->sale >0 ? number_format($ps->sale) : number_format($ps->price)}} đ</span>
                                    <span><del>{{$ps->sale > 0 ? number_format($ps->price) : '0.00'}} đ</del></span>
                                    <a href="{{route('home.view',['id'=> $ps->id,'slug' => $ps->slug])}}" class="btn btn-outline-primary stretched-link"><i class="fas fa-shopping-basket"></i> buy now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- kết thúc phần main show sản phẩm -->
    <!-- bắt đầu mid banner -->
    <div class="container mid-banner">
        <div class="row justify-content-between">
            @if(isset($banner_mid_l))
            <div class="col-md-8 mr-1 p-0">
                <img src="{{url('uploads')}}/{{$banner_mid_l->image}}" class="img-banner" alt="">
                <div class="banner-title">
                    <h1>{{$banner_mid_l->description}}</h1>
                    <a class="btn btn-outline-primary" href="{{$banner_mid_l->link}}" role="button">shop now</a>
                </div>
            </div>
            @endif
            @if(isset($banner_mid_r))
            <div class="col-md-4 ml-1 p-0">
                <img src="{{url('uploads')}}/{{$banner_mid_r->image}}" class="img-banner" alt="">
                <div class="banner-title">
                    <h5>{{url('uploads')}}/{{$banner_mid_r->description}}</h5>
                    <a class="btn btn-outline-primary" href="{{$banner_mid_r->link}}" role="button">shop now</a>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- kết thúc mid banner -->
    <!-- bắt đầu blog list -->
    <div class="container-fluid text-center">
        <div class="sub-logo">
            <img src="{{url('public')}}/app/images/logo/sub-logo.png" alt="" />
        </div>
        <div class="title-box container">
            <div class="row">
                <div class="col-3 bg-img">
                    <div class="left-bg-img">
                        <img class="img-fluid float-right" src="{{url('public')}}/app/images/background-img/bg-img-3.png" alt="" />
                    </div>
                </div>
                <div class="col-6 title-text">
                    <span class="green-text">organic</span> <span>news</span>
                </div>
                <div class="col-3 bg-img">
                    <div class="right-bg-img">
                        <img class="img-fluid float-left" src="{{url('public')}}/app/images/background-img/bg-img-4.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-carousel owl-carousel owl-theme">
            @if(isset($new_blog))
            @foreach($new_blog as $nb )
            <div class="item"><img data-src="{{url('uploads')}}/{{$nb->image}}" class="lazy img-fluid" alt="">
                <div class="blog-content">
                    <strong>{{$nb->created_at->toFormattedDateString()}}</strong>
                    <p>{{$nb->name}}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>

    <!-- kết thúc blog list -->
    <!-- bắt đầu step -->
    <div class="container text-center">
        <div class="sub-logo">
            <img src="{{url('public')}}/app/images/logo/sub-logo.png" alt="" />
        </div>
        <div class="title-box container">
            <div class="row">
                <div class="col-3 bg-img">
                    <div class="left-bg-img">
                        <img class="img-fluid float-right" src="{{url('public')}}/app/images/background-img/bg-img-3.png" alt="" />
                    </div>
                </div>
                <div class="col-6 title-text">
                    <span class="green-text">delivery</span> <span>process</span>
                </div>
                <div class="col-3 bg-img">
                    <div class="right-bg-img">
                        <img class="img-fluid float-left" src="{{url('public')}}/app/images/background-img/bg-img-4.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row step-box">
            <div class="col-sm-3 first">
                <div class="step-img">
                    <img class="img-fluid" src="{{url('public')}}/app/images/background-img/bg-img-5.png" alt="">
                    <i class="fas fa-carrot"></i>
                </div>
                <div class="step-name">
                    <h3 class="step">step 01</h3>
                    <p>choose one or more products</p>
                </div>
            </div>
            <div class="col-sm-3 second">
                <div class="step-img">
                    <img class="img-fluid" src="{{url('public')}}/app/images/background-img/bg-img-6.png" alt="">
                    <i class="fas fa-warehouse"></i>
                </div>
                <div class="step-name">
                    <h3 class="step">step 02</h3>
                    <p>determine our farm</p>
                </div>
            </div>
            <div class="col-sm-3 third">
                <div class="step-img">
                    <img class="img-fluid" src="{{url('public')}}/app/images/background-img/bg-img-7.png" alt="">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="step-name">
                    <h3 class="step">step 03</h3>
                    <p>write your location</p>
                </div>
            </div>
            <div class="col-sm-3 forth">
                <div class="step-img">
                    <img class="img-fluid" src="{{url('public')}}/app/images/background-img/bg-img-8.png" alt="">
                    <i class="fas fa-box-open"></i>
                </div>
                <div class="step-name">
                    <h3 class="step">step 04</h3>
                    <p>fast delivery</p>
                </div>
            </div>
        </div>
    </div>
    <!-- kết thúc step -->
    <!-- bắt đầu new letter -->
    <div class="container-fluid new-letter">
        <div class="bg-rgba">
        </div>
        <div class="center">
            <h3><span>sign up</span> newsletter</h3>
            <p>Sign up our newsletter to recieve <span>latest news</span> and <span>greate offers</span>:</p>
        </div>
        <div class="letter-form">
            <form action="{{route('subscribe.sign')}}" method="GET">
                @csrf
                <input class="newsletter-input" name="email_subscribe" type="email" required placeholder="Enter your email here">
                <button class="newsletter-btn">subscribe</button>
            </form>
        </div>
    </div>
    <!-- kết thúc new letter -->
    <!-- bắt đầu phần brand -->
    <div class="container">
        <div class="brand-carousel owl-carousel owl-theme">
            <div class="item"><img src="{{url('public')}}/app/images/partner/partner-1.jpg" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{url('public')}}/app/images/partner/partner-2.jpg" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{url('public')}}/app/images/partner/partner-3.jpg" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{url('public')}}/app/images/partner/partner-4.jpg" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{url('public')}}/app/images/partner/partner-5.jpg" alt="" class="img-fluid"></div>
        </div>
    </div>
    <!-- kết thúc phầnphần brand -->
    @include('page.help_box')
</section>
@stop()