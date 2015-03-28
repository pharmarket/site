

function FrmController($scope, $http) {
    $scope.errors = [];
    $scope.msgs = [];

    $scope.SignUp = function() {

        $scope.errors.splice(0, $scope.errors.length); // remove all error messages
        $scope.msgs.splice(0, $scope.msgs.length);

        $http.post('post_es.php', {'uname': $scope.username, 'pswd': $scope.userpassword, 'email': $scope.useremail}
        ).success(function(data, status, headers, config) {
            if (data.msg != '')
            {
                $scope.msgs.push(data.msg);
            }
            else
            {
                $scope.errors.push(data.error);
            }
        }).error(function(data, status) { // called asynchronously if an error occurs
// or server returns response with an error status.
            $scope.errors.push(status);
        });
    }
}
