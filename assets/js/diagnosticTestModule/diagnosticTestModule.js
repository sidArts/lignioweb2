/**
 * Created by siddhartha on 14/8/17 at 09:56 PM.
 */

var diagnosticLabId = '59744253c9aebe1254fd409b';

var diagnosticTestController = function($scope, $http, $window, DTOptionsBuilder, DTColumnDefBuilder) {
    $scope.diagnosticTestList = [];
    $scope.diagnosticTest = {};
    $scope.categoryList = [];
    $scope.dtOptions = DTOptionsBuilder.newOptions();

    $scope.dtColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2),
        DTColumnDefBuilder.newColumnDef(3),
        DTColumnDefBuilder.newColumnDef(4)
    ];

    $scope.editDiagnosticTest = function (index) {
        $scope.diagnosticTest = angular.copy($scope.diagnosticTestList[index]);
        $scope.diagnosticTest.category = $scope.diagnosticTest.category._id;
        $("#editDiagnosticTestModal").modal('show');
    };

    $scope.updateDiagnosticTest = function () {
        $http.put('/api/diagnosticTest/update', angular.copy($scope.diagnosticTest)).then(function () {
            $("#editDiagnosticTestModal").modal('hide');
            bootbox.alert({
                size: "small",
                title: "Alert",
                message: "Diagnostic Test Information was successfully updated!",
                callback: function () {
                    getAllDiagnosticTests();
                }
            });
        }, function () {
            bootbox.alert('Something went wrong!');
        });
    }

    var getAllDiagnosticTests = function() {
        $http.get('Testinfo/getAll').then(function(res) {
            $scope.diagnosticTestList = res.data;
        });
    };
    var getCategoryList = function() {
        $http.get('diagnosticTest/category/getAll').then(function(res) {
            $scope.categoryList = res.data;
        });
    };
    var init = function () {
        getAllDiagnosticTests();
        // getCategoryList();
    };
    init();

};

var newDiagnosticTestController = function ($scope, $http, $window) {
    $scope.diagnosticTest = {};
    $scope.diagnosticTest.diagnosticLabId = $window.diagnosticLabId;

    $scope.submitNewDiagnosticTest = function () {
        console.log($scope.diagnosticTest);
        $http.post('/api/diagnosticTest/create', angular.copy($scope.diagnosticTest))
            .then(function () {
                $window.location.href = '/diagnosticTests';
            }, function () {
                alert('Something went wrong!');
            });
    };
    var init = function () {
        $http.get('/api/diagnosticTest/category/getAll').then(function(res) {
            $scope.categoryList = res.data;
        });

    };
    init();
};

var diagnosticTestModule = angular.module("diagnosticTestModule", ['datatables']);
diagnosticTestModule.controller("diagnosticTestController", diagnosticTestController);


var newDiagnosticTestModule = angular.module("newDiagnosticTestModule", []);
newDiagnosticTestModule.controller("newDiagnosticTestController", newDiagnosticTestController);