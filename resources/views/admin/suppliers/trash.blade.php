@extends('layouts.admin')
@section('title','supplier list')
@section('main')
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white text-center">
        <div class="row pb-2">
            <div class="col-4">
                <a href="{{route('admin.suppliers.index')}}" class="btn btn-primary float-left ml-2">BACK TO LIST</a>

            </div>
            <div class="col-8">
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead class=" thead-light">
                <tr>
                    <th>#</th>
                    <th>Tên nhà cung cấp</th>
                    <th>Ngày tạo</th>
                    <th>Ngày xóa</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($supplier as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td class="text-left">
                        <div class="media">
                            <img src="{{url('uploads')}}/{{$model->image}}" alt="" width="50px">
                            <div class="media-body ml-2">
                                <h3>{{$model->name}}</h3><small>{{$model->created_at}}</small>
                            </div>
                    </td>
                    <td>{{date('d-m-Y',strtotime($model->created_at))}}</td>
                    <td>{{date('d-m-Y',strtotime($model->deleted_at))}}</td>
                    <td>
                        <a href="{{route('admin.suppliers.restore',$model->id)}}" type="button" class="btn btn-xs btn-rounded btn-secondary"><i class="fas fa-trash-restore"></i> Khôi phục</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop()