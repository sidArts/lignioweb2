var bookingDetailController = function($scope, $http, $window) {
	$scope.booking = {};
	var promise = $http({
		url: BASEPATH + 'api/Booking/read/' + $window.booking_id,
		method: 'GET'
	});

	promise.then(function(res) {
		$scope.booking = res.data;
	});
};

var dateFilter = function($filter) {
	return function(dateString, format) {
		var d = new Date(dateString);
		return $filter('date')(d,format);
	};
};

var lignioApp = angular.module("bookingDetailModule", []);
lignioApp.filter('dateFilter', dateFilter);
lignioApp.run(function($http) {
  $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
});
lignioApp.controller("bookingDetailController", bookingDetailController);
