@extends('layouts.admin')
@section('title','Supplier create')
@section('main')

<div class="row justify-content-center">
    <div class="col-md-6  bg-white p-4">
        <div class="text-center">
            <h4>Thêm nhà cung cấp mới</h4>
        </div>
        <form action="{{route('admin.suppliers.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên nhà cung cấp</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" checked="" class="custom-control-input" value="1"><span class="custom-control-label">Enable</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="0"><span class="custom-control-label">Disable</span>
                </label>
            </div>
            <div class="form-group mb-2">
                <label>Ảnh</label>
                @include('image_box',['image' => ''])
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="{{route('admin.suppliers.index')}}" type="btn" class="btn btn-outline-primary btn-block">Cancle</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop()