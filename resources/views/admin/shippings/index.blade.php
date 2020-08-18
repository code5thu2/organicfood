@extends('layouts.admin')
@section('title','Danh sách phương thức giao hàng')
@section('main')
<div class="row p-3 bg-white">
    <div class="col-md-4">
        <div class="text-center">
            <h4>Thêm mới</h4>
        </div>
        <form action="{{route('admin.shippings.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Tên</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Phí vận chuyển</label>
                <input type="text" name="cost" value="{{old('cost')}}" class="form-control @error('cost') is-invalid @enderror">
                @error('cost')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" checked="" class="custom-control-input" value="1"><span class="custom-control-label">Enable</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="0"><span class="custom-control-label">Disable</span>
                </label>
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
                    <th>Phí vận chuyển</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shipping as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->cost}}</td>
                    <td class="{{$model->status == 1 ? 'text-success' : 'text-danger'}}">{{$model->status == 1 ? 'Enable' : 'Disable'}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('admin.shippings.edit',$model->id)}}" class="dropdown-item">Edit shipping</a>
                                <form action="{{route('admin.shippings.destroy',$model->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Bạn có chắc chắn muốn xóa phương thức này')">Delete</button>
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