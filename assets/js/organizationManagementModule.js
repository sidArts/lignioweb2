var orgMangementController = function($scope, $http) {

	$scope.organization = {};
	var getOrganizationList = function() {
		var url = '/api/organization';
		var promise = $http.get(url);
		promise.then(function(res) {
			$scope.organizations = res.data;
		});
	};

	var getStatusList = function() {
		var url = '/api/Status';
		var promise = $http.get(url);
		promise.then(function(res) {
			$scope.statusList = res.data;
		});
	}

	$scope.setStatus = function(index) {
		$scope.organizationDetails = angular.copy($scope.organizations[index]);
		$scope.organization.status_id = $scope.organizations[index].status_id;
		$scope.organization.id = $scope.organizations[index].id;
		$('#setOrganizationStatusModal').modal('show');
	}

	$scope.saveOrgStatus = function() {
		var promise = $http.post('/api/Organization/update', $scope.organization);
		promise.then(function() { getOrganizationList(); $('#setOrganizationStatusModal').modal('hide'); })
	}
	getOrganizationList();
}

var orgMangementModule = angular.module("orgMangementModule", []);
orgMangementModule.run(function($http) {
  $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
});
orgMangementModule.controller("orgMangementController", orgMangementController);