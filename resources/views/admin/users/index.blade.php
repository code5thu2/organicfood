@extends('layouts.admin')
@section('title','User list')
@section('main')
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white">
        <div class="row pb-2">
            <div class="col-8">
                <a href="{{route('admin.users.create')}}" class="btn btn-outline-primary float-left"><i class="fas fa-plus"></i> ADD NEW</a>
            </div>
        </div>
        <table class="table table-bordered table-hover text-center">
            <thead class=" thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $model)
                <tr>
                    <td scope="row">{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->email}}</td>
                    <td></td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('admin.users.edit',$model->id)}}" class="dropdown-item">Edit user</a>
                                <form action="{{route('admin.users.destroy',$model->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Bạn có chắc chắn muốn xóa user này')">Delete</button>
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
@stop()