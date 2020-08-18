@extends('layouts.app')
@section('title',$product_detail->name)
@section('meta')
<meta name="description" content="{{$product_detail->name}}">
<meta name="keywords" content="{{$product_detail->name}}">
@stop()
@section('main')
<section>
    <?php
    $br_item = $product_detail->cat->name;
    ?>
    @include('page.breadcrumb',['br_item' => $br_item,'data' => $product_detail])
    <div class="product-detail-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sp-wrap">
                        <a href="{{url('uploads')}}/{{$product_detail->image}}"><img src="{{url('uploads')}}/{{$product_detail->image}}" alt="" class="img-fluid"></a>
                        @if($product_detail->images)
                        @foreach($product_detail->images as $i)
                        <a href="{{url('uploads')}}/{{$i->name}}"><img src="{{url('uploads')}}/{{$i->name}}" alt="" class="img-fluid"></a>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="product-name">{{$product_detail->name}}</h3>
                    <div class="rating-total">
                        <div class="product-rated mt-2" data-rating="{{$svg_rate}}"></div>
                        <span> ({{$total_review}} nhận xét) </span>
                    </div>
                    <div class="price">

                        <div class="original-price">đ {{$product_detail->sale > 0 ? number_format($product_detail->sale) : number_format($product_detail->price)}}</div>
                        <div class="sale-price"><del>{{$product_detail->sale > 0 ? 'đ '.number_format($product_detail->price) : ''}}</del></div>
                    </div>
                    <div class="product-status">
                        Available: <span>
                            <?php switch ($product_detail->status) {
                                case 1:
                                    echo ('Hết hàng');
                                    break;
                                case 2:
                                    echo ('Còn hàng');
                                    break;
                                case 3:
                                    echo ('New');
                                    break;
                                case 4:
                                    echo ('Sale');
                                    break;
                                case 5:
                                    echo ('Hot');
                                    break;
                                default:
                                    '';
                            } ?>
                        </span>
                    </div>
                    <div class="product-description">
                        <p>{{$product_detail->description}}</p>
                    </div>
                    <div class="product-quantity">
                        <form action="{{route('cart.add',['id' => $product_detail->id])}}" method="get">
                            <div class="def-number-input number-input safari_only">
                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                <input class="quantity" min="1" name="quantity" value="1" type="number">
                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                            </div>
                            <div class="cart ml-2">
                                <button type="submit" class="cart-detail-btn">Add to cart</button>
                            </div>
                        </form>
                        <div class="extra">
                            <ul class="list-inline">
                                <li><a href="{{route('customer.wishlist',$product_detail->id)}}"><i class="fas fa-heart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tag-box">
                        <div class="tag-row">
                            <span class="tag-label category">Category</span><span class="dots">:</span>
                            <div class="category-value tag-label-value ">{{$product_detail->cat->name}}</div>
                        </div>
                        <div class="tag-row">
                            <span class="tag-label">Tags</span><span class="dots">:</span>
                            <div class="tag-label-value">
                                @if($product_detail->tags->count())
                                @foreach($product_detail->tags as $t)
                                <a class="tag-btn" href="#">{{$t->name}}</a>
                                @endforeach
                                @endif
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
                            <div class="tab-pane fade show active mt-2" id="description">
                                {!!$product_detail->content!!}
                            </div>
                            <div class="tab-pane fade" id="review">
                                <div class="row align-items-center rated-box">
                                    <div class="rating-point col-sm-4 text-center p-4">
                                        <h4>Đánh giá trung bình</h4>
                                        <p class="score">{{$svg_rate}}/5</p>
                                        <div class="product-rated" data-rating="{{$svg_rate}}"></div>
                                        <p>({{$total_review}} nhận xét)</p>
                                    </div>
                                    <div class="col-sm-4 text-center p-4"></div>
                                    <div class="col-sm-4 text-center p-4 align-items-center">
                                        <div class="">
                                            @if(Auth::guard('cus')->check())
                                            <button class="btn btn-danger" style="border-radius: 0;" data-toggle="collapse" data-target="#collapserating" aria-expanded="false" aria-controls="collapserating">Viết nhận xét của bạn</button>
                                            @else
                                            <button class="btn btn-primary" style="border-radius: 0;" data-toggle="collapse" data-target="#collapserating" aria-expanded="false" aria-controls="collapserating">Đăng nhập để đánh giá</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse row align-items-center p-4" id="collapserating">
                                    @if(Auth::guard('cus')->check())
                                    @if(in_array(Auth::guard('cus')->user()->id,$cus_array))
                                    <h3>Bạn đã đánh giá sản phẩm này rồi</h3>
                                    @else
                                    <span>Đánh giá của bạn: </span>
                                    <div class="product-rating float-right" data-rating=""></div>
                                    <form action="{{route('rating')}}" method="post">
                                        @csrf
                                        <div class="mt-3">
                                            <input type="hidden" name="number" value="" id="input_rate">
                                            <input type="hidden" name="product_id" value="{{$product_detail->id}}">
                                            <input type="hidden" name="customer_id" value="{{Auth::guard('cus')->user()->id}}">
                                            <textarea class="mt-1" name="content" cols="100%" rows="5"></textarea>
                                        </div>
                                        <div class="w-100">
                                            <button type="submit" class="btn btn-sm btn-warning mt-2">Gửi đánh giá</button>
                                        </div>
                                    </form>
                                    @endif
                                    @else
                                    <form action="{{route('customer.post_login')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-sm btn-primary">Đăng nhập</button>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                                <div class="review-list">
                                    @if(isset($product_detail->ratings))
                                    @foreach($product_detail->ratings as $rate)
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="mt-0">{{$rate->customer->name}} <small style="color:#549843;">{{date('d-m-Y',strtotime($rate->created_at))}}</small></h5>
                                            <div class="product-rated" data-rating="{{$rate->number}}"></div>
                                            <p>{{$rate->content}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('page.help_box')
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
    $(".product-rated").starRating({
        totalStars: 5,
        starShape: 'rounded',
        starSize: 25,
        emptyColor: 'lightgray',
        hoverColor: '#FFC120',
        activeColor: '#FFC120',
        ratedColor: '#FFC120',
        useGradient: false,
        readOnly: true
    });
    $(".product-rating").starRating({
        totalStars: 5,
        starShape: 'rounded',
        starSize: 25,
        minRating: 1,
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
</script>
@stop()