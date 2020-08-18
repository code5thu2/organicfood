@extends('layouts.admin')
@section('title','blog update')
@section('main')
<form action="{{route('admin.blogs.update',$blog->id)}}" method="post" enctype="multipart/form-data">
    <div class="row justify-content-center bg-white p-4">
        <div class="col-md-12">
            <h4>Blog update</h4>
        </div>
        <div class="col-md-6">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$blog->id}}">
            <div class="form-group">
                <label for="">Blog name</label>
                <input type="text" name="name" value="{{$blog->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Summary</label>
                <input name="summary" class="form-control @error('summary') is-invalid @enderror" cols="10" rows="10" value="{{$blog->summary}}"></input>
                @error('summary')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Blog image</label>
                @include('image_box',['image'=>$blog->image])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">meta_title</label>
                <input type="text" name="meta_title" value="{{$blog->meta_title}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">meta_descript</label>
                <input type="text" name="meta_descript" value="{{$blog->meta_descript}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">meta_key</label>
                <input type="text" name="meta_key" value="{{$blog->meta_key}}" class="form-control ">
            </div>
            <div class="form-group">
                <label for="">Trạng thái</label> <br>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" value="1" class="custom-control-input" {{$blog->status == 1 ? 'checked' : ''}}><span class="custom-control-label">Enable</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" value="0" class="custom-control-input" {{$blog->status == 0 ? 'checked' : ''}}><span class="custom-control-label">Disable</span>
                </label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="30">{{$blog->content}}</textarea>
                @error('content')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">update</button>
    </div>
</form>
@stop()
@section('js')
<script src="{{url('public')}}/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{url('public')}}/tinymce/config.js" referrerpolicy="origin"></script>
@stop()