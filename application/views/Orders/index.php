<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div ng-app="lignioApp" ng-controller="lignioAppController" class="page-content" style="min-height: 1001px;">
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <h1 class="page-title"> <?php print $userDetails['org_name']; ?></h1>
            <!--<small>statistics, charts, recent events and reports</small>-->
        </h1>
        <!-- END PAGE TITLE-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?= base_url() ?>">Home</a>
                    <i class="fa fa-arrow-right"></i>
                </li>
                <li>
                    <span>Orders</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="form-group">
                    <label>Sort by</label>
                    <select ng-model="filter" class="form-control">
                        <option value="created_at">Created Date</option>
                    </select>
                </div>              
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Test Name</th>
                            <th>Full Name</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Last Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="value in diagnosticTestList | orderBy : '-' + filter">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ value.diagnostic_test }}</td>
                            <td>{{ value.fullname }}</td>
                            <td>{{ value.status_name }}</td>
                            <td>{{ value.created_at | date : 'MMM d, y h:mm a' }}</td>
                            <td>{{ value.updated_at | date : 'MMM d, y h:mm a' }}</td>
                            <td>
                                
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Settings 
                                        <i class="fa fa-cogs"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li ng-if="value.status_id == 1">
                                            <a ng-click="openModalForSampleCollectionInit($index)" href="javascript:void(0);">
                                                Initiate Sample Collection
                                            </a>
                                        </li>
                                        <li  ng-if="value.status_id == 2">
                                            <a ng-click="openModalForSampleCollectionComplete($index)" href="javascript:void(0);">
                                                Complete Sample Collection
                                            </a>
                                        </li>
                                        <li  ng-if="value.status_id == 3">
                                            <a ng-click="openModalForLabAnalysis($index)" href="javascript:void(0);">
                                                Start Lab Analysis
                                            </a>
                                        </li>
                                        <li  ng-if="value.status_id == 4">
                                            <a ng-click="openModalForLabAnalysisComplete($index)" href="javascript:void(0);">
                                                Lab Analysis Status
                                            </a>
                                        </li>
                                        <li  ng-if="value.status_id == 5">
                                            <a ng-click="openModalForTestResultEntry($index)" href="javascript:void(0);">Test Results Entry</a>
                                        </li>
                                        <li  ng-if="value.status_id == 6">
                                            <a data-toggle="modal" href="javascript:void(0);" data-target="#reportApproval">Report Approval</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="initSampleCollectionModal" class="modal fade">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Initiate Sample Collection</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Assign To</label>
                            <select class="form-control" ng-model="updateSampleCollection.assigned_to">
                                <option value="">--Select Sample Collector--</option>
                                <option value="{{user.id}}" ng-repeat="user in users">{{user.firstname + ' ' + user.lastname}}</option>
                            </select>                            
                        </div>
                        <button class="btn btn-primary" ng-click="initiateSampleCollection()">Update</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="completeSampleCollectionModal" class="modal fade">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Initiate Sample Collection</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" ng-model="updateSampleCollection.status_id">
                                <option value="">--Select Status--</option>
                                <option value="7">Approve</option>
                                <option value="8">Reject</option>
                            </select>                            
                        </div>
                        <button class="btn btn-primary" ng-click="completeSampleCollection()">Update</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="initiateLabAnalysisModal" class="modal fade">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Initiate Lab Analysis</h4>
                    </div>
                    <div class="modal-body">
                         <div class="form-group">
                            <label>Assign To</label>
                            <select class="form-control" ng-model="updateSampleCollection.assigned_to">
                                <option value="">--Select Lab Analyst--</option>
                                <option value="{{user.id}}" ng-repeat="user in users">{{user.firstname + ' ' + user.lastname}}</option>
                            </select>                            
                        </div>
                        <button class="btn btn-primary" ng-click="initiateLabAnalysis()">Update</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="labAnalysisStatusModal" class="modal fade">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Lab Analysis Status</h4>
                    </div>
                    <div class="modal-body">
                         <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" ng-model="updateSampleCollection.status_id">
                                <option value="">--Select Status--</option>
                                <option value="7">Approve</option>
                                <option value="8">Reject</option>
                            </select>                            
                        </div>
                        <button class="btn btn-primary" ng-click="completeLabAnalysis()">Update</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="testResultsEntry" class="modal fade">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Test Results Entry</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Value</th>
                                    <th>Unit</th>
                                    <th>Healthy Range</th>
                                    <th>Threatning?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="param in diagnosticTestParams">
                                    <td>{{$index + 1}}</td>
                                    <td>{{param.name}}</td>
                                    <td>
                                        <input type="text" ng-model="param.value" class="form-control">
                                    </td>
                                    <td>{{param.unit_short_form}}</td>
                                    <td>{{param.healthy_range}}</td>
                                    <td><input type="checkbox" ng-model="param.is_alarming" ng-true-value="'1'" ng-false-value="'0'"></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" ng-click="saveAnalysisResult()">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="reportApproval" class="modal fade">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Test Report Approval</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" ng-repeat="testParam in diagnosticTestParams">
                            <label>{{ testParam.name }}</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php print $js; ?>


<script type="text/javascript">

