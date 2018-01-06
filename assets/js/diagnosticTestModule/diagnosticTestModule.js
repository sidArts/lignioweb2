/**
 * Created by siddhartha on 14/8/17 at 09:56 PM.
 */
var newDiagnosticTestController = function ($scope, $http, DTOptionsBuilder, DTColumnDefBuilder) {
    var init = function () {
        $http.get(BASEPATH + '/api/MasterDiagnosticTest/read_OrgSpecificMasterDiagnosticTest').then(function(res) {
            $scope.masterDiagnosticTests = res.data;
        });
    };

    /*$scope.dtOptions = DTOptionsBuilder.newOptions();

    $scope.dtColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2),
        DTColumnDefBuilder.newColumnDef(3)
    ];*/

    $scope.addDiagnosticTestToOrg = function(index) {
        $scope.diagnosticTestDetails = angular.copy($scope.masterDiagnosticTests[index]);
        $('#addToListModal').modal('show') 
    };

    $scope.viewDiagnosticTestDetails = function(index) {
        $scope.diagnosticTestDetails = angular.copy($scope.masterDiagnosticTests[index]);
        $('#diagnosticTestDetails').modal('show');
    };

    $scope.saveDetails = function() {
        
    };
    
    init();
};



var newDiagnosticTestModule = angular.module("newDiagnosticTestModule", ['datatables']);
newDiagnosticTestModule.run(function($http) {
  $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
});
newDiagnosticTestModule.controller("newDiagnosticTestController", newDiagnosticTestController);