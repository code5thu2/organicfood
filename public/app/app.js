var app = angular.module('app', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('AppController', function ($scope, $http) {
    $http.get('http://localhost/organicfood/api').then(function (res) {
        $scope.categories = res.data.category;
    });
});