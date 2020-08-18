@extends('layouts.admin')
@section('title','Liên hệ')
@section('main')
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white">
        <div class="row pb-2">
            <div class="col-8">
                <a href="{{route('admin.contacts.create')}}" class="btn btn-outline-primary float-left"><i class="fas fa-plus"></i> ADD NEW</a>
            </div>
        </div>
        <table class="table table-bordered table-hover text-center">
            <thead class=" thead-light ">
                <tr>
                    <th>Email</th>
                    <th>Điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contact as $model)
                <tr height="50px">
                    <td>{{$model->email}}</td>
                    <td>{{$model->phone}}</td>
                    <td>{{$model->address}}</td>
                    <td class="{{$model->status == 1 ? 'text-success' : 'text-danger'}}">{{$model->status == 1 ? 'Hiện' : 'Ẩn'}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('admin.contacts.edit',$model->id)}}" class="dropdown-item">Edit contact</a>
                                <form action="{{route('admin.contacts.destroy',$model->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này')">Delete</button>
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