var bookingDetailController = function($scope, $http, $window) {
	$scope.booking = {};
	$scope.pathologists = [];
	$scope.bookingDetail = {};
	var promise = $http({
		url: BASEPATH + '/api/Booking/read/' + $window.booking_id,
		method: 'GET'
	});

	promise.then(function(res) {
		$scope.booking = res.data;
	});

	var getAllPathologists = $http.get(BASEPATH + '/api/user/read_all_pathologists');
	getAllPathologists.then(function(res) {
		$scope.pathologists = res.data;
	});

	$scope.updateBookingDetail = function() {
		var detail = angular.copy($scope.bookingDetail);
		var data = {};
		data['booking_detail_id'] 	= detail.booking_detail_id;
		data['assigned_to'] 		= detail.assigned_to;
		data['status']				= '2';
		var promise = $http.post(BASEPATH + '/api/BookingDetail/update', data);
		promise.then(function() {
			getBookingDetailById(data.booking_detail_id).then(function(res) {
				$scope.booking.bookingDetails[$scope.selectedBookingDetailIndex] = res.data;	
			}); /*
			var pathologist = _.find($scope.pathologists, { 'user_id': detail.assigned_to + '' });
			$scope.booking.bookingDetails[$scope.selectedBookingDetailIndex].assigned_to 		= detail.assigned_to;
			$scope.booking.bookingDetails[$scope.selectedBookingDetailIndex].assignee_firstname = pathologist.firstname;
			$scope.booking.bookingDetails[$scope.selectedBookingDetailIndex].assignee_lastname 	= pathologist.lastname;
			$scope.booking.bookingDetails[$scope.selectedBookingDetailIndex].assignee_phone 	= pathologist.phone;
			$scope.booking.bookingDetails[$scope.selectedBookingDetailIndex].status 			= data.status;*/
		}, function() {
			bootbox.alert('Something went wrong..Please try again!');
		});
	}

	$scope.selectBookingDetail = function(index) {
		$scope.selectedBookingDetailIndex = index;
		$scope.bookingDetail = angular.copy($scope.booking.bookingDetails[index]);
	};

	var getBookingDetailById = function(id) {
		return $http.get(BASEPATH + '/api/BookingDetail/read/' + id);
	}
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
