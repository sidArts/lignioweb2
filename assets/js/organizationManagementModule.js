var orgMangementController = function($scope, $http) {
	var getOrganizationList = function() {
		var url = '/api/organization';
		var promise = $http.get(url);
		promise.then(function(res) {
			$scope.organizations = res.data;
		});
	};

	$scope.viewOrganizationDetails = function(index) {
		$scope.organizationDetails = angular.copy($scope.organizations[index]);
		$('#organizationDetailsModal').modal('show');
	}
	getOrganizationList();
}

var orgMangementModule = angular.module("orgMangementModule", []);
orgMangementModule.run(function($http) {
  $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
});
orgMangementModule.controller("orgMangementController", orgMangementController);