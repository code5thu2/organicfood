@extends('layouts.admin')
@section('title','banner create')
@section('main')

<div class="row justify-content-center">
    <div class="col-md-6  bg-white p-4">
        <div class="text-center">
            <h4>Banner add new</h4>
        </div>
        <form action="{{route('admin.banners.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Banner name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Banner link</label>
                <input type="text" name="link" value="{{old('link')}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Banner descript</label>
                <input type="text" name="descript" value="{{old('descript')}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Banner prioty</label>
                <input type="text" name="prioty" value="{{old('prioty')}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Banner position</label>
                <select class="form-control" name="position" value="{{old('position')}}" class="form-control">
                    <option value="0">Top</option>
                    <option value="1">Mid</option>
                    <option value="2">Bottom</option>
                </select>
            </div>
            <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" checked="" class="custom-control-input" value="1"><span class="custom-control-label">Enable</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="0"><span class="custom-control-label">Disable</span>
                </label>
            </div>
            <div class="form-group">
                <label for="">Banner image</label>
                <input type="file" class="form-control-file  @error('upload') is-invalid @enderror" name="upload" placeholder="">
                @error('upload')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add</button>
        </form>
    </div>
</div>
@stop()