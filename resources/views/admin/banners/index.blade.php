@extends('layouts.admin')
@section('title','Banner')
@section('main')
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white">
        <div class="row pb-2">
            <div class="col-8">
                <a href="{{route('admin.banners.create')}}" class="btn btn-outline-primary float-left"><i class="fas fa-plus"></i> ADD NEW</a>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary">Go!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead class=" thead-light ">
                <tr>
                    <th>#</th>
                    <th>Banner</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banner as $model)
                <tr>
                    <td scope="row">{{$model->id}}</td>
                    <td>
                        <div class="media">
                            <img src="{{url('uploads')}}/{{$model->image}}" alt="" width="50px">
                            <div class="media-body ml-2">
                                <h3>{{$model->name}}</h3><small>{{$model->created_at}}</small>
                            </div>
                    </td>
                    <td class="{{$model->status == 1 ? 'text-success' : 'text-danger'}}">{{$model->status == 1 ? 'Enable' : 'Disable'}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('admin.banners.edit',$model->id)}}" class="dropdown-item">Edit banner</a>
                                <form action="{{route('admin.banners.destroy',$model->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Bạn có chắc chắn muốn xóa banner này')">Delete</button>
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