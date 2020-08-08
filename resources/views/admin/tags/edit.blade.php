@extends('layouts.admin')
@section('title','Tag management edit')
@section('main')
<div class="row justify-content-center">
    <div class="col-md-6  bg-white p-4">
        <div class="text-center">
            <h4>Tag update</h4>
        </div>
        <form action="{{route('admin.tags.update',$tag->id)}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$tag->id}}">
            <div class="form-group">
                <label for="">Tag name</label>
                <input type="text" name="name" value="{{$tag->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>
</div>
@stop()