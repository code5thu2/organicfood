@extends('layouts.admin')
@section('title','Danh sách phản hồi')
@section('main')
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white text-center">
        <table class="table table-hover">
            <thead class=" thead-light">
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Nội dung</th>
                    <th>trạng thái</th>
                    <th>Ngày gửi</th>
                    <th width="4%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedback as $model)
                <tr class="text-dark {{$model->status == 0 ? 'table-info' : ''}}">
                    <td scope="row">{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->email}}</td>
                    <td>{{$model->phone}}</td>
                    <td class="text-left">{{$model->content}}</td>
                    <td>{{$model->status == 0 ? 'Chưa đọc' : 'Đã đọc'}}</td>
                    <td>{{date('d-m-Y',strtotime($model->created_at))}}</td>
                    <td class="">
                        <div class="dropdown">
                            <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('admin.reply_feedback',$model->id)}}" class="dropdown-item">Trả lời</a>
                                <form action="" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item">Xóa</button>
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
                {{$feedback->withQueryString()->links()}}
            </div>
        </div>
    </div>
</div>
@stop()