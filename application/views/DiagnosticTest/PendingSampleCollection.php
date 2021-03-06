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
                    <a href="<?= base_url() ?>">DiagnosticTests</a>
                    <i class="fa fa-arrow-right"></i>
                </li>
                <li>
                    <span>Tests Results</span>
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
        								<li><a href="#testResultsEntry">Test Results Entry</a></li>
        							</ul>
        						</div>
            				</td>
            			</tr>
            		</tbody>
            	</table>
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

	$scope.getMasterDiagnosticTestParams = function(masterDiagnosticTestId) {
		var url = '/api/MasterDiagnosticTestReportParams/read/' + masterDiagnosticTestId;
		$http.get(url).then(function(res) {
			$scope.diagnosticTestParams = angular.copy(res.data);
		});
	};

	var init = function() {
		$http.get('/api/DiagnosticTest/read_TestResults').then(function(res) {
			$scope.diagnosticTestList = res.data;
		})
	};
	init();
});

</script>