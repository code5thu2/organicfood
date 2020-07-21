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
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-3 col-lg-2 col-form-label text-right">Name</label>
                                    <div class="col-9 col-lg-10">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}">
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
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-lg-4 col-form-label text-left">Password</label>
                                    <div class="col-md-8 col-lg-8">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-lg-4 col-form-label text-left">Confirm password</label>
                                    <div class="col-md-8 col-lg-8">
                                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password">
                                        @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Update
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
                                    <?php $checked = in_array($r->name, $role_assignment) ? 'checked' : ''; ?>
                                    <div class="col-md-6 pb-2" style="">
                                        <input type="checkbox" {{$checked}} name="role[]" value="{{$r->id}}" data-toggle="toggle" data-size="xs" data-onstyle="success"> {{$r->name}}
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