
var lignioApp = angular.module("masterDiagnosticTestModule", ['datatables', "ngRoute"]);
lignioApp.run(function($http) {
  $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
});

lignioApp.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "/assets/templates/masterDiagnosticTest/master-diagnostic-test-list.html",
        controller: 'masterDiagnosticTestListController'
    })
    .when("/report-parameters/:id", {
        templateUrl : "/assets/templates/masterDiagnosticTest/test-report-parameters.html",
        controller : "testReportParametersController"
    })
    .when("/preview-test-report/:id", {
        templateUrl : "/assets/masterDiagnosticTestTemplates/preview-test-report.html",
        controller : "parisCtrl"
    });
});

lignioApp.controller("masterDiagnosticTestListController", function($scope, $http, DTOptionsBuilder, DTColumnDefBuilder) {
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

lignioApp.controller('testReportParametersController', function($scope, $http, $routeParams) {
	$http.get(BASEPATH + '/api/MasterDiagnosticTestReportParams/read/' + $routeParams.id).then(function(res) {
		$scope.diagnosticTestReportParams = res.data;
	});
});