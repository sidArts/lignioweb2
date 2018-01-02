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
        $http.get(BASEPATH + '/api/DiagnosticTest').then(function(res) {
            $scope.diagnosticTestList = res.data;
        });
    };
    var getCategoryList = function() {
        $http.get(BASEPATH + '/api/Category').then(function(res) {
            $scope.categoryList = res.data;
        });
    };
    var init = function () {
        getAllDiagnosticTests();
        // getCategoryList();
    };
    init();

};

var diagnosticTestModule = angular.module("diagnosticTestModule", ['datatables']);
diagnosticTestModule.run(function($http) {
  $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
});
diagnosticTestModule.controller("diagnosticTestController", diagnosticTestController);
