@extends('layouts.admin')
@section('title','Danh sách khách hàng')
@section('main')
<?php

use Carbon\Carbon; ?>
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white text-center">
        <div class="row pb-2">
            <div class="col-6">
            </div>
            <div class="col-6">
                <form action="" method="get">
                    <div class="form-group">
                        <div class="input-group">
                            <select class="mr-2" name="status" id="">
                                <option value="0">All</option>
                                <option {{Request::get('status') == 1 ? 'selected' : ''}} value="1">Kích hoạt</option>
                                <option {{Request::get('status') == 2 ? 'selected' : ''}} value="2">Chưa kích hoạt</option>
                                <option {{Request::get('status') == 3 ? 'selected' : ''}} value="3">Bị chặn</option>
                            </select>
                            <input type="text" name="key" placeholder="Nhập tên khách hàng..." class="form-control">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Go!</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-hover">
            <thead class=" thead-light">
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">name</th>
                    <th width="28%">Email</th>
                    <th width="8%">Phone</th>
                    <th width="13%">Trạng thái</th>
                    <th width="4%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $model)
                <?php
                $status_name = 'Chưa kích hoạt';
                $bg = 'text-warning';
                switch ($model->status) {
                    case 1:
                        $status_name = 'Hoạt động';
                        $bg = 'text-success';
                        break;
                    case 2:
                        $status_name = 'Bị chặn';
                        $bg = 'text-danger';
                        break;
                    default:
                        $status_name = 'Chưa kích hoạt';
                        $bg = 'text-warning';
                        break;
                }
                ?>
                <tr class="text-dark">
                    <td scope="row">{{$model->id}}</td>
                    <td class=" text-left">{{$model->name}}</td>
                    <td class=" text-left">{{$model->email}}</td>
                    <td>{{$model->phone}}</td>
                    <td class="{{$bg}}">{{ $status_name}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="" class="dropdown-item">Chi tiết</a>
                                <form action="{{route('admin.customers.customer_update_status',$model->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="{{$model->status}}">
                                    @if($model->status == 1)
                                    <button type="submit" class="dropdown-item">Chặn account</button>
                                    @elseif($model->status == 2)
                                    <button type="submit" class="dropdown-item">Bỏ chặn</button>
                                    @else
                                    @endif
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
                {{$customers->withQueryString()->links()}}
            </div>
        </div>
    </div>
</div>
@stop()