@extends('layouts.app')
@section('main')
<?php

use Carbon\Carbon;
?>
<section>
    <?php
    $br_item = 'Danh sách bài viết';
    ?>
    @include('page.breadcrumb',['br_item' => $br_item,'data' => ''])
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
                                    <li><a href=""><i class="far fa-comment-dots"></i> {{$model->commentsTotal->count()}} comment</a></li>
                                </ul>
                                <h2 class="card-title"><a href="">{{$model->summary}}</a></h2>
                                <a type="button" class="read-btn btn btn-outline-primary" href="{{route('blogs.blog_detail',['id' => $model->id,'slug' => $model->slug])}}">read more</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div>{{$blog->links()}}</div>
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
    @include('page.help_box')
</section>
@stop()