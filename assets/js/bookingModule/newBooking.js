var newBookingController = function($scope, $http, $window) {
    $scope.diagnosticTestList = [];
    $scope.booking = {};
    var getDiagnosticTestList = function(diagnosticLabId) {
        var promise = $http({
            url: BASEPATH + 'api/DiagnosticTest',
            method: 'GET'
        });

        promise.then(function (res) {
            $scope.diagnosticTestList = res.data;
        });
    }

    $scope.submitBooking = function () {
        var data = angular.copy($scope.booking);
        var promise = $http({
            url: BASEPATH + 'api/Booking/create',
            method: 'POST',
            data: data
        });

        promise.then(function (res) {
            $window.location.href = "/booking";
        });

        return promise;
    };

    var init = function() {
        getDiagnosticTestList();
    };
    init();
};

var newBookingModule = angular.module("newBookingModule", []);
newBookingModule.controller("newBookingController", newBookingController);