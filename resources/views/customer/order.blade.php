@extends('layouts.app')
@section('title','Danh sách đơn hàng')
@section('meta')
<meta name="description" content="Danh sách đơn hàng">
<meta name="keywords" content="order">
@stop()
@section('main')
<?php
$br_item = 'Danh sách đơn hàng';
?>
@include('page.breadcrumb',['br_item' => $br_item,'data' =>''])
<div class="container wishlist-page">
    <div class="row justify-content-md-center">
        <div class="col-md-10 offset-md-2 table-responsive text-center">
            <table class="table table-hover table-responsive">
                <thead class="w-100">
                    <tr>
                        <th class="product">Mã đơn hàng</th>
                        <th class="name">Tổng tiền</th>
                        <th class="name">Phí ship</th>
                        <th class="price">Trạng thái</th>
                        <th class="total">ngày đặt</th>
                        <th class="cancle"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(Auth::guard('cus')->user()->orders)
                    @foreach(Auth::guard('cus')->user()->orders as $model)
                    <?php
                    $status = 0;
                    $status_name = "";
                    $bg = "";
                    switch ($model->status) {
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
                            break;
                    }
                    ?>
                    <tr class="shadow">
                        <td>#{{$model->id}}</td>
                        <td>{{number_format($model->total)}} đ</td>
                        <td>{{number_format($model->shipping_cost)}} đ</td>
                        <td><span class="badge {{$bg}}">{{$status_name}}</span></td>
                        <td>{{date('d-m-Y',strtotime($model->created_at))}}</td>
                        <td>
                            @if($model->status == 0)
                            <a href="{{route('customer.order_cancle',$model->id)}}">Hủy</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@include('page.help_box')
@stop()