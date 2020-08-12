@extends('layouts.admin')
@section('title','Chi tiết đơn hàng')
@section('main')
<div class="row mt-2">
    <div class="col-12 mb-2">
        <a href="{{route('admin.orders.index')}}" type="button" class="btn btn-outline-primary">Back</a>
    </div>
    <div class="col-md-4">
        <h5>Địa chỉ người nhận</h5>
        <div class="card text-left bg-white">
            <div class="card-body">
                <h4 class="card-title">{{$order->name}}</h4>
                <p class="card-text">Địa chỉ: {{$order->address}}</p>
                <span>Điện thoại: <strong>{{$order->phone}}</strong></span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <h5>Hình thức giao hàng - thanh toán</h5>
        <div class="card text-left bg-white">
            <div class="card-body">
                <p>{{$order->payment->name}}</p>
                <p>Phí vận chuyển: <strong> đ</strong></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <h5>Ghi chú của khách hàng</h5>
        <div class="card text-left bg-white">
            <div class="card-body">
                <p class="card-text">{{$order->note}}</p>
            </div>
        </div>
    </div>
    <div class="col-12 table-responsive p-3 bg-white">
        <table class="table table-hover">
            <thead class=" thead-light text-center">
                <tr>
                    <th>#</th>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tạm tính</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 1; ?>
                @foreach($order->orderDetail as $model)
                <tr>
                    <td>{{$stt}}</td>
                    <td>
                        <div class="media">
                            <a class="d-flex" href="#">
                                <img src="{{url('uploads')}}/{{$model->product->image}}" style="width: 70px;" class="img-fluid" alt="">
                            </a>
                            <div class="media-body ml-2">
                                <p>{{$model->product->name}}</p>
                                <p>Cung cấp bởi: {{$model->product->sup->name}}</p>
                            </div>
                        </div>
                    </td>
                    <td>{{number_format($model->price)}}đ</td>
                    <td>{{$model->quantity}}</td>
                    <td>{{number_format($model->quantity*$model->price)}} đ</td>
                </tr>
                <?php $stt++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-4 bg-white mt-2 p-2">
        <?php
        $status = 0;
        $status_name = "";
        $bg = "";
        switch ($order->status) {
            case 0:
                $status = 0;
                $bg = 'badge-warning';
                $status_name = 'Chờ duyệt';
                break;
            case 1:
                $status = 1;
                $bg = 'badge-primary';
                $status_name = 'Đã xác nhận';
                break;
            case 2:
                $status = 2;
                $bg = 'badge-info';
                $status_name = 'đang vận chuyển';
                break;
            case 3:
                $status = 3;
                $bg = 'badge-success';
                $status_name = 'Hoàn thành';
                break;
            default:
                $status = 4;
                $bg = 'badge-danger';
                $status_name = 'Hủy';
                continue;
        }
        ?>
        <form action="{{route('admin.orders.status_update',['id' => $order->id,'status' => $status])}}" method="post">
            @csrf
            @method('PUT')
            @if($status == 0)
            <button type="submit" class="dropdown-item">Xác nhận đơn hàng</button>
            @elseif($status == 1)
            <button type="submit" class="dropdown-item">Vận chuyển đơn</button>
            @elseif($status == 2)
            <button type="submit" class="dropdown-item">Hoàn thành</button>
            @else($status == 3)
            @endif
        </form>
        @if(in_array($status_name,[3,4]))
        <form action="{{route('admin.orders.status_update',['id' => $order->id,'status' => 4])}}" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="dropdown-item">Hủy đơn hàng</button>
        </form>
        @endif
    </div>
    <div class="col-4 bg-white mt-2 p-2">
        <p>Trạng thái đơn hàng: #{{$order->id}}</p>
        <span class="badge {{$bg}}">{{$status_name}}</span>
    </div>
    <div class="col-4 bg-white mt-2 p-2">
        <table class="table">
            <tbody>
                <tr>
                    <th>Tạm tính:</th>
                    <th>{{number_format($order->total)}}đ</th>
                </tr>
                <tr>
                    <th>Phí vận chuyển:</th>
                    <th></th>
                </tr>
                <tr>
                    <th>Tổng tiền:</th>
                    <th>{{number_format($order->total)}}đ</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop()