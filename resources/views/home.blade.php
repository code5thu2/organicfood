@extends('layouts.app')

@section('main')
<section>
    <!-- bắt đầu top banner -->
    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <!-- <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
        </ol> -->
        <div class="carousel-inner" role="listbox">
            @foreach($banner_top as $bt)
            <div class="carousel-item {{$bt->prioty == 1 ? 'active' : ''}} text-center">
                <img src="{{url('uploads')}}/{{$bt->image}}" alt="{{$bt->name}}" class="lazy img-fluid" />
                <div class="carousel-caption d-none d-md-block">
                    <h3>{{$bt->descript}}</h3>
                    <a href="{{$bt->descript}}">Learn more</a>
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
    <!-- kết thúc top banner -->
    <!-- bắt đầu danh sách danh mục theo dạng carousel -->
    <div class="container category-banner">
        <div class="category-carousel owl-carousel owl-theme text-center">
            @foreach($parentCat as $p)
            <div class="item">
                <img data-src="{{url('uploads')}}/{{$p->image}}" class="lazy img-fluid" alt="" />
                <h2><span>{{$p->name}}</span> fruits</h2>
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
        <div class="container">
            <div class="product-carousel owl-carousel owl-theme text-center">
                <div class="item">
                    <div class="card shadow card-pro">
                        <div class="img-pro">
                            <img class="card-img-top" src="{{url('public')}}/app/images/background-img/bg-category.jpg" alt="Card image">
                            <div class="overlay-pro">
                                <ul class="icon-content">
                                    <li>
                                        <a href="#" class="icon-pro"><i class="far fa-eye"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="icon-pro"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="icon-pro"><i class="fas fa-shopping-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body text-center body-pro">
                            <span class="card-title title-pro">Lee Uniforms Vegetablsấe's Short-Sleeve</span>
                            <div class="price-pro">
                                <span>$ 23.00</span>
                                <span><del>$ 12.00</del></span>
                            </div>
                            <div class="buy-now">
                                <a href="#" class="btn btn-outline-primary stretched-link"><i class="fas fa-shopping-basket"></i> buy now</a>
                            </div>
                        </div> <!-- end-card-body -->
                    </div> <!-- end card -->
                </div>
            </div>
        </div>
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
            <div class="row">
                <div class="col-md-3">
                    <ul>
                        <li>
                            <div class="card product-item w-100">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img src="{{url('public')}}/app/images/product/product-img.jpg" class="card-img-top img-fluid" alt="..." />
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="text-left card-body">
                                            <h5>jessica simpon</h5>
                                            <div class="product-rating"></div>
                                            <span>$ 23.00</span>
                                            <span><del>$ 12.00</del></span>
                                            <a href="#" class="btn btn-outline-primary stretched-link"><i class="fas fa-shopping-basket"></i> buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card product-item w-100">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img src="{{url('public')}}/app/images/product/product-img.jpg" class="card-img-top img-fluid" alt="..." />
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="text-left card-body">
                                            <h5 class="">jessica simpon</h5>
                                            <div class="product-rating" data-rating="4"></div>
                                            <span>$ 23.00</span>
                                            <span><del>$ 12.00</del></span>
                                            <a href="#" class="btn btn-outline-primary stretched-link"><i class="fas fa-shopping-basket"></i> buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card product-item w-100">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img src="{{url('public')}}/app/images/product/product-img.jpg" class="card-img-top img-fluid" alt="..." />
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="text-left card-body">
                                            <h5 class="">jessica simpon</h5>
                                            <div class="product-rating" data-rating="4"></div>
                                            <span>$ 23.00</span>
                                            <span><del>$ 12.00</del></span>
                                            <a href="#" class="btn btn-outline-primary stretched-link"><i class="fas fa-shopping-basket"></i> buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="{{url('public')}}/app/images/background-img/gradient-large-bg-img.png" alt="">
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>
                            <div class="card product-item w-100">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img src="{{url('public')}}/app/images/product/product-img.jpg" class="card-img-top img-fluid" alt="..." />
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="text-left card-body">
                                            <h5 class="">jessica simpon</h5>
                                            <div class="product-rating" data-rating="4"></div>
                                            <span>$ 23.00</span>
                                            <span><del>$ 12.00</del></span>
                                            <a href="#" class="{{url('public')}}/app/btn btn-outline-primary stretched-link"><i class="fas fa-shopping-basket"></i> buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card product-item w-100">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img src="{{url('public')}}/app/images/product/product-img.jpg" class="card-img-top img-fluid" alt="..." />
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="text-left card-body">
                                            <h5 class="">jessica simpon</h5>
                                            <div class="product-rating" data-rating="4"></div>
                                            <span>$ 23.00</span>
                                            <span><del>$ 12.00</del></span>
                                            <a href="#" class="btn btn-outline-primary stretched-link"><i class="fas fa-shopping-basket"></i> buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card product-item w-100">
                                <div class="row no-gutters">
                                    <div class="col-sm-5">
                                        <img src="{{url('public')}}/app/images/product/product-img.jpg" class="card-img-top img-fluid" alt="..." />
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="text-left card-body">
                                            <h5 class="">jessica simpon</h5>
                                            <div class="product-rating" data-rating="4"></div>
                                            <span>$ 23.00</span>
                                            <span><del>$ 12.00</del></span>
                                            <a href="#" class="btn btn-outline-primary stretched-link"><i class="fas fa-shopping-basket"></i> buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- kết thúc phần main show sản phẩm -->
    <!-- bắt đầu mid banner -->
    <div class="container mid-banner">
        <div class="row justify-content-between">
            <div class="col-md-8 mr-1 p-0">
                <img src="{{url('public')}}/app/images/banner/blueberries-2278921_1920.jpg" class="img-banner" alt="">
                <div class="banner-title">
                    <h1>fresh fruit</h1>
                    <a name="" id="" class="btn btn-outline-primary" href="#" role="button">shop now</a>
                </div>
            </div>
            <div class="col-md-4 ml-1 p-0">
                <img src="{{url('public')}}/app/images/banner/yogurt-1442034_1920.jpg" class="img-banner" alt="">
                <div class="banner-title">
                    <h5>free shipping</h5>
                    <p>lorwfsa</p>
                    <a name="" id="" class="btn btn-outline-primary" href="#" role="button">shop now</a>
                </div>
            </div>
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
            <div class="item"><img src="{{url('public')}}/app/images/blog/anna-tukhfatullina-food-photographer-stylist-9nKSSII7B5E-unsplash.jpg" class="img-fluid" alt="">
                <div class="blog-content">
                    <strong>march 4,2020</strong>
                    <p>quick dinner, healthy recipes, and more</p>
                </div>
            </div>
            <div class="item"><img src="{{url('public')}}/app/images/blog/anna-tukhfatullina-food-photographer-stylist-9nKSSII7B5E-unsplash.jpg" class="img-fluid" alt="">
                <div class="blog-content">
                    <strong>march 4,2020</strong>
                    <p>quick dinner, healthy recipes, and more</p>
                </div>
            </div>
            <div class="item"><img src="{{url('public')}}/app/images/blog/anna-tukhfatullina-food-photographer-stylist-9nKSSII7B5E-unsplash.jpg" class="img-fluid" alt="">
                <div class="blog-content">
                    <strong>march 4,2020</strong>
                    <p>quick dinner, healthy recipes, and more</p>
                </div>
            </div>
            <div class="item"><img src="{{url('public')}}/app/images/blog/anna-tukhfatullina-food-photographer-stylist-9nKSSII7B5E-unsplash.jpg" class="img-fluid" alt="">
                <div class="blog-content">
                    <strong>march 4,2020</strong>
                    <p>quick dinner, healthy recipes, and more</p>
                </div>
            </div>
            <div class="item"><img src="{{url('public')}}/app/images/blog/anna-tukhfatullina-food-photographer-stylist-9nKSSII7B5E-unsplash.jpg" class="img-fluid" alt="">
                <div class="blog-content">
                    <strong>march 4,2020</strong>
                    <p>quick dinner, healthy recipes, and more</p>
                </div>
            </div>
            <div class="item"><img src="{{url('public')}}/app/images/blog/anna-tukhfatullina-food-photographer-stylist-9nKSSII7B5E-unsplash.jpg" class="img-fluid" alt="">
                <div class="blog-content">
                    <strong>march 4,2020</strong>
                    <p>quick dinner, healthy recipes, and more</p>
                </div>
            </div>
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
            <form action="#">
                <input class="newsletter-input" type="text" placeholder="Enter your email here">
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
    <!-- bắt đầu phần help box -->
    <div class="container help-box mt-4">
        <div class="row align-items-center">
            <div class="col-sm-3 p-0">
                <div class="row align-items-center">
                    <div class="col-4 help-icon"><i class="fas fa-shipping-fast"></i></div>
                    <div class="col-8 help-content ">
                        <h3>free shipping</h3>
                        <p>worldwide</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-0">
                <div class="row align-items-center">
                    <div class="col-4 help-icon"><i class="fas fa-headphones-alt"></i></div>
                    <div class="col-8 help-content ">
                        <h3>24x7</h3>
                        <p>customer support</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-0">
                <div class="row align-items-center">
                    <div class="col-4 help-icon"><i class="fas fa-headphones-alt"></i></div>
                    <div class="col-8 help-content ">
                        <h3>returns</h3>
                        <p>and exchange</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-0">
                <div class="row align-items-center">
                    <div class="col-4 help-icon"><i class="fas fa-phone-volume"></i></div>
                    <div class="col-8 help-content ">
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