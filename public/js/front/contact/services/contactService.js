angular.module('contactService', [])

.factory('contact', function($http) {

    return {

        // get all the comments

        get : function() {
            return $http.get('/api/contact');
        },

        // save a contactData (pass in comment data)

        save : function(contactData) {
            return $http({
                method: 'POST',
                url: '/api/contact',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(contactData)
            });
        },

        // destroy a comment

        destroy : function(id) {
            return $http.delete('/api/contact/' + id);
        }
    }

});
