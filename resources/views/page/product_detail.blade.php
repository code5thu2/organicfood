@extends('layouts.app')
@section('main')
<section>
    <div class="container-fluid sub-banner">
        <img src="{{url('public')}}/app/images/banner/adli-wahid-nmF_6DxByAw-unsplash.jpg" class="img-fluid" alt="" />
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
    <div class="product-detail-page">
        @foreach(@product_detail as $model)
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sp-wrap">
                        <a href="{{url('uploads')}}/Products/do-xanh.jpg"><img src="{{url('uploads')}}/Products/do-xanh.jpg" alt="" class="img-fluid"></a>
                        <a href="{{url('uploads')}}/1596419198-elianna-friedman-4jpnpu7iw8k-unsplash.jpg"><img src="{{url('uploads')}}/1596419198-elianna-friedman-4jpnpu7iw8k-unsplash.jpg" alt="" class="img-fluid"></a>
                        <a href="{{url('uploads')}}/Products/do-xanh.jpg"><img src="{{url('uploads')}}/Products/do-xanh.jpg" alt="" class="img-fluid"></a>
                        <a href="{{url('uploads')}}/Products/do-xanh.jpg"><img src="{{url('uploads')}}/Products/do-xanh.jpg" alt="" class="img-fluid"></a>
                        <a href="{{url('uploads')}}/Products/do-xanh.jpg"><img src="{{url('uploads')}}/Products/do-xanh.jpg" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="product-name">Lorem ipsum dolor sit,</h3>
                    <div class="rating-total">
                        <div class="product-rated" data-rating="4"></div>
                        <span> 05 reviews </span>
                    </div>
                    <div class="price">
                        <div class="original-price">$23.00</div>
                        <div class="sale-price"><del>$12.00</del></div>
                    </div>
                    <div class="product-status">
                        Available: <span>Còn hàng</span>
                    </div>
                    <div class="product-description">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat, animi veniam. Nisi praesentium tenetur quia sequi odio porro iure nihil? Commodi omnis dolorem dignissimos, nisi blanditiis dolorum delectus illum alias.</p>
                    </div>
                    <div class="product-quantity">
                        <div class="def-number-input number-input safari_only">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                            <input class="quantity" min="1" name="quantity" value="" type="number">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                        </div>
                        <div class="cart ml-2">
                            <button class="cart-detail-btn">Add to cart</button>
                        </div>
                        <div class="extra">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tag-box">
                        <div class="tag-row">
                            <span class="tag-label category">Category</span><span class="dots">:</span>
                            <div class="category-value tag-label-value ">Vegetables</div>
                        </div>
                        <div class="tag-row">
                            <span class="tag-label">Tags</span><span class="dots">:</span>
                            <div class="tag-label-value"><a class="tag-btn" href="#">Food</a>
                                <a class="tag-btn" href="#">Organic Food</a>
                                <a class="tag-btn" href="#">Garden</a>
                            </div>
                        </div>
                        <div class="tag-row">
                            <span class="tag-label">Share</span><span class="dots">:</span>
                            <div class="tag-label-value">
                                &nbsp;
                                <ul class="social-share">
                                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="tab-section">
                        <ul class="nav nav-tabs">
                            <li class="nav-item ml-2">
                                <a href="#description" class="nav-link active" data-toggle="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#review" class="nav-link" data-toggle="tab">Review</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description">
                                <h4 class="mt-2">Home tab content</h4>
                                <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                            </div>
                            <div class="tab-pane fade" id="review">
                                <h4 class="mt-2">Profile tab content</h4>
                                <div class="product-rating" data-rating=""></div>
                                <input type="" name="rate" value="" id="input_rate">
                                <input type="text" id="input_1" value="2" gia_tri="2">
                                <div class="mt-3" id="kq_input_1">ABC</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
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
@section('css')
<link rel="stylesheet" href="{{url('public')}}/app/smoothproducts/smoothproducts.css">
@stop()
@section('js')
<script src="{{url('public')}}/app/smoothproducts/js/smoothproducts.min.js"></script>
<script type="text/javascript">
    /* wait for images to load */
    $(window).one("load", function() {
        $('.sp-wrap').smoothproducts();
    });
</script>
<script>
    $(".product-rating").starRating({
        totalStars: 5,
        starShape: 'rounded',
        starSize: 45,
        emptyColor: 'lightgray',
        hoverColor: '#5e9e47',
        activeColor: '#5e9e47',
        ratedColor: '#5e9e47',
        useGradient: false,
        disableAfterRate: false,
        callback: function(currentRating) {
            console.log(currentRating);
            var _input = document.getElementById("input_rate");
            _input.value = currentRating;
            console.log(_input.value);
        }
    });
    var input_1 = document.getElementById("input_1")
    var value_input_1 = input_1.value
    console.log(value_input_1)
    var gia_tri_input_1 = input_1.getAttribute("gia_tri")
    console.log(gia_tri_input_1)
    var div_input_1 = document.getElementById("kq_input_1")
    div_input_1.innerHTML = value_input_1
</script>
@stop()