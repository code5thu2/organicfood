@extends('layouts.admin')
@section('title','Danh sách bình luận')
@section('main')
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white text-center">
        <table class="table table-hover">
            <thead class=" thead-light">
                <tr>
                    <th>#</th>
                    <th>Sản phẩm</th>
                    <th>Người rate</th>
                    <th>Điểm rate</th>
                    <th>Nội dung</th>
                    <th>trạng thái</th>
                    <th>Ngày rate</th>
                    <th width="4%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($rate as $model)
                <tr class="text-dark">
                    <td scope="row">{{$model->id}}</td>
                    <td>{{$model->product->name}}</td>
                    <td>{{$model->customer->name}}</td>
                    <td>{{$model->number}}</td>
                    <td>{{$model->content}}</td>
                    <td class="">
                        <form action="{{route('admin.rating_up',$model->id)}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-xs {{$model->status == 1 ? 'btn-success' : 'btn-danger'}}">{{$model->status == 1 ? 'Hiện' : 'Ẩn'}}</button>
                        </form>
                    </td>
                    <td>{{date('d-m-Y',strtotime($model->created_at))}}</td>
                    <td>
                        <form action="{{route('admin.rating_del',$model->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="mt-3 col-12">
                {{$rate->withQueryString()->links()}}
            </div>
        </div>
    </div>
</div>
@stop()