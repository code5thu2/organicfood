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
    <!-- bắt đầu phần blog detail-->
    <div class="container blog-detail-page">
        <div class="row">
            <div class="col-md-9">
                @if($blog)
                <div class="blog-img">
                    <img data-src="{{url('uploads')}}/{{$blog->image}}" class="lazy img-fluid" alt="">
                </div>
                <ul class="blog-infor">
                    <li><a href=""><i class="far fa-clock"></i> {{$blog->created_at->toFormattedDateString()}}</a></li>
                    <li><a href=""><i class="far fa-comment-dots"></i> 0 comment</a></li>
                </ul>
                <h2 class="blog-title">{{$blog->summary}}</h2>
                <div class="blog-content">
                    {!!$blog->content!!}
                </div>
                <div class="blog-media">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="sub-blog-title">What We Can Talk About</h3>
                        </div>
                        <div class="col-md-6">
                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/1PEq0PSAz-E" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="blog-share">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6 float-left">
                            <span>Share link:</span>
                            <ul>
                                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href=""><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href=""><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="comment-box mt-5">
                    <h3 class="sub-blog-title mb-5">03 comment</h3>
                    @include('page.comments_show', ['comments' => $blog->comments, 'blog_id' => $blog->id])
                    <div class="comment-write">
                        <h3 class="sub-blog-title mb-2 mt-5">leave a comment</h3>
                        @if(Auth::guard('cus')->check())
                        <form action="{{route('comment.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="hidden" class="form-control" name="customer_id" value="{{Auth::guard('cus')->user()->id}}" id="" placeholder="name...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="hidden" class="form-control" name="blog_id" value="{{$blog->id}}" id="" placeholder="email">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for=""></label>
                                    <textarea class="form-control" name="content" id="" rows="5"></textarea>
                                </div>
                                <div class="col-md-12 ">
                                    <button type="submit" class="comment-btn btn btn-primary">submit
                                        comment</button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-3">
                <aside class="blog-sidebar">
                    <div class="search-blog-box">
                        <form class="form-search" method="GET">
                            <div>
                                <input type="text" name="key" id="" placeholder="search here...">
                                <input type="submit" name="" id="searchSubmit">
                            </div>
                        </form>
                    </div>
                    <div class="blog-sidebar-title">
                        <h3>recent post</h3>
                        @foreach($search_blog as $model)
                        <div class="card blog-box text-left">
                            <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <img class="lazy card-img-top img-fluid" data-src="{{url('uploads')}}/{{$model->image}}" alt="">
                                </div>
                                <div class="col-sm-7 card-body pl-1 m-0">
                                    <h2 class="card-title"><a href="{{route('blogs.blog_detail',['id' => $model->id,'slug' => $model->slug])}}">{{$model->summary}}</a>
                                    </h2>
                                    <ul class="p-0 m-0">
                                        <li><a href=""><i class="far fa-clock"></i> {{$model->created_at->toFormattedDateString()}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!-- kết thúc phần blog detail-->
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