@extends('layouts.admin')
@section('title','blog')
@section('main')
<form action="{{route('admin.blogs.store')}}" method="post" enctype="multipart/form-data">
<div class="row justify-content-center bg-white p-4">
    <div class="col-md-12">
        <h4>Blog add new</h4>
    </div>
    <div class="col-md-6"> 
            @csrf
             <div class="form-group">
                <label for="">Blog name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Summary</label>
                 <textarea name="summary"  class="form-control @error('summary') is-invalid @enderror" cols="10" rows="10" value="{{old('summary')}}">{{old('summary')}}</textarea>
                @error('summary')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
                <div class="form-group">
                    <label for="">Blog image</label>
                    <input type="file" class="form-control-file  @error('upload') is-invalid @enderror" name="upload" placeholder="" value="{{old('upload')}}">
                    @error('upload')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
    </div>
            <div class="col-md-6">
                  <div class="form-group">
                <label for="">meta_title</label>
                <input type="text" name="meta_title" value="{{old('meta_title')}}" class="form-control">
            </div>
              <div class="form-group">
                <label for="">meta_descript</label>
                <input type="text" name="meta_descript" value="{{old('meta_descript')}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">meta_key</label>
                <input type="text" name="meta_key" value="{{old('meta_key')}}" class="form-control ">
            </div>
                <div class="form-group">
                    <label for="">Trạng thái</label> <br>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="status" checked="" class="custom-control-input" value="1"><span class="custom-control-label">Enable</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="status" class="custom-control-input" value="0"><span class="custom-control-label">Disable</span>
                    </label>
                </div>
            </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Content</label>
            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="30" value="{{old('content')}}">{{old('content')}}</textarea>
            @error('content')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Add</button>
</div>
 </form>
@stop()
@section('js')
<script src="{{url('public')}}/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{url('public')}}/tinymce/config.js" referrerpolicy="origin"></script>
@stop()