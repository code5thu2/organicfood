@extends('layouts.app')
@section('main')
<?php

use Carbon\Carbon;
?>
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
    <!-- bắt đầu phần blog -->
    <div class="container blog-page">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    @foreach($blog as $model)
                    <div class="col-md-4">
                        <div class="card blog-item text-left">
                            <img class=" lazy card-img-top img-fluid" data-src="{{url('uploads')}}/{{$model->image}}" alt="">
                            <div class="card-body">
                                <ul>
                                    <li><a href=""><i class="far fa-clock"></i> {{$model->created_at->toFormattedDateString()}}</a></li>
                                    <li><a href=""><i class="far fa-comment-dots"></i> 0 comment</a></li>
                                </ul>
                                <h2 class="card-title"><a href="">{{$model->summary}}</a></h2>
                                <a type="button" class="read-btn btn btn-outline-primary" href="{{route('blogs.blog_detail',['id' => $model->id,'slug' => $model->slug])}}">read more</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <aside class="blog-sidebar">
                    <div class="search-blog-box">
                        <form class="form-search">
                            <div>
                                <input type="text" name="" id="" placeholder="search here...">
                                <input type="submit" name="" id="searchSubmit">
                            </div>
                        </form>
                    </div>
                    <div class="blog-sidebar-title">
                        <h3>recent post</h3>
                        <div class="card blog-box text-left">
                            <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <img class="card-img-top img-fluid" src="images/blog/dose-juice-ocnsb17U6FE-unsplash.jpg" alt="">
                                </div>
                                <div class="col-sm-7 card-body pl-1 m-0">
                                    <h2 class="card-title"><a href="">Green Tea for Change Your Eating Food</a>
                                    </h2>
                                    <ul class="p-0 m-0">
                                        <li><a href=""><i class="far fa-clock"></i> april 30, 2018</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card blog-box text-left">
                            <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <img class="card-img-top img-fluid" src="images/blog/dose-juice-ocnsb17U6FE-unsplash.jpg" alt="">
                                </div>
                                <div class="col-sm-7 card-body pl-1 m-0">
                                    <h2 class="card-title"><a href="">Green Tea for Change Your Eating Food</a>
                                    </h2>
                                    <ul class="p-0 m-0">
                                        <li><a href=""><i class="far fa-clock"></i> april 30, 2018</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card blog-box text-left">
                            <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <img class="card-img-top img-fluid" src="images/blog/dose-juice-ocnsb17U6FE-unsplash.jpg" alt="">
                                </div>
                                <div class="col-sm-7 card-body pl-1 m-0">
                                    <h2 class="card-title"><a href="">Green Tea for Change Your Eating Food</a>
                                    </h2>
                                    <ul class="p-0 m-0">
                                        <li><a href=""><i class="far fa-clock"></i> april 30, 2018</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card blog-box text-left">
                            <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <img class="card-img-top img-fluid" src="images/blog/dose-juice-ocnsb17U6FE-unsplash.jpg" alt="">
                                </div>
                                <div class="col-sm-7 card-body pl-1 m-0">
                                    <h2 class="card-title"><a href="">Green Tea for Change Your Eating Food</a>
                                    </h2>
                                    <ul class="p-0 m-0">
                                        <li><a href=""><i class="far fa-clock"></i> april 30, 2018</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card blog-box text-left">
                            <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <img class="card-img-top img-fluid" src="images/blog/dose-juice-ocnsb17U6FE-unsplash.jpg" alt="">
                                </div>
                                <div class="col-sm-7 card-body pl-1 m-0">
                                    <h2 class="card-title"><a href="">Green Tea for Change Your Eating Food</a>
                                    </h2>
                                    <ul class="p-0 m-0">
                                        <li><a href=""><i class="far fa-clock"></i> april 30, 2018</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card blog-box text-left">
                            <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <img class="card-img-top img-fluid" src="images/blog/dose-juice-ocnsb17U6FE-unsplash.jpg" alt="">
                                </div>
                                <div class="col-sm-7 card-body pl-1 m-0">
                                    <h2 class="card-title"><a href="">Green Tea for Change Your Eating Food</a>
                                    </h2>
                                    <ul class="p-0 m-0">
                                        <li><a href=""><i class="far fa-clock"></i> april 30, 2018</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!-- kết thúc phần blog -->
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