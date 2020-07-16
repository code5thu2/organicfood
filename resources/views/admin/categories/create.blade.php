@extends('layouts.admin')
@section('title','Category create')
@section('main')
<div class="row justify-content-center bg-white p-4">
    <div class="col-12">
        <h4>Category add new</h4>
    </div>
    <div class="col-md-6">
        <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Category name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Category parent</label>
                <select class="form-control" name="parent_id" value="{{old('parent_id')}}" class="form-control">
                    <option value="0">Parent</option>
                    <?php showCategory($category) ?>
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
                <label for="">Category image</label>
                <input type="file" class="form-control-file  @error('upload') is-invalid @enderror" name="upload" placeholder="">
                @error('upload')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Category meta_title</label>
            <input type="text" name="meta_title" value="{{old('meta_title')}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Category meta_description</label>
            <input type="text" name="meta_description" value="{{old('meta_description')}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Category meta_keyword</label>
            <input type="text" name="meta_keyword" value="{{old('meta_keyword')}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Category prioty</label>
            <input type="text" name="prioty" value="{{old('prioty')}}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Add</button>
        </form>
    </div>
</div>
@stop()
<?php
function showCategory($category, $parent_id = 0, $char = '')
{
    foreach ($category as $key => $item) {
        if ($item->parent_id == $parent_id) {
            echo '<option value="' . $item->id . '">' . $char . $item->name . '</option>';
            unset($category[$key]);
            showCategory($category, $item->id, $char . ' -- ');
        }
    }
}
?>