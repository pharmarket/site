/*function Hello($scope, $http) {

/*    $http.get(api +'/contact/1').
        success(function(data) {
            $scope.greeting = data;
        });

        $http.get('https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA').
            success(function(data) {
                $scope.greeting = data;
            });


}
*/

var app = angular.module('myApp', []);

app.controller('customersCtrl', function($scope, $http) {

  $http.get("http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=U2&api_key=2b35547bd5675d8ecb2b911ee9901f59&format=json")
  .success(function (font) {$scope.test = font.artist;});

  $http.get("http://www.w3schools.com/angular/customers.php")
  .success(function (response) {$scope.names = response.records;});

});
