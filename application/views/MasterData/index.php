<!-- BEGIN CONTENT -->
<div class="page-content-wrapper" ng-app="lignioApp" ng-controller="masterDataController">

	<div class="page-content" style="min-height: 1001px;">
		<!-- BEGIN PAGE TITLE-->
	    <h1 class="page-title">
	        <h1 class="page-title"> Master Data</h1>
	    </h1>
	    <!-- BEGIN PAGE BAR -->
	    <div class="page-bar">
	        <ul class="page-breadcrumb">
	            <li>
	                <a href="<?php print base_url(); ?>">Home</a>
	                <i class="fa fa-arrow-right"></i>
	            </li>
	            <li>
	                <span>Master Data</span>
	            </li>
	        </ul>
	    </div>
	    <div class="row">
	    	<div class="col-lg-12 col-md-12 col-sm-12">
	    		<ul class="nav nav-tabs">
					<li class="active">
						<a data-toggle="tab" href="#category">Diagnostic Test Category</a>
					</li>
					<li>
						<a data-toggle="tab" href="#measurement-units" href="#">Measurement Units</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="category" class="tab-pane fade in active">
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Category</th>
									<th>Diagnostic Test Count</th>
									<th>Created At</th>
									<th>Updated At</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-if="diagnosticTestCategories.length == 0">
									<td colspan="8" class="text-center">
										<strong>No Records Found</strong>
									</td>
								</tr>
								<tr ng-repeat="category in diagnosticTestCategories">
									<td>{{ $index + 1 }}</td>
									<td>{{ category.name }}</td>
									<td>{{ category.diagnostic_test_count }}</td>
									<td>{{ category.created_at | date : 'MMM d, y h:mm a' }}</td>
									<td>{{ category.updated_at | date : 'MMM d, y h:mm a' }}</td>
									<td>
										<button class="btn btn-primary btn-xs">
											<i class="fa fa-pencil"></i>
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div id="measurement-units" class="tab-pane fade">
						<div class="form-group text-right">
							<button class="btn btn-primary" data-toggle="modal" data-target="#addMeasurementUnitModal">
								<i class="fa fa-plus"></i>
							</button>
						</div>
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Long Name</th>
									<th>Short Name</th>
									<th>Created At</th>
									<th>Updated At</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-if="measurementUnits.length == 0">
									<td colspan="8" class="text-center">
										<strong>No Records Found</strong>
									</td>
								</tr>
								<tr ng-repeat="unit in measurementUnits">
									<td>{{ $index + 1 }}</td>
									<td>{{ unit.description }}</td>
									<td>{{ unit.short_form }}</td>
									<td>{{ unit.created_at | date : 'MMM d, y h:mm a' }}</td>
									<td>{{ unit.updated_at | date : 'MMM d, y h:mm a' }}</td>
									<td>
										<button class="btn btn-primary btn-xs">
											<i class="fa fa-pencil"></i>
										</button>
									</td>
								</tr>
							</tbody>
						</table>

						<!-- Modal -->
						<div id="previewReportModal" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Report</h4>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label>{{ reportParam.name }}</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>

							</div>
						</div>

						<div id="addMeasurementUnitModal" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Add Measurement Unit</h4>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label>Mesurement Unit Description</label>
											<input type="text" class="form-control" ng-model="measurementUnit.description">
										</div>
										<div class="form-group">
											<label>Mesurement Unit in Short</label>
											<input type="text" ng-model="measurementUnit.short_form" class="form-control">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" ng-click="addMeaurementUnit()">Save</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>

							</div>
						</div>
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
	.controller('masterDataController', function($scope, $http) {
		$scope.diagnosticTestCategories = [];
		$scope.measurementUnits         = [];
		$scope.measurementUnit  		= {};

		var getAllMasterCategories = function() {
			$http.get('/api/MasterDiagnosticTestCategories').then(function(res) {
				$scope.diagnosticTestCategories = res.data;
			});
		};		

		var getAllMeasurementUnits = function() {
			$http.get('/api/MeasurementUnits').then(function(res) {
				$scope.measurementUnits = res.data;			
			});
		};
		
	    $scope.addMeaurementUnit = function() {
	    	var data = angular.copy($scope.measurementUnit);
	        var promise = $http.post(BASEPATH + '/api/MeasurementUnits/create', data);
	        promise.then(function() {
	        	getAllMeasurementUnits();
	        	$scope.measurementUnit = {};
	        	$('#addMeasurementUnitModal').modal('hide');
	        });	        
	    };

	    getAllMeasurementUnits();
	    getAllMasterCategories();
	});
</script>