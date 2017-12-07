
var lignioApp = angular.module("masterDiagnosticTestModule", ['datatables']);
lignioApp.run(function($http) {
  $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
});
lignioApp.controller("masterDiagnosticTestController", function($scope, $http, $window, DTOptionsBuilder, DTColumnDefBuilder) {
	$scope.dtOptions = DTOptionsBuilder.newOptions();

    $scope.dtColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2),
        DTColumnDefBuilder.newColumnDef(3),
        DTColumnDefBuilder.newColumnDef(4),
        DTColumnDefBuilder.newColumnDef(5)
    ];

    $http.get(BASEPATH + '/api/MasterDiagnosticTest').then(function(res) {
        $scope.masterDiagnosticTests = res.data;
    });
});