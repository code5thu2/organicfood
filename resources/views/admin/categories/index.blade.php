@extends('layouts.admin')
@section('title','Category list')
@section('main')
<div class="row justify-content-center">
    <div class="col-md-12 bg-white p-3">
        <table class="table table-bordered table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $model)
                <tr>
                    <td scope="row">{{$model->id}}</td>
                    <td width="100px"><img src="{{url('public/upload')}}/{{$model->image}}" alt="" class="img-fluid"></td>
                    <td>{{$model->name}}</td>
                    <td class="{{$model->status == 1 ? 'text-success' : 'text-danger'}}">{{$model->status == 1 ? 'Enable' : 'Disable'}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('categories.edit',$model->id)}}" class="dropdown-item">Edit category</a>
                                <form action="{{route('categories.destroy',$model->id)}}" method="post">
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
        <div class="row justify-content-center">
            <div class="mt-3 col-6">
                {{$category->links()}}
            </div>
        </div>
    </div>
</div>
@stop()