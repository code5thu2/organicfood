@extends('layouts.admin')
@section('title','Category list')
@section('main')
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white text-center">
        <div class="row pb-2">
            <div class="col-4">
                <a href="{{route('admin.categories.index')}}" class="btn btn-primary float-left ml-2">BACK TO LIST</a>
            </div>
            <div class="col-8">
                <?php
                $filter = [
                    0 => [
                        'value' => 'id_f',
                        'name' => 'Mã danh mục'
                    ],
                    1 => [
                        'value' => 'name_f',
                        'name' => 'Tên danh mục'
                    ],
                ];
                $status_query = [];
                ?>
                @include('filter_box',['filter' => $filter,'status_query' => $status_query])
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead class=" thead-light">
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Danh mục cha</th>
                    <th>Ngày tạo</th>
                    <th>Ngày xóa</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->parentCat->name}}</td>
                    <td>{{date('d-m-Y',strtotime($model->created_at))}}</td>
                    <td>{{date('d-m-Y',strtotime($model->deleted_at))}}</td>
                    <td>
                        <a href="{{route('admin.categories.restore',$model->id)}}" type="button" class="btn btn-xs btn-rounded btn-secondary"><i class="fas fa-trash-restore"></i> Khôi phục</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="mt-3 col-12">
                {{$category->links()}}
            </div>
        </div>
    </div>
</div>
@stop()