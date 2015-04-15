var app = angular.module('myApp', []);

app.controller('customersCtrl', function($scope, $http) {
$http.get('http://localhost/laravel/site/public/index.php/ws/contact', {
    headers: {'key': 'dragonteam'}
}).success(function (rep) {$scope.contact = rep; });

});
