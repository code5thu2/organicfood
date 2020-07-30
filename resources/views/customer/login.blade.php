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
<!-- bắt đầu phần my account -->
<div class="container my-account-page">
    <div class="row">
        <div class="col-md-6 login-box">
            <form action="" method="post">
                @csrf
                <h2>login</h2>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email...">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" aria-describedby="helpId" placeholder="Password...">
                </div>
                <label class="form-check-label">
                    <input type="checkbox" name="" id=""><span> Remember password</span>
                </label>
                <label class="float-right">
                    <a href=""><span>forgot your password?</span></a>
                </label>
                <button type="submit" name="" id="" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
            </form>
        </div>
        <div class="col-md-6 register box">
            <form action="{{route('customer.register')}}" method="post">
                @csrf
                <h2>register</h2>
                <div class="form-group">
                    <input type="text" class="form-control is-invalid " name="name" placeholder="Họ và tên">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Nhập email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu...">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu...">
                    @error('confirm_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <label class="form-check-label w-100">
                    <input type="checkbox" name="" id=""><span> privacy policy agreement?</span>
                </label>
                <button type="submit" name="" id="" class="btn btn-primary btn-lg btn-block">Đăng ký</button>
            </form>
        </div>
    </div>
</div>
<!-- kết thúc phần my account -->
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