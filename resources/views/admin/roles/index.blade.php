@extends('layouts.admin')
@section('title','Role list')
@section('main')
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white">
        <div class="row pb-2">
            <div class="col-8">
                <a href="{{route('admin.roles.create')}}" class="btn btn-outline-primary float-left"><i class="fas fa-plus"></i> ADD NEW</a>
            </div>
        </div>
        <table class="table table-bordered table-hover text-center">
            <thead class=" thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Permission</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $model)
                <tr>
                    <td scope="row">{{$model->id}}</td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('admin.roles.edit',$model->id)}}" class="dropdown-item">Edit role</a>
                                <form action="{{route('admin.roles.destroy',$model->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Bạn có chắc chắn muốn xóa role này')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="mt-3 col-12">
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>
<input type="checkbox" checked data-toggle="toggle" data-size="xs" data-onstyle="success">
@stop()