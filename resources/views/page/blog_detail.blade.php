@extends('layouts.app')
@section('main')
<?php

use Carbon\Carbon;
?>
<section>
    <?php
    $br_item = 'Bài viết';
    ?>
    @include('page.breadcrumb',['br_item' => $br_item,'data' => $blog])
    <!-- bắt đầu phần blog detail-->
    <div class="container blog-detail-page">
        <div class="row">
            <div class="col-md-9">
                @if($blog)
                <div class="blog-img w-75">
                    <img data-src="{{url('uploads')}}/{{$blog->image}}" class="lazy img-fluid" alt="">
                </div>
                <ul class="blog-infor">
                    <li><a href=""><i class="far fa-clock"></i> {{$blog->created_at->toFormattedDateString()}}</a></li>
                    <li><a href=""><i class="far fa-comment-dots"></i> {{$blog->commentsTotal->count()}} comment</a></li>
                </ul>
                <h2 class="blog-title">{{$blog->summary}}</h2>
                <div class="blog-content">
                    {!!$blog->content!!}
                </div>
                <div class="comment-box mt-5">
                    <?php
                    $comment_total = $blog->commentsTotal->count();
                    ?>
                    <h3 class="sub-blog-title mb-5">{{$comment_total < 10 ? '0'.$comment_total : $comment_total}} comment</h3>
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
    @include('page.help_box')
</section>
@stop()