@extends('layouts.admin')
@section('title','Danh sách đơn hàng')
@section('main')
<?php

use Carbon\Carbon; ?>
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white">
        <div class="row pb-2">
            <div class="col-8">
            </div>
            <div class="col-4">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary">Go!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead class=" thead-light text-center">
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Người đặt</th>
                    <th width="30%">Địa chỉ</th>
                    <th width="8%">Phone</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th width="11%">Ngày đặt</th>
                    <th width="4%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $model)
                <?php
                $status = 0;
                $status_name = "";
                $bg = "";
                switch ($model->status) {
                    case 0:
                        $status = 0;
                        $bg = 'table-warning';
                        $status_name = 'Chờ duyệt';
                        break;
                    case 1:
                        $status = 1;
                        $bg = 'table-primary';
                        $status_name = 'Đã xác nhận';
                        break;
                    case 2:
                        $status = 2;
                        $bg = 'table-info';
                        $status_name = 'đang vận chuyển';
                        break;
                    case 3:
                        $status = 3;
                        $bg = 'table-success';
                        $status_name = 'Hoàn thành';
                        break;
                    default:
                        $status = 4;
                        $bg = 'table-danger';
                        $status_name = 'Hủy';
                        continue;
                }
                ?>
                <tr class="{{$bg}} text-dark">
                    <td scope="row">{{$model->id}}</td>
                    <td>{{$model->customer->name}}</td>
                    <td>{{$model->address}}</td>
                    <td>{{$model->phone}}</td>
                    <td class="text-right">{{number_format($model->total)}}đ</td>
                    <td>{{$status_name}}</td>
                    <td class="text-center">{{date('d-m-Y',strtotime($model->created_at))}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('admin.orders.show',$model->id)}}" class="dropdown-item">Chi tiết</a>
                                <form action="{{route('admin.orders.status_update',['id' => $model->id,'status' => $status])}}" method="post">
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
                                @if($status != 3)
                                <form action="{{route('admin.orders.status_update',['id' => $model->id,'status' => 4])}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="dropdown-item">Hủy đơn hàng</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="mt-3 col-12">
                {{$orders->links()}}
            </div>
        </div>
    </div>
</div>
@stop()