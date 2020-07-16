@extends('layouts.admin')
@section('title','unit management edit')
@section('main')
<div class="row justify-content-center">
    <div class="col-md-6  bg-white p-4">
        <div class="text-center">
            <h4>Unit update</h4>
        </div>
        <form action="{{route('admin.units.update',$unit->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$unit->id}}">
            <div class="form-group">
                <label for="">Unit name</label>
                <input type="text" name="name" value="{{$unit->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>
</div>
@stop()