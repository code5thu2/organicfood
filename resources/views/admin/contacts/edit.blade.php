@extends('layouts.admin')
\@section('title','update')
@section('main')
<div class="row justify-content-center">
    <div class="col-md-6  bg-white p-4">
        <div class="text-center">
            <h4>contact update new</h4>
        </div>
        <form action="{{route('admin.contacts.update',$contact->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$contact->id}}">
            <div class="form-group">
                <label for="">contact name</label>
                <input type="text" name="name" value="{{$contact->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">email</label>
                <input type="email" name="email" value="{{$contact->email}}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">link</label>
                <input type="text" name="link" value="{{$contact->link}}" class="form-control @error('link') is-invalid @enderror">
                @error('link')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">phone</label>
                <input type="tel" name="phone" value="{{$contact->phone}}" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">update</button>
        </form>
    </div>
</div>
@stop()