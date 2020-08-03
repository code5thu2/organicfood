@extends('layouts.admin')
\@section('title','update')
@section('main')
<div class="row justify-content-center">
    <div class="col-md-6  bg-white p-4">
        <div class="text-center">
            <h4>shiping update new</h4>
        </div>
        <form action="{{route('admin.shipings.update',$shiping->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$shiping->id}}">
            <div class="form-group">
                <label for="">ship name</label>
                <input type="text" name="name" value="{{$shiping->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">prioty</label>
                <input type="text" name="prioty" value="{{$shiping->prioty}}" class="form-control @error('prioty') is-invalid @enderror">
                @error('prioty')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

             <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" {{$shiping->status == 1 ? 'checked' : ''}} class="custom-control-input" value="1"><span class="custom-control-label">Enable</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="0" {{$shiping->status == 0 ? 'checked' : ''}}><span class="custom-control-label">Disable</span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">update</button>
        </form>
    </div>
</div>
@stop()