angular.module('lignioApp', [])
.run(function($http) {
    $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
})
.controller('lignioAppController', function($scope, $http) {
    $scope.filter = 'created_at';
    $scope.diagnosticTestParams = [];
    $scope.users = [];

    $scope.selectedBookingDetail = {};

    $scope.updateSampleCollection = {};
    $scope.labAnalysisDetails = {};
    $scope.testResultsEntry = {};
    $scope.reportApproval = {};

    $scope.openModalForSampleCollectionInit = function(index) {
        $scope.updateSampleCollection = {
            'booking_detail_id': $scope.diagnosticTestList[index].id
        };
        $scope.selectedIndex = index;
        $('#initSampleCollectionModal').modal('show');
    };

    $scope.openModalForSampleCollectionComplete = function(index) {
        $scope.updateSampleCollection = {
            'booking_detail_id': $scope.diagnosticTestList[index].id
        };
        $scope.selectedIndex = index;
        $('#completeSampleCollectionModal').modal('show');
    };

    $scope.openModalForLabAnalysis = function(index) {
        $scope.updateSampleCollection = {
            'booking_detail_id': $scope.diagnosticTestList[index].id
        };
        $scope.selectedIndex = index;
        $('#initiateLabAnalysisModal').modal('show');
    };

    $scope.openModalForLabAnalysisComplete = function(index) {
        $scope.updateSampleCollection = {
            'booking_detail_id': $scope.diagnosticTestList[index].id
        };
        $scope.selectedIndex = index;
        $('#labAnalysisStatusModal').modal('show');
    };

    $scope.openModalForTestResultEntry = function(index) {
        $scope.updateSampleCollection = {
            'booking_detail_id': $scope.diagnosticTestList[index].id
        };
        $scope.selectedIndex = index;
        var masterTestId = $scope.diagnosticTestList[index].master_diagnostic_test_id;
        var url = '/api/MasterDiagnosticTestParameters/read/' + masterTestId;
        $http.get(url).then(function(res) {
            $scope.diagnosticTestParams = res.data;
            $('#testResultsEntry').modal('show');
        });        
    };

    $scope.initiateSampleCollection = function() {
        
        var url = '/api/BookingDetail/update_initiate_sample_collection';
        $http.post(url, $scope.updateSampleCollection).then(function(res) { 
            $('#initSampleCollectionModal').modal('hide');
            bootbox.alert('Sample Collection Initiated Successfully..');
            $scope.diagnosticTestList[$scope.selectedIndex].status_id = $scope.updateSampleCollection.status_id;
        });
    };

    $scope.completeSampleCollection = function() {
        
        var url = '/api/BookingDetail/update_complete_sample_collection';
        $http.post(url, $scope.updateSampleCollection)
        .then(function(res) { 
            $('#completeSampleCollectionModal').modal('hide');
            bootbox.alert('Sample Collection Completed Successfully..');
            $scope.diagnosticTestList[$scope.selectedIndex].status_id = $scope.updateSampleCollection.status_id;
        });
    };

    $scope.initiateLabAnalysis = function() {
        
        var url = '/api/BookingDetail/update_initiate_lab_analysis';
        $http.post(url, $scope.updateSampleCollection).then(function(res) { 
            $('#initiateLabAnalysisModal').modal('hide');
            bootbox.alert('Lab Analysis Initiated Successfully..');
            $scope.diagnosticTestList[$scope.selectedIndex].status_id = 2;
        });
    };

    $scope.completeLabAnalysis = function() {
        
        var url = '/api/BookingDetail/update_complete_lab_analysis';
        $http.post(url, $scope.updateSampleCollection).then(function(res) { 
            $('#labAnalysisStatusModal').modal('hide');
            bootbox.alert('Lab Analysis completed Successfully..');
            $scope.diagnosticTestList[$scope.selectedIndex].status_id = 2;
        });
    };

    $scope.saveAnalysisResult = function() {
        var url = '/api/BookingDetail/insert_test_result';
        var data = [];
        angular.forEach($scope.diagnosticTestParams, function(value, key) {
            var postData = {};
            postData.booking_detail_id  = $scope.diagnosticTestList[$scope.selectedIndex].id;
            postData.test_param_id      = value.id;
            postData.value              = value.value;
            postData.is_alarming        = value.is_alarming;
            data.push(postData);
        });
        $http.post(url, data).then(function(res) { 
            $('#testResultsEntry').modal('hide');
            bootbox.alert('Test Results saved Successfully..');
            // $scope.diagnosticTestList[$scope.selectedIndex].status_id = 2;
        });
    }

    $scope.getMasterDiagnosticTestParams = function(masterDiagnosticTestId) {
        var url = '/api/MasterDiagnosticTestReportParams/read/' + masterDiagnosticTestId;
        $http.get(url).then(function(res) {
            $scope.diagnosticTestParams = angular.copy(res.data);
        });
    };

    var getAllUsers = function() {
        var url = '/api/User';
        $http.get(url).then(function(res) { $scope.users = res.data; });
    };

    var init = function() {
        $http.get('/api/BookingDetail').then(function(res) {
            $scope.diagnosticTestList = res.data;
        })
    };
    getAllUsers();
    init();
});

</script>