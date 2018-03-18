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
                                        <li>
                                            <a data-toggle="modal" data-target="#initSampleCollection" href="javascript:void(0);">
                                                Initiate Sample Collection
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="modal" data-target="#updateSampleCollection" href="javascript:void(0);">
                                                Update Sample Collection
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="modal" data-target="#testResultsEntry" href="javascript:void(0);">Test Results Entry</a>
                                        </li>
                                        <li>
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

        <div id="initSampleCollection" class="modal fade">
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
                            <select class="form-control" ng-model="initiateSampleCollection.assigned_to">
                                <option value="">--Select Sample Collector--</option>
                                <option value="{{user.id}}" ng-repeat="user in users">{{user.firstname + ' ' + user.lastname}}</option>
                            </select>
                            <button class="btn btn-primary" ng-click="saveSampleCollectionInit()">Update</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="updateSampleCollection" class="modal fade">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Sample Collection Status</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-control" ng-model="">
                                
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="testResultsEntry" class="modal fade">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Test Results Entry</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" ng-repeat="testParam in diagnosticTestParams">
                            <label>{{ testParam. }}</label>
                        </div>
                    </div>
                    <div class="modal-footer">
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
                            <label>{{ testParam. }}</label>
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

    $scope.initiateSampleCollection = {};
    $scope.updateSampleCollection = {};
    $scope.testResultsEntry = {};
    $scope.reportApproval = {};

    $scope.saveSampleCollectionInit = function() {

    };

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