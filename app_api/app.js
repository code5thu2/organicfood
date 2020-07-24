var app = angular.module('app', []);
app.controller('AppController', function ($scope, $http) {
    $http.get('http://localhost/organicfood/api/categories').then(function (res) {
        console.log(res.data);
    });
});