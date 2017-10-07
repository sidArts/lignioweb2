/**
 * Created by siddhartha on 14/8/17 at 09:56 PM.
 */

var diagnosticLabId = '59744253c9aebe1254fd409b';
var newDiagnosticTestController = function ($scope, $http, $window) {
    $scope.diagnosticTest = {};
    $scope.diagnosticTest.diagnosticLabId = $window.diagnosticLabId;

    $scope.submitNewDiagnosticTest = function () {
        console.log($scope.diagnosticTest);
        $http.post(BASEPATH + 'api/DiagnosticTest/create', angular.copy($scope.diagnosticTest))
            .then(function () {
                $window.location.href = '/diagnosticTests';
            }, function () {
                alert('Something went wrong!');
            });
    };
    var init = function () {
        $http.get('/api/DiagnosticTest/category/getAll').then(function(res) {
            $scope.categoryList = res.data;
        });

    };
    init();
};



var newDiagnosticTestModule = angular.module("newDiagnosticTestModule", []);
newDiagnosticTestModule.controller("newDiagnosticTestController", newDiagnosticTestController);