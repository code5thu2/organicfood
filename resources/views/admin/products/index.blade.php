@extends('layouts.admin')
@section('title','Product list')
@section('main')
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white">
        <div class="row pb-2">
            <div class="col-md-4">
                <a href="{{route('admin.products.create')}}" class="btn btn-outline-primary float-left"><i class="fas fa-plus"></i> ADD NEW</a>
                <a href="{{route('admin.products.trash')}}" class="btn btn-warning float-left ml-2"><i class="fas fa-trash"></i> Thùng rác</a>
            </div>
            <div class="col-md-8">
                <?php
                $filter = [
                    0 => [
                        'value' => 'id_f',
                        'name' => 'Mã sản phẩm'
                    ],
                    1 => [
                        'value' => 'name_f',
                        'name' => 'Tên sản phẩm'
                    ],
                ];
                $status_query = [
                    1 => 'Ẩn',
                    2 => 'Hết hàng',
                    3 => 'Còn hàng',
                    4 => 'New',
                    5 => 'Hot',
                    6 => 'Sale'
                ];
                ?>
                @include('filter_box',['filter' => $filter,'status_query' => $status_query])
            </div>
        </div>
        <table class="table table-bordered table-hover text-center">
            <thead class=" thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Giá</th>
                    <th>Danh mục</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $model)
                <tr>
                    <td scope="row">{{$model->id}}</td>
                    <td>
                        <div class="media text-left">
                            <div style="width: 100px;">
                                <img src="{{url('uploads')}}/{{$model->image}}" class="img-fluid" alt="">
                            </div>
                            <div class="media-body ml-2">
                                <h3>{{$model->name}}</h3><small>{{$model->created_at}}</small>
                            </div>
                    </td>
                    <td>đ {{$model->sale > 0 ? number_format($model->sale):number_format($model->price)}}</td>
                    <td>{{$model->cat ? $model->cat->name : 'Không rõ'}}</td>
                    <td>
                        <div class="form-group">
                            <select class="form-control" style="background-color: #fff;border:0;" disabled>
                                <option value="0" {{$model->status == 0 ? 'selected' : ''}}>Ẩn</option>
                                <option value="1" {{$model->status == 1 ? 'selected' : ''}}>Hết hàng</option>
                                <option value="2" {{$model->status == 2 ? 'selected' : ''}}>Còn hàng</option>
                                <option value="3" {{$model->status == 3 ? 'selected' : ''}}>New</option>
                                <option value="4" {{$model->status == 4 ? 'selected' : ''}}>Sale</option>
                                <option value="5" {{$model->status == 5 ? 'selected' : ''}}>Hot</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('admin.products.show',$model->id)}}" class="dropdown-item">Chi tiết</a>
                                <a href="{{route('admin.products.edit',$model->id)}}" class="dropdown-item">Edit product</a>
                                <form action="{{route('admin.products.destroy',$model->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-end mt-2">
            <div class="mt-3 col-12">
                {{$product->withQueryString()->links()}}
            </div>
        </div>
    </div>
</div>
@stop()