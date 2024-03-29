@extends('layouts.admin')
@section('title','Role add new')
@section('main')
<form action="{{route('admin.roles.store')}}" method="post" enctype="multipart/form-data">
    <div class="row p-3 bg-white" ng-app="role" ng-controller="roleController">
        <div class="col-12">
            <h4>Role add new</h4>
        </div>
        <div class="col-md-4">
            @csrf
            <div class="form-group">
                <label for="">role name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add</button>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <div class="row">
                    <label for="">role permission</label>
                    <input type="text" class="form-control" ng-model="rname">
                </div>
                <div class="row" style="height: 350px;overflow-y:auto;">
                    <label class="custom-control custom-checkbox w-100">
                        <input type="checkbox" class="custom-control-input" id="check-all"><span class="custom-control-label">Check all</span>
                    </label>
                    <div class="col-xs-6 p-2 w-50" ng-repeat="r in roles |filter:rname">
                        <label>
                            <input type="checkbox" class="role-item" name="route[]" value="@{{r}}">
                            @{{r}}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop()
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.0/angular.min.js"></script>
<script>
    var app = angular.module('role', []);
    app.controller('roleController', function($scope) {
        var roles = '<?php echo json_encode($routes); ?>';
        $scope.roles = angular.fromJson(roles);
    })
    $('#check-all').click(function() {
        $('.role-item').not(this).prop('checked', this.checked);
    })
</script>
@stop()