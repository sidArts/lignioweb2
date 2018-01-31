
var lignioApp = angular.module("lignioApp", ['datatables', "ngRoute"]);
lignioApp.run(function($http) {
  $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
});

lignioApp.controller("lignioController", function($scope, $http, DTOptionsBuilder, DTColumnDefBuilder) {
	$scope.masterDiagnosticTest = {};
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

    $scope.addNewTestPage = function(){
        var action = '/MasterDiagnosticTests/new';
        $('#pageNavigateForm').attr('action', action);
        $('#pageNavigateForm').submit();
    };

    var getAllCategories = function() {
        $http.get(BASEPATH + '/api/Category').then(function(res) {
            $scope.categories = res.data;
        });    
    };

    $scope.saveMasterDiagnosticTest = function() {
        $http.post(BASEPATH + '/api/MasterDiagnosticTest/create', $scope.masterDiagnosticTest);
    };
    getAllCategories();
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

lignioApp.directive('customInput', function() {
    return {
        restrict: 'E',
        scope: {
            formInputType: "=",
            model: "=",
            listValues: "="
        },
        template: '<span>'+ 
                    '<textarea class="form-control" ng-if="formInputType == 2"></textarea>'+
                    '<input type="text" class="form-control" ng-if="formInputType == 1">' + 
                    '<select ng-if="formInputType == 3" class="form-control">'+
                        '<option>--select--</option>' +
                        '<option ng-repeat="value in listValues" value="{{value}}">{{value}}</option>' +
                    '</select>' + 
                  '</span>',
        controller: function($scope) {
            if(typeof $scope.listValues == 'string')
                $scope.listValues = $scope.listValues.split(',');
        }
    }
});