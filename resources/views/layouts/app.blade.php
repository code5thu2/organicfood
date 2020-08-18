<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    @yield('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="{{url('public')}}/app/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{url('public')}}/app/fontawesome/css/all.css" />
    <link rel="stylesheet" href="{{url('public')}}/app/OwlCarousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{url('public')}}/app/OwlCarousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{url('public')}}/app/css/style.css" />
    <link rel="stylesheet" href="{{url('public')}}/app/ratting/star-rating-svg.css" />
    @yield('css')
</head>

<body>
    <!-- Bắt đầu search form -->
    <div id="myOverlay" class="overlay">
        <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
        <div class="overlay-content">
            <form action="" method="get">
                <input type="text" placeholder="Tìm kiếm sản phẩm" name="name_pro" />
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <!-- kết thúc search formform -->
    </div>
    <div class="mastercontainer">
        <header>
            <!-- bắt đầu top-header -->
            <div class="top-nav container-fluid">
                <div class="row align-items-center clearfix">
                    <div class="social col-md-10">
                        <ul>
                            <li>
                                <a id="social" href=""><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a id="social" href=""><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a id="social" href=""><i class="fab fa-google-plus-g"></i></a>
                            </li>
                            <li>
                                <a id="social" href=""><i class="fab fa-pinterest-p"></i></a>
                            </li>
                            <li>
                                <a id="social" href=""><i class="fab fa-youtube"></i></a>
                            </li>
                            <li id="contact">
                                <span class="contact-title ml-5">Phone: </span>
                                <a href="tel:{{$contact_view->phone}}">{{$contact_view->phone}}</a>
                                <span class="contact-title ml-2">Email: </span>
                                <a href="mailto:{{$contact_view->email}}">{{$contact_view->email}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="my-account col-md-2">
                        <div class="dropdown">
                            @if(Auth::guard('cus')->check())
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-user"></i>
                                {{Auth::guard('cus')->user()->name}}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="{{route('customer.profile')}}">Profile</a>
                                <a class="dropdown-item" href="{{route('customer.order')}}">Danh sách đơn hàng</a>
                                <a class="dropdown-item" href="{{route('customer.wishlist_list')}}">Wishlist</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('customer.logout')}}">Logout</a>
                            </div>
                            @else
                            <button class="btn btn-secondary">
                                <a class="login-btn" href="{{route('customer.login')}}">Login / Register</a>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- kết thúc top-header -->
            <!-- bắt đầu mid-header -->
            <div class="mid-nav container-fluid">
                <div class="row align-items-center">
                    <div class="col-4 text-left">
                        <form action="{{route('customer.wishlist_list')}}" method="get">
                            <button class="btn btn-circle wish-list">
                                <i class="far fa-heart"></i>
                                @if(Auth::guard('cus')->check())
                                <span class="badge badge-secondary">{{Auth::guard('cus')->user()->wishlist->count()}}</span>
                                @endif
                            </button>
                        </form>
                    </div>
                    <div class="col-4 text-center p-0">
                        <a id="logo" href=""><img src="{{url('public')}}/app/images/logo/main-logo.png" alt="" /></a>
                    </div>
                    <div class="col-4 text-right">
                        <button class="btn btn-circle search-btn" onclick="openSearch()">
                            <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-circle cart-btn" onclick="showCartBox()">
                            <i class="fa fa-shopping-bag"></i>
                            @if($cart->total_quantity > 0)
                            <span class="badge badge-secondary">{{$cart->total_quantity < 10 ? '0'.$cart->total_quantity : $cart->total_quantity }}</span>
                            @endif
                        </button>
                    </div>
                </div>
                <!-- Bắt đầu cart box -->
                <div class="card float-right" id="cartBox">
                    <div class="card-body">
                        <span class="float-right"><a type="btn" onclick="closeCartBox()"><i class="fas fa-times"></i></a></span>
                        <p class="card-text font-weight-bolder">{{$cart->total_quantity}} items in your cart</p>
                        <ul class="list-group list-group-flush">
                            @foreach($cart->items as $item)
                            <li class="list-group-item border-0">
                                <div class="row">
                                    <div class="col-3"><img src="{{url('uploads')}}/{{$item['image']}}" class="img-fluid" alt=""></div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-11 cart-pro">{{$item['name']}} <span class="float-right"><a href="{{route('cart.remove',['id' => $item['id']])}}">x</a></span> </div>
                                            <div class="col-12">{{$item['quantity']}} x {{number_format($item['price'])}}đ</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <h5>Total: {{number_format($cart->total_price)}} đ</h5>
                        <div class="">
                            <a href="{{route('cart.view')}}" type="button" class="view-cart btn btn-outline-primary"> view cart</a>
                            <a href="{{route('checkout')}}" type="button" class="checkout btn btn-primary float-right">
                                checkout
                            </a>
                        </div>
                    </div>
                </div>
                <!-- kết thúc cart box -->
            </div>
            <!-- kết thúc mid-headerheader -->
            <!-- bắt đầu nav chính -->
            <div class="main-nav">
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                            <span class="navbar-toggler-icon"> </span>
                        </button>
                        <div class="navbar-collapse collapse" id="navbar">
                            <ul class="navbar-nav nav-fill w-100">
                                <li class="nav-item">
                                    <a class="nav-link active" style="color: #88C442;" href="{{route('home')}}">home</a>
                                </li>
                                <li class="dropdown menu-large position-static nav-item">
                                    <a href="{{route('home.product_list')}}" class="shop dropdown-toggle nav-link" data-toggle="dropdown">Shop</a>
                                    <ul class="dropdown-menu megamenu dropdown_menu-7">
                                        <div class="row">
                                            @foreach($parentCat as $c)
                                            <li class="col-md-3 menu-item">
                                                <ul>
                                                    <li class="dropdown-header">{{$c->name}}</li>
                                                    @if($c->childCat)
                                                    @foreach($c->childCat as $sc)
                                                    <li>
                                                        <a href="{{route('home.view',['id' => $sc -> id,'slug' => $sc -> slug])}}" class="sub-menu-item">{{$sc->name}}</a>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                            @endforeach
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home.product_list')}}">sản phẩm</a>
                                </li>
                                @if(isset($cat_menu))
                                @foreach($cat_menu as $cm)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home.view',['id' => $cm -> id,'slug' => $cm -> slug])}}">{{$cm->name}}</a>
                                </li>
                                @endforeach
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('blogs.blog_list')}}">blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home.about')}}">about us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home.contact')}}">contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- <div class="right-btn">
                    <button class="btn search-btn reponsive-btn" onclick="openSearch()">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-circle reponsive-btn" onclick="showCartBox()">
                        <i class="fa fa-shopping-bag"></i>
                        <span class="badge badge-secondary">01</span>
                    </button>
                </div> -->
            </div>
            <!-- kết thúc nav chính -->
        </header>
        @yield('main')
        <footer>
            <div class="container top-footer">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-logo">
                            <img src="{{url('public')}}/app/images/logo/large-logo.png" class="img-fluid" alt="">
                        </div>
                        <div class="footer-contact">
                            <div class="address">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</span>
                            </div>
                            <div class="phone">
                                <i class="fas fa-phone-alt"></i>
                                <a href="">0969906925</a>
                            </div>
                            <div class="email">
                                <i class="far fa-envelope"></i>
                                <a href="">levietanhtdvp@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="title">information</div>
                                <ul>
                                    <li><a href="">site map</a></li>
                                    <li><a href="">search terms</a></li>
                                    <li><a href="">advanced search</a></li>
                                    <li><a href="">about us</a></li>
                                    <li><a href="">contact us</a></li>
                                    <li><a href="">supplier</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <div class="title">style advisor</div>
                                <ul>
                                    <li><a href="">your account</a></li>
                                    <li><a href="">information</a></li>
                                    <li><a href="">address</a></li>
                                    <li><a href="">discount</a></li>
                                    <li><a href="">orders history</a></li>
                                    <li><a href="">additional information</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <div class="title">quick links</div>
                                <ul>
                                    <li><a href="">blogs</a></li>
                                    <li><a href="">FAQs</a></li>
                                    <li><a href="">payment</a></li>
                                    <li><a href="">shipment</a></li>
                                    <li><a href="">where is my order?</a></li>
                                    <li><a href="">return policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="title">instagram</div>
                        <div class="instagram-img-box">
                            <img src="{{url('public')}}/app/images/social/insta-img.jpg" class="img-fluid" alt="">
                            <img src="{{url('public')}}/app/images/social/insta-img.jpg" class="img-fluid" alt="">
                            <img src="{{url('public')}}/app/images/social/insta-img.jpg" class="img-fluid" alt="">
                            <img src="{{url('public')}}/app/images/social/insta-img.jpg" class="img-fluid" alt="">
                            <img src="{{url('public')}}/app/images/social/insta-img.jpg" class="img-fluid" alt="">
                            <img src="{{url('public')}}/app/images/social/insta-img.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top shadow-lg" role="button"><i class="fas fa-chevron-up"></i></a>
    </div>
    <script src="{{url('public')}}/app/js/jquery-3.3.1.min.js"></script>
    <script src="{{url('public')}}/app/lib/angular.min.js"></script>
    <script src="{{url('public')}}/app/js/popper.min.js"></script>
    <script src="{{url('public')}}/app/js/bootstrap.min.js"></script>
    <script src="{{url('public')}}/app/OwlCarousel/owl.carousel.min.js"></script>
    <script src="{{url('public')}}/app/ratting/jquery.star-rating-svg.js"></script>
    @include('sweetalert::alert')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
    <script src="{{url('public')}}/app/app.js"></script>
    @yield('js')
    <script>
        function openSearch() {
            document.getElementById('myOverlay').style.display = 'block';
        }

        function closeSearch() {
            document.getElementById('myOverlay').style.display = 'none';
        }

        function showCartBox() {
            document.getElementById('cartBox').style.display = 'block';
        }

        function closeCartBox() {
            document.getElementById('cartBox').style.display = 'none';
        }

        // back to top

        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function() {
                $('body,html').animate({
                    scrollTop: 0
                }, 1500);
                return false;
            });
        });

        //lazy load image
        $(function() {
            $('.lazy').Lazy();
        });
        $('.category-carousel').owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            center: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                600: {
                    items: 3,
                    nav: false,
                },
            },
        });
        $('.product-carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                768: {
                    items: 3,
                },

                993: {
                    items: 4,
                },
            },
        });
        $('.blog-carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
            },
        });
        $('.brand-carousel').owlCarousel({
            loop: true,
            margin: 60,
            nav: true,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 4,
                },
                768: {
                    items: 5,
                },
            },
        });
    </script>
    <script>
        $(".product-rated").starRating({
            totalStars: 5,
            starShape: 'rounded',
            starSize: 14,
            emptyColor: 'lightgray',
            hoverColor: '#5e9e47',
            activeColor: '#5e9e47',
            ratedColor: '#5e9e47',
            useGradient: false,
            readOnly: true
        });
    </script>
</body>

</html>