function Hello($scope, $http) {

    $http.get(api +'/contact/1').
        success(function(data) {
            $scope.greeting = data;
        });
}
