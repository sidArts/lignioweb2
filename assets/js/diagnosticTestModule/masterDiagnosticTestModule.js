
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
	
    var getAllTestReportParams = function() {
        $http.get(BASEPATH + '/api/MasterDiagnosticTestReportParams/read/' + $routeParams.id).then(function(res) {
            $scope.diagnosticTestReportParams = res.data;
        });
    };
    var getAllMeasurementUnits = function() {
        $http.get(BASEPATH + '/api/MeasurementUnits').then(function(res) {
            $scope.measurementUnits = res.data;
        });    
    };    

    $scope.diagnosticTestReportParam = {};
    $scope.saveDiagnosticTestParam = function() {
        var data = angular.copy($scope.diagnosticTestReportParam);
        data.diagnostic_test_id = $routeParams.id;
        var promise = $http.post(BASEPATH + '/api/MasterDiagnosticTestReportParams/create', data);
        promise.then(function() {
            getAllTestReportParams();
        });
    };

    getAllTestReportParams();
    getAllMeasurementUnits();
});