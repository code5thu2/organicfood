@extends('layouts.admin')
@section('title','User add new')
@section('main')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit user</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update',$user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-3 col-lg-2 col-form-label text-right">Name</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-lg-2 col-form-label text-right">Email</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-lg-2 col-form-label text-right">Password</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$user->password}}" autocomplete="email" autofocus>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-lg-2 col-form-label text-right">Confirm password</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$user->password}}" autocomplete="email" autofocus>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register new admin account
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-12 col-form-label text-left">Role</label>
                                </div>
                                <div class="form-group row">
                                    @foreach($roles as $r)
                                    <div class="col-md-6 pb-2" style="">
                                        <input type="checkbox" name="role[]" value="{{$r->id}}" data-toggle="toggle" data-size="xs" data-onstyle="success"> {{$r->name}}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection