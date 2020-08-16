@extends('layouts.admin')
@section('title','Supplier update')
@section('main')

<div class="row justify-content-center">
    <div class="col-md-6  bg-white p-4">
        <div class="text-center">
            <h4>Cập nhật nhà cung cấp</h4>
        </div>
        <form action="{{route('admin.suppliers.update',$supplier->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$supplier->id}}">
            <div class="form-group">
                <label for="">Tên nhà cung cấp</label>
                <input type="text" name="name" value="{{$supplier->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="1" {{$supplier->status == 1 ? 'checked' : ''}}><span class="custom-control-label">Enable</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="0" {{$supplier->status == 0 ? 'checked' : ''}}><span class="custom-control-label">Disable</span>
                </label>
            </div>
            <div class="form-group mb-2">
                <label>Ảnh</label>
                @include('image_box',['image' => $supplier->image])
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="{{route('admin.suppliers.index')}}" type="btn" class="btn btn-outline-primary btn-block">Cancle</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop()