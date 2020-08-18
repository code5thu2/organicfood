@extends('layouts.admin')
@section('title','Thêm địa chỉ')
@section('main')

<div class="row justify-content-center">
    <div class="col-md-6  bg-white p-4">
        <div class="text-center">
            <h4>Thêm địa chỉ mới</h4>
        </div>
        <form action="{{route('admin.contacts.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Điện thoại</label>
                <input type="text" name="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror">
                @error('address')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Bản đồ nhúng</label>
                <textarea type="text" name="map" value="{{old('map')}}" class="form-control @error('map') is-invalid @enderror">{{old('map')}}</textarea>
                @error('map')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="1"><span class="custom-control-label">Hiện</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" checked="" class="custom-control-input" value="0"><span class="custom-control-label">Ẩn</span>
                </label>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="{{route('admin.contacts.index')}}" type="btn" class="btn btn-outline-primary btn-block">Cancle</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop()