@extends('layouts.admin')
@section('title','Supplier update')
@section('main')

<div class="row justify-content-center">      
    <div class="col-md-6  bg-white p-4">
        <div class="text-center">
            <h4>Supplier update</h4>
        </div>
        <form action="{{route('suppliers.update',$supplier->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$supplier->id}}">
            <div class="form-group">
                <label for="">Supplier name</label>
                <input type="text" name="name" value="{{$supplier->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" {{$supplier->status == 1 ? 'checked' : ''}} class="custom-control-input" value="1"><span class="custom-control-label">Enable</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="0" {{$supplier->status == 0 ? 'checked' : ''}}><span class="custom-control-label">Disable</span>
                </label>
            </div>
            <div class="form-group">
                <label for="">Supplier image</label>
                <input type="file" class="form-control-file  @error('upload') is-invalid @enderror" name="upload" placeholder="">
                 <img src="{{url('uploads')}}/{{$supplier->image}}" alt="" width="100px">
                @error('upload')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
                <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>
   </div>
@stop()
