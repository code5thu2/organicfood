@extends('layouts.app')
@section('title','About us')
@section('meta')
<meta name="description" content="About us">
<meta name="keywords" content="About">
@stop()
@section('main')
<?php

use Carbon\Carbon;
?>
<section>
    <?php
    $br_item = 'About us';
    ?>
    @include('page.breadcrumb',['br_item' => $br_item,'data' => ''])
    <div class="about-page">
        <!-- bat dau phan who we are -->
        <section class="who-we-are">
            <div class="container">
                <div class="row">
                    <!-- phan anh -->
                    <div class="col-md-6 img-part">
                        <figure>
                            <img src="{{url('public')}}/app/images/about-img.jpg" class="img-responsive">

                        </figure>
                    </div>
                    <!-- end phan anh -->
                    <!-- phan chu -->
                    <div class="col-md-6 txt-part">
                        <div class="sec-tit">
                            <h2><span>Who</span> we are</h2>
                        </div>
                        <h3>Remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets...</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end phan who we are -->
        <!-- bat dau phan farming -->
        <section class="farming-industry-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <!-- bat dau phan box 1,2 -->
                            <div class="col-md-4 ">
                                <div class="box first">
                                    <div class="sr">01</div>
                                    <div class="txt-part">
                                        <div class="tit">Hand Planted</div>
                                        <p>Blandit justo et, sodales est. Phasellus dignissim libero tempus consequat gravida. Maecenas vel fringilla est.</p>
                                    </div>
                                </div>
                                <div class="box second">
                                    <div class="sr">02</div>
                                    <div class="txt-part">
                                        <div class="tit">Well Watered</div>
                                        <p>Blandit justo et, sodales est. Phasellus dignissim libero tempus consequat gravida. Maecenas vel fringilla est.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end phan box 1,2 -->
                            <!-- bat dau phan year -->
                            <div class="col-md-4">
                                <div class="free-section">
                                    <div class="free-inner">
                                        <h2 class="years">over <span>25</span> years</h2>
                                        <div class="slogan">in the farming<br>industry</div>
                                    </div>
                                </div>
                            </div>
                            <!-- end phan year -->
                            <!-- bat dau phan box 3,4 -->
                            <div class="col-md-4">
                                <div class="box third">
                                    <div class="sr">03</div>
                                    <div class="txt-part">
                                        <div class="tit">Natural Sunlight</div>
                                        <p>Blandit justo et, sodales est. Phasellus dignissim libero tempus consequat gravida. Maecenas vel fringilla est.</p>
                                    </div>
                                </div>
                                <div class="box fourth">
                                    <div class="sr">04</div>
                                    <div class="txt-part">
                                        <div class="tit">Perfect Product</div>
                                        <p>Blandit justo et, sodales est. Phasellus dignissim libero tempus consequat gravida. Maecenas vel fringilla est.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end phan box 3,4 -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ket thuc phan framing -->
        </section>
        <!-- bat dau phan chose us -->
        <section class="choose-us">
            <div class="container">
                <div class="col">
                    <div class="col-lg-5">
                        <div class="tit">
                            <h2><span>Why</span> choose us</h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda culpa vel blanditiis commodi inventore. Iure cumque maxime quidem ea, eaque accusantium beatae molestias eius ratione numquam voluptates, cum quia nisi!</p>
                    </div>
                    <div class="flow">

                    </div>
                </div>
        </section>
        <!-- bat dau phan our farm -->
        <section class="our-farm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-tit">
                            <div class="inner">
                                <h2>our Farmers</h2>
                            </div>
                        </div>
                        <!-- end text -->
                        <!-- bat dau phan carousel -->
                        <div class="owl-carousel owl-theme carousel-our-fram">
                            <div class="item">
                                <div class="person text-center">
                                    <div class="img-background">
                                        <img class="img-person" src="{{url('public')}}/app/images/helper.png" alt="Card image cap">
                                    </div>
                                    <div class="contain-wrapper">
                                        <div class="tit">Công Vinh</div>
                                        <div class="post">Help manager</div>
                                        <ul class="social row">
                                            <li><a class="icon-farm" href=""><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                            <li><a class="icon-farm" href=""><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a class="icon-farm" href=""><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="person text-center">
                                    <div class="img-background">
                                        <img class="img-person" src="{{url('public')}}/app/images/owner.jpg" alt="Card image cap">
                                    </div>
                                    <div class="contain-wrapper">
                                        <div class="tit">Lê Anh</div>
                                        <div class="post">owner</div>
                                        <ul class="social row">
                                            <li><a class="icon-farm" href=""><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                            <li><a class="icon-farm" href=""><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a class="icon-farm" href=""><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="person text-center">
                                    <div class="img-background">
                                        <img class="img-person" src="{{url('public')}}/app/images/farmer.png" alt="Card image cap">
                                    </div>
                                    <div class="contain-wrapper">
                                        <div class="tit">Minh Tú</div>
                                        <div class="post">farm manager</div>
                                        <ul class="social row">
                                            <li><a class="icon-farm" href=""><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                            <li><a class="icon-farm" href=""><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a class="icon-farm" href=""><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end phan carousel -->
                        </div> <!-- end-row -->
                    </div> <!-- end-col-md-12 -->
                </div><!-- end-container -->
        </section>
        <!-- end phan our farm -->
        <!-- bat dau phan doi tac -->
        <div class="brand">
            <div class="container">
                <div class="carousel-band owl-carousel owl-theme">
                    <div class="item"><img src="images/brand-1.png"></div>
                    <div class="item"><img src="images/brand-1.png"></div>
                    <div class="item"><img src="images/brand-1.png"></div>
                    <div class="item"><img src="images/brand-1.png"></div>
                    <div class="item"><img src="images/brand-1.png"></div>
                    <div class="item"><img src="images/brand-1.png"></div>
                    <div class="item"><img src="images/brand-1.png"></div>

                </div><!-- end carousel-->

            </div>
            <!--end container -->
        </div> <!-- end-brand -->
    </div>
    @include('page.help_box')
</section>
@stop()
@section('js')
<script>
    $('.carousel-our-fram').owlCarousel({
        loop: true,
        margin: 35,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })
    autoplay: true
    autoplayTimeout: 1
    autoplayHoverPause: false
</script>
<script>
    $('.carousel-band').owlCarousel({
        loop: true,
        margin: 35,
        nav: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            768: {
                items: 4
            },
            1000: {
                items: 6
            }
        }
    })
    autoplay: true
    autoplayTimeout: 1
    autoplayHoverPause: false
</script>
@stop()