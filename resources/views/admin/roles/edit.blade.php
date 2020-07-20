@extends('layouts.admin')
@section('title','Role add new')
@section('main')
<form action="{{route('admin.roles.update',$role->id)}}" method="post">
    <div class="row p-3 bg-white" ng-app="role" ng-controller="roleController">
        <div class="col-12">
            <h4>Edit role</h4>
        </div>
        <div class="col-md-4">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">role name</label>
                <input type="text" name="name" value="{{$role->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update role</button>
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
                            <input type="checkbox" ng-model="role" ng-checked="set_checked(r)" class="role-item" name="route[]" value="@{{r}}">
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
        var permissions = '<?php echo json_encode($permissions); ?>';
        $scope.roles = angular.fromJson(roles);
        $scope.role = angular.fromJson(permissions);
        $scope.set_checked = function(r) {
            console.log(r);
            for (var i = 0; i < $scope.role.length; i++) {
                if ($scope.role[i] == r) {
                    return true;
                }

            }
            return false;
        }
    })
    $('#check-all').click(function() {
        $('.role-item').not(this).prop('checked', this.checked);
    })
</script>
@stop()