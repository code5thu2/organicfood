@extends('layouts.admin')
@section('title','Cập nhật phương thức thanh toán')
@section('main')
<div class="row justify-content-center">
    <div class="col-md-6  bg-white p-4">
        <div class="text-center">
            <h4>payment update</h4>
        </div>
        <form action="{{route('admin.payments.update',$payment->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Tên</label>
                <input type="text" name="name" value="{{$payment->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="1" {{$payment->status == 1 ? 'checked' : ''}}><span class="custom-control-label">Enable</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" class="custom-control-input" value="0" {{$payment->status == 0 ? 'checked' : ''}}><span class="custom-control-label">Disable</span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>
</div>
@stop()