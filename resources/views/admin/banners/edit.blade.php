@extends('layouts.admin')
@section('title','banner update')
@section('main')

<div class="row justify-content-center bg-white p-4">
    <div class="col-12">
        <h4>Thêm mới banner</h4>
    </div>
    <div class="col-md-6">
        <form action="{{route('admin.banners.update',$banner->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Tên banner</label>
                <input type="text" name="name" value="{{$banner->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Banner link</label>
                <input type="text" name="link" value="{{$banner->link}}" class="form-control @error('link') is-invalid @enderror">
                @error('link')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả chính</label>
                <input type="text" name="description" value="{{$banner->description}}" class="form-control @error('description') is-invalid @enderror">
                @error('description')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả phụ</label>
                <input type="text" name="sub_description" value="{{$banner->sub_description}}" class="form-control @error('sub_description') is-invalid @enderror">
                @error('sub_description')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Banner position</label>
                <select class="form-control" name="position" value="{{$banner->position}}" class="form-control">
                    <option value="">--- --- ---</option>
                    <option value="0" {{$banner->position == 0 ? 'selected' : ''}}>Top</option>
                    <option value="1" {{$banner->position == 1 ? 'selected' : ''}}>Mid-left</option>
                    <option value="2" {{$banner->position == 2 ? 'selected' : ''}}>mid-right</option>
                </select>
            </div>
            <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="1" {{$banner->status == 1 ? 'checked' : ''}}><span class="custom-control-label">Enable</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="0" {{$banner->status == 0 ? 'checked' : ''}}><span class="custom-control-label">Disable</span>
                </label>
            </div>
            <div class="form-group">
                <label for="">Vị trí hiển thị: </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="prioty" checked="" class="custom-control-input" value="1"><span class="custom-control-label">Active</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="prioty" checked="" class="custom-control-input" value="0"><span class="custom-control-label">Normal</span>
                </label>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="{{route('admin.banners.index')}}" type="btn" class="btn btn-outline-primary btn-block">Cancle</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Banner image</label>
            @include('image_box',['image' => $banner->image])
        </div>
    </div>
    </form>
</div>
@stop()