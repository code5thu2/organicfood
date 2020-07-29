@extends('layouts.admin')
@section('title','banner update')
@section('main')

        <form action="{{route('admin.banners.update', $banner->id)}}" method="post" enctype="multipart/form-data">
        
<div class="row justify-content-center bg-white p-4">
    <div class="col-md-6">
        <div class="text-center ">
            <h4>Banner add new</h4>
        </div>
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$banner->id}}">
            <div class="form-group">
                <label for="">Banner name</label>
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
                <label for="">Banner descript</label>
                <input type="text" name="descript" value="{{$banner->descript}}" class="form-control @error('descript') is-invalid @enderror">
                @error('descript')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Banner prioty</label>
                <input type="text" name="prioty" value="{{$banner->prioty}}" class="form-control @error('prioty') is-invalid @enderror">
                @error('prioty')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Banner position</label>
                <select class="form-control" name="position" value="{{$banner->position}}" class="form-control">
                    <option value="0">Top</option>
                    <option value="1">Mid</option>
                    <option value="2">Bottom</option>
                </select>
            </div>
             <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" {{$banner->status == 1 ? 'checked' : ''}} class="custom-control-input" value="1"><span class="custom-control-label">Enable</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="0" {{$banner->status == 0 ? 'checked' : ''}}><span class="custom-control-label">Disable</span>
                </label>
            </div>

    </div>
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="">Banner image</label>
                <input type="file" class="form-control-file  @error('upload') is-invalid @enderror" name="upload" placeholder="" class="">
                @error('upload')
                <small class="text-danger">{{$message}}</small>
                @enderror
                  <div class="mt-5 text-center">
                      <img src="{{url('uploads')}}/{{$banner->image}}" alt="">
                  </div>
            </div>
        </div>  
            <button type="submit" class="btn btn-primary btn-block">update</button>
</div>    
        </form>
@stop()