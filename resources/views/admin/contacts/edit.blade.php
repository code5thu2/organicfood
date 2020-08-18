@extends('layouts.admin')
@section('title','Sửa địa chỉ')
@section('main')

<div class="row justify-content-center">
    <div class="col-md-6  bg-white p-4">
        <div class="text-center">
            <h4>Sửa địa chỉ</h4>
        </div>
        <form action="{{route('admin.contacts.update',$contact->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" value="{{$contact->email}}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Điện thoại</label>
                <input type="text" name="phone" value="{{$contact->phone}}" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" value="{{$contact->address}}" class="form-control @error('address') is-invalid @enderror">
                @error('address')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Bản đồ nhúng</label>
                <textarea type="text" name="map" rows="6" value="{{$contact->map}}" class="form-control @error('map') is-invalid @enderror">{{$contact->map}}</textarea>
                @error('map')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="1" {{$contact->status == 1 ? 'checked' : ''}}><span class="custom-control-label">Hiện</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="0" {{$contact->status == 0 ? 'checked' : ''}}><span class="custom-control-label">Ẩn</span>
                </label>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="{{route('admin.contacts.index')}}" type="btn" class="btn btn-outline-primary btn-block">Cancle</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop()