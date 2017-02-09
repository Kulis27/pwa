angular.module('threadService', [])

    .factory('Thread', function($http) {

        return {
            // get all the comments
            get : function() {
                return $http.get('api/threads');
            },

            // save a comment (pass in comment data)
            save : function(threadData) {
                return $http({
                    method: 'POST',
                    url: '/api/threads',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(threadData)
                });
            },

            // destroy a comment
            destroy : function(id) {
                return $http.delete('/api/threads/' + id);
            }
        }

    });