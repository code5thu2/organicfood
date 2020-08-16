@extends('layouts.admin')
@section('title','Danh sách bình luận')
@section('main')
<?php

use Carbon\Carbon; ?>
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white text-center">
        <table class="table table-hover">
            <thead class=" thead-light">
                <tr>
                    <th>Người dùng</th>
                    <th>Bài viết</th>
                    <th>Nội dung</th>
                    <th>Ngày tạo</th>
                    <th width="4%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($comment as $model)
                <tr class="text-dark">
                    <td scope="row">{{$model->customer->name}}</td>
                    <td class=" text-left">{{$model->blog->name}}</td>
                    <td class=" text-left">{{$model->content}}</td>
                    <td>{{date('d-m-Y',strtotime($model->created_at))}}</td>
                    <td>
                        <form action="{{route('admin.comment_del',$model->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="mt-3 col-12">
                {{$comment->withQueryString()->links()}}
            </div>
        </div>
    </div>
</div>
@stop()