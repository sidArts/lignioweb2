var userMangementController = function($scope, $http) {
	var getOrganizationList = function() {
		var url = '/api/User';
		var promise = $http.get(url);
		promise.then(function(res) {
			$scope.users = res.data;
		});
	};

	$scope.viewUserDetails = function(index) {
		$scope.userDetails = angular.copy($scope.users[index]);
		$('#userDetailsModal').modal('show');
	}
	getOrganizationList();
}

var userMangementModule = angular.module("userMangementModule", []);
userMangementModule.run(function($http) {
  $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
});
userMangementModule.controller("userMangementController", userMangementController);