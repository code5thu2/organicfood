@extends('layouts.admin')
@section('title','Category edit')
@section('main')
<div class="row justify-content-center bg-white p-4">
    <div class="col-12">
        <h4>Category add new</h4>
    </div>
    <div class="col-md-6 bg-white p-4">
        <form action="{{route('admin.categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$category->id}}">
            <div class="form-group">
                <label for="">Category name</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Category parent</label>
                <select class="form-control" name="parent_id" value="">
                    <option value="{{$category->parent_id}}">{{$category->parent_id == 0 ? 'Parent' : $category->parentCat->name}}</option>
                    <option value="0">Parent</option>
                    <?php showCategory($parent) ?>
                </select>
            </div>
            <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="1" {{$category->status == 1 ? 'checked' : ''}}><span class="custom-control-label">Enable</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="0" {{$category->status == 0 ? 'checked' : ''}}><span class="custom-control-label">Disable</span>
                </label>
            </div>
            <div class="form-group">
                <label for="">Category image</label>
                @include('image_box',['image' => $category->image])
            </div>
    </div>
    <div class="col-md-6 bg-white p-4">
        <div class="form-group">
            <label for="">Category meta_title</label>
            <input type="text" name="meta_title" value="{{$category->title}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Category meta_description</label>
            <input type="text" name="meta_description" value="{{$category->meta_description}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Category meta_keyword</label>
            <input type="text" name="meta_keyword" value="{{$category->meta_keyword}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Vị trí</label>
            <select class="form-control" name="prioty">
                <option value="">--- --- ---</option>
                <option {{$category->prioty == 1 ? 'selected' : ''}} value="1">Thanh menu chính</option>
                <option {{$category->prioty == 2 ? 'selected' : ''}} value="2">Slide trang home</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>
</div>
@stop()
<?php
function showCategory($parent, $parent_id = 0, $char = '')
{
    foreach ($parent as $key => $item) {
        if ($item->parent_id == $parent_id) {
            echo '<option value="' . $item->id . '">' . $char . $item->name . '</option>';
            unset($parent[$key]);
            showCategory($parent, $item->id, $char . ' -- ');
        }
    }
}
?>