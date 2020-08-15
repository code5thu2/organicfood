@extends('layouts.app')
@section('main')
<div class="container-fluid sub-banner">
    <img src="{{url('uploads')}}app/images/banner/adli-wahid-nmF_6DxByAw-unsplash.jpg" class="img-fluid" alt="" />
</div>
<div class="container">
    <div class="row">
        <div class="breadcrumb-main">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">home</a></li>
                <li class="breadcrumb-item active">my account</li>
            </ol>
            <h1>my account</h1>
        </div>
    </div>
</div>

<!-- bắt đầu phần forgot-password-page -->
<div class="container forgot-password-page mt-5 mb-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form action="{{route('customer.send_code')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Vui lòng nhập email của bạn để lấy lại mật khẩu</label>
                    <input type="text" class="form-control @error('email') border-danger @enderror" name="email">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">xác nhận</button>
            </form>
        </div>
    </div>
</div>
<!-- kết thúc phần forgot-password-page -->
<!-- bắt đầu phần help box -->
<div class="container help-box mt-4">
    <div class="row align-items-center">
        <div class="col-sm-3 p-0">
            <div class="row align-items-center">
                <div class="col-4 help-icon">
                    <i class="fas fa-shipping-fast"></i>
                </div>
                <div class="col-8 help-content">
                    <h3>free shipping</h3>
                    <p>worldwide</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 p-0">
            <div class="row align-items-center">
                <div class="col-4 help-icon">
                    <i class="fas fa-headphones-alt"></i>
                </div>
                <div class="col-8 help-content">
                    <h3>24x7</h3>
                    <p>customer support</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 p-0">
            <div class="row align-items-center">
                <div class="col-4 help-icon">
                    <i class="fas fa-headphones-alt"></i>
                </div>
                <div class="col-8 help-content">
                    <h3>returns</h3>
                    <p>and exchange</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 p-0">
            <div class="row align-items-center">
                <div class="col-4 help-icon">
                    <i class="fas fa-phone-volume"></i>
                </div>
                <div class="col-8 help-content">
                    <h3>hotline</h3>
                    <p>0969906925</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- kết thúc phần help box -->
@stop()