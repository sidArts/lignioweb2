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

    $http.get(BASEPATH + 'api/Booking').then(function(res) {
        $scope.bookings = res.data;
    });

    $scope.remove = function (index) {
        $scope.bookings.splice(index, 1);
    };
};

var bookingModule = angular.module("bookingModule", ['datatables']);
bookingModule.controller("bookingController", bookingController);

