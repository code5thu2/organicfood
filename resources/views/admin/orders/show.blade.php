@extends('layouts.admin')
@section('title','Chi tiết đơn hàng')
@section('main')
<div class=" mt-2 card-group">
    <div class="col-12 mb-2">
        <a href="{{route('admin.orders.index')}}" type="button" class="btn btn-outline-primary">Back</a>
    </div>
    <div class="col-md-4 card text-left bg-white mb-2 pt-2">
        <h3 class="m-0">Địa chỉ người nhận:</h3>
        <div class="card-body">
            <h4 class="card-title">{{$order->name}}</h4>
            <p class="card-text">Địa chỉ: {{$order->address}}</p>
            <span>Điện thoại: <strong>{{$order->phone}}</strong></span>
        </div>
    </div>
    <div class="col-md-4 card text-left bg-white mb-2 pt-2">
        <h3 class="m-0">Hình thức giao hàng:</h3>
        <div class="card-body">
            <p>{{$order->shipping->name}}</p>
            <p>Phí vận chuyển: <strong>{{$order->shipping_cost}} đ</strong></p>
        </div>
    </div>
    <div class="col-md-4 card text-left bg-white mb-2 pt-2">
        <h3 class="m-0">Hình thức thanh toán:</h3>
        <div class="card-body">
            <p>{{$order->payment->name}}</p>
        </div>
    </div>
    <div class="col-12 table-responsive p-3 bg-white">
        <table class="table table-hover text-center">
            <thead class=" thead-light ">
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
                        <p>{{$model->product_name}}</p>
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
    <div class="col-8 pull-right bg-white p-2">
        <h5 class="ml-2 p-0">Ghi chú của khách hàng</h5>
        <p class="ml-2">{{$order->note}}</p>
    </div>
    <div class="col-4 pull-right bg-white p-2">
        <table class="table">
            <tbody>
                <tr>
                    <th>Tạm tính:</th>
                    <th class="text-right">{{number_format($order->total)}}đ</th>
                </tr>
                <tr>
                    <th>Phí vận chuyển:</th>
                    <th class="text-right">{{number_format($order->shipping_cost)}}đ</th>
                </tr>
                <tr>
                    <th>Tổng tiền:</th>
                    <th class="text-right">{{number_format($order->total+$order->shipping_cost)}}đ</th>
                </tr>
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
            <button type="submit" class="btn btn-light">Xác nhận đơn</button>
            @elseif($status == 1)
            <button type="submit" class="btn btn-light">Vận chuyển đơn</button>
            @elseif($status == 2)
            <button type="submit" class="btn btn-light">Hoàn thành</button>
            @else($status == 3)
            @endif
            @if(in_array($status,[0,1,2]))
            <button type="submit" class="btn btn-outline-primary ">Hủy đơn hàng</button>
        </form>
        @endif
    </div>
    <div class="col-4 bg-white mt-2 p-2">
        <p>Trạng thái đơn hàng: #{{$order->id}}</p>
        <span class="badge {{$bg}}">{{$status_name}}</span>
    </div>
    <div class="col-4 bg-white mt-2 p-2">

    </div>

</div>
@stop()