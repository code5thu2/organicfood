@extends('layouts.admin')
@section('title','Role add new')
@section('main')
<div class="row p-3 bg-white">
    <div class="col-12">
        <h4>Role add new</h4>
    </div>
    <div class="col-md-4">
        <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">role name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add</button>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="">role permission</label>
        </div>
    </div>
    </form>
</div>
@stop()