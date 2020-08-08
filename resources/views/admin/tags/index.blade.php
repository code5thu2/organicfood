@extends('layouts.admin')
@section('title','Tag management')
@section('main')
<div class="row p-3 bg-white">
    <div class="col-md-4">
        <div class="text-center">
            <h4>Tag add new</h4>
        </div>
        <form action="{{route('admin.tags.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Tag name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add</button>
        </form>
    </div>
    <div class="col-md-8 text-center">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Ngày tạo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tag as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{date("h:m:s - d/m/Y", strtotime($model->created_at))}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('admin.tags.edit',$model->id)}}" class="dropdown-item">Edit Tag</a>
                                <form action="{{route('admin.tags.destroy',$model->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Bạn có chắc chắn muốn xóa tag này')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop()