/**
 * Created by siddhartha on 6/8/17 at 05:59 PM.
 */



var bookingController = function($scope, $http, $window, DTOptionsBuilder, DTColumnDefBuilder) {
    var diagnosticLabId = $window.diagnosticLabId;
    $scope.persons = [];
    $scope.dtOptions = DTOptionsBuilder.newOptions();

    $scope.dtColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2),
        DTColumnDefBuilder.newColumnDef(3),
        DTColumnDefBuilder.newColumnDef(4),
        DTColumnDefBuilder.newColumnDef(5),
        DTColumnDefBuilder.newColumnDef(6)
    ];

    $http.get(BASEPATH + '/api/Booking').then(function(res) {
        $scope.bookings = res.data;
    });

    $scope.remove = function (index) {
        $scope.bookings.splice(index, 1);
    };

    $scope.showBookingDetails = function(booking_id) {
        /*$scope.bookingDetails = angular.copy($scope.bookings[index].bookingDetails);
        $('#booking-details-modal').modal('show');*/
        document.getElementById('pageNavigateForm').setAttribute('action', BASEPATH + '/Booking/details/' + booking_id);
        document.getElementById('pageNavigateForm').submit();
    }
};

var lignioApp = angular.module("bookingModule", ['datatables']);
lignioApp.run(function($http) {
  $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
});
lignioApp.controller("bookingController", bookingController);

