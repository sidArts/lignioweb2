var newBookingController = function($scope, $http, $window) {
    $scope.diagnosticTestList = [];
    $scope.booking = {};
    $scope.booking.checkedDiagnosticTestIds = [];
    
    $scope.checkedDiagnosticTests = {};
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
            // $window.location.href = BASEPATH + "booking";
            console.log('done booking');
        });

        return promise;
    };

    $scope.selectDiagnosticTest = function() {
        $scope.booking.checkedDiagnosticTestIds = [];
        angular.forEach($scope.checkedDiagnosticTests, function(value, key){
            if(value)
                $scope.booking.checkedDiagnosticTestIds.push(key);
        });
        $('#add-diagnostic-test-modal').modal('hide');
    };

    var init = function() {
        getDiagnosticTestList();
    };
    init();
};

var diagnosticTestViewDirective = function(DTOptionsBuilder, DTColumnDefBuilder) {
    return {
        restrict: 'E',
        templateUrl: BASEPATH + 'assets/templates/diagnostic-test-view.html',
        scope: {
            diagnosticTestList: '=',
            checkedTests: '='
        },
        controller: function($scope) {
            $scope.dtOptions = DTOptionsBuilder.newOptions();

            $scope.dtColumnDefs = [
                DTColumnDefBuilder.newColumnDef(0),
                DTColumnDefBuilder.newColumnDef(1),
                DTColumnDefBuilder.newColumnDef(2),
                DTColumnDefBuilder.newColumnDef(3),
                DTColumnDefBuilder.newColumnDef(4)
            ];
        }
    }
};

var newBookingModule = angular.module("newBookingModule", ['datatables']);
newBookingModule.run(function($http) {
  $http.defaults.headers.common['Authorization'] = document.getElementById('Authorization').value;
  $http.defaults.headers.common['Content-Type']  = 'application/json';
});
newBookingModule.controller("newBookingController", newBookingController);
newBookingModule.directive('diagnosticTestView', diagnosticTestViewDirective);