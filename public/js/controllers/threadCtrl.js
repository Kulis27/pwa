angular.module('threadCtrl', [])

	.controller('threadController', function($scope, $http, Thread, $location) {
		// object to hold all the data for the new comment form
		$scope.threadData = {};

		    //get id from route
    	var url = $location.absUrl().split('?')[0]
		$scope.commentData.thread_id = url;

		// loading variable to show the spinning loading icon
		$scope.loading = true;
		
		// get all the comments first and bind it to the $scope.comments object
		Thread.get()
			.success(function(data) {
				$scope.threads = data;
				$scope.loading = false;
			});


		// function to handle submitting the form
		$scope.submitThread = function() {
			$scope.loading = true;

			// save the comment. pass in comment data from the form
			Thread.save($scope.threadData)
				.success(function(data) {
					$scope.threadData = {};
					// if successful, we'll need to refresh the comment list
					Thread.get()
						.success(function(getData) {
							$scope.threads = getData;
							$scope.loading = false;
						});

				})
				.error(function(data) {
					console.log(data);
				});
		};

		// function to handle deleting a comment
		$scope.deleteThread = function(id) {
			$scope.loading = true; 

			Thread.destroy(id)
				.success(function(data) {

					// if successful, we'll need to refresh the comment list
					Thread.get()
						.success(function(getData) {
							$scope.threads = getData;
							$scope.loading = false;
						});

				});
		};

	});