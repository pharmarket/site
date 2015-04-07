angular.module('mainCtrl', [])

// inject the Contact service into our controller
.controller('mainController', function($scope, $http, Contact) {
    // object to hold all the data for the new Contact form
    $scope.contactData = {};

    // loading variable to show the spinning loading icon
    $scope.loading = true;

    // get all thecontacts first and bind it to the $scope.contacts object
    // use the function we created in our service
    // GET ALLcontacts ==============
    Contact.get()
        .success(function(data) {
            $scope.contacts = data;
            $scope.loading = false;
        });

    // function to handle submitting the form
    // SAVE A Contact ================
    $scope.submitContact = function() {
        $scope.loading = true;

        // save the Contact. pass in Contact data from the form
        // use the function we created in our service
        Contact.save($scope.ContactData)
            .success(function(data) {

                // if successful, we'll need to refresh the Contact list
                Contact.get()
                    .success(function(getData) {
                        $scope.contacts = getData;
                        $scope.loading = false;
                    });

            })
            .error(function(data) {
                console.log(data);
            });
    };

    // function to handle deleting a Contact
    // DELETE A Contact ====================================================
    $scope.deleteContact = function(id) {
        $scope.loading = true;

        // use the function we created in our service
        Contact.destroy(id)
            .success(function(data) {

                // if successful, we'll need to refresh the Contact list
                Contact.get()
                    .success(function(getData) {
                        $scope.contacts = getData;
                        $scope.loading = false;
                    });

            });
    };

});
