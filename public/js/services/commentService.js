angular.module('commentService', [])

	.factory('Comment', function($http) {

		return {
			get : function() {
				return $http.get('__DIR__.’/../api/comments');
			},
			show : function(id) {
				return $http.get('__DIR__.’/../api/comments/' + id);
			},
			save : function(commentData) {
				return $http({
					method: 'POST',
					url: '__DIR__.’/../api/comments',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(commentData)
				});
			},
			destroy : function(id) {
				return $http.delete('__DIR__.’/../api/comments/' + id);
			}
		}

	});