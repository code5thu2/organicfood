@extends('layouts.admin')
@section('title','faq update')
@section('main')
@section('js')
<script src="{{url('public')}}/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{url('public')}}/tinymce/config.js" referrerpolicy="origin"></script>
@stop()
<div class="row justify-content-center">
    <div class="col-md-8  bg-white p-4">
        <div class="text-center">
            <h4>Faq update</h4>
        </div>
        <form action="{{route('admin.faqs.update',$faq->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$faq->id}}">
            <div class="form-group">
                <label for="">Faq name</label>
                <input type="text" name="name" value="{{$faq->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Faq prioty</label>
                <input type="text" name="prioty" value="{{$faq->prioty}}" class="form-control">
            </div>

            <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" {{$faq->status == 1 ? 'checked' : ''}} class="custom-control-input" value="1"><span class="custom-control-label">Enable</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="0" {{$faq->status == 0 ? 'checked' : ''}}><span class="custom-control-label">Disable</span>
                </label>
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="30">{{$faq->content}}</textarea>
                @error('content')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">update</button>
        </form>
    </div>
</div>
@stop()