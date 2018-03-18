


<!-- ###########################################################################################
#########################################
##########################
################### -->


<html lang="en"><head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Lignio | Diagnostic Lab Dashboard</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description">
      <meta content="" name="author">

      <link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/bootstrap.min.css"><link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/font-awesome.css"><link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/bootstrap-switch.min.css"><link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/daterangepicker.min.css"><link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/morris.css"><link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/fullcalendar.min.css"><link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/jqvmap.css"><link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/components.min.css"><link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/plugins.min.css"><link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/layout.min.css"><link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/darkblue.min.css"><link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/custom.min.css">      <script type="text/javascript">
         var BASEPATH = 'http://lignio.com';
      </script>
   <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
   <!-- END HEAD -->
   <body class="page-header-fixed page-sidebar-closed-hide-logo">
      <form id="pageNavigateForm" method="post">
         <input type="hidden" name="Authorization" id="Authorization" value="<?php print $token; ?>">
      </form>
      <div class="page-wrapper">         
         <!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
   <!-- BEGIN HEADER INNER -->
   <div class="page-header-inner ">
      <!-- BEGIN LOGO -->
      <div class="page-logo">
         <a href="http://lignio.com/">
            <img src="http://lignio.com/assets/img/logo.png" alt="logo" class="logo-default"> </a>
            <div class="menu-toggler sidebar-toggler">
               <span></span>
            </div>
      </div>
      <!-- END LOGO -->
      <!-- BEGIN RESPONSIVE MENU TOGGLER -->
      <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
         <span></span>
      </a>
      <!-- END RESPONSIVE MENU TOGGLER -->
      <!-- BEGIN TOP NAVIGATION MENU -->
      <div class="top-menu">
         <ul class="nav navbar-nav pull-right">
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
               <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                  <i class="fa fa-bell-o" aria-hidden="true"></i>
                  <span class="badge badge-default"> 7 </span>
               </a>
               <ul class="dropdown-menu">
                  <li class="external">
                     <h3>
                        <span class="bold">12 pending</span> notifications
                     </h3>
                     <a href="http://keenthemes.com/preview/metronic/theme/admin_1/page_user_profile_1.html">view all</a>
                  </li>
                  <li>
                     <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                        <ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                           <li>
                              <a href="javascript:;">
                                 <span class="time">just now</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-success">
                                       <i class="fa fa-plus"></i>
                                    </span> New user registered. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">3 mins</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                       <i class="fa fa-bolt"></i>
                                    </span> Server #12 overloaded. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">10 mins</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-warning">
                                       <i class="fa fa-bell-o"></i>
                                    </span> Server #2 not responding. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">14 hrs</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-info">
                                       <i class="fa fa-bullhorn"></i>
                                    </span> Application error. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">2 days</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                       <i class="fa fa-bolt"></i>
                                    </span> Database overloaded 68%. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">3 days</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                       <i class="fa fa-bolt"></i>
                                    </span> A user IP blocked. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">4 days</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-warning">
                                       <i class="fa fa-bell-o"></i>
                                    </span> Storage Server #4 not responding dfdfdfd. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                              <span class="time">5 days</span>
                              <span class="details">
                                 <span class="label label-sm label-icon label-info">
                                    <i class="fa fa-bullhorn"></i>
                                 </span> System Error. 
                              </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">9 days</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                       <i class="fa fa-bolt"></i>
                                    </span> Storage server failed. 
                                 </span>
                              </a>
                           </li>
                        </ul>
                        <div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                        <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                     </div>
                  </li>
               </ul>
            </li>
            <!-- END NOTIFICATION DROPDOWN -->
            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
            <li class="dropdown dropdown-user">
               <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                  <img alt="" class="img-circle" src="http://lignio.com/assets/img/avatar3_small.jpg">
                  <span class="username username-hide-on-mobile"> 
                     <?php print $userDetails['firstname'] ?>&nbsp;<?php print $userDetails['lastname'] ?>
                  </span>
                  <i class="fa fa-angle-down"></i>
               </a>
               <ul class="dropdown-menu dropdown-menu-default">
                  <li>
                     <a href="http://keenthemes.com/preview/metronic/theme/admin_1/page_user_profile_1.html">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i> My Profile 
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0);" onclick="logoutUser()">
                        <i class="fa fa-sign-out"></i> Log Out 
                     </a>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
      <!-- END TOP NAVIGATION MENU -->
   </div>
   <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->         <!-- BEGIN HEADER & CONTENT DIVIDER -->
         <div class="clearfix"> </div>
         <!-- END HEADER & CONTENT DIVIDER -->
         <!-- BEGIN HEADER & CONTENT DIVIDER -->
         <div class="clearfix"> </div>
         <!-- END HEADER & CONTENT DIVIDER -->
         <!-- BEGIN CONTAINER -->
         <div class="page-container">
            <!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
   <!-- BEGIN SIDEBAR -->
   <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
   <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
   <div class="page-sidebar navbar-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
      <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
      <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
      <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
      <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
      <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="nav-item start active open">
                <a href="#" onclick="goToPage('/superadmin/Home/MasterData')" class="nav-link nav-toggle">
                   <i class="fa fa-tachometer" aria-hidden="true"></i>
                   <span class="title">Dashboard</span>
                   <span class="selected"></span>
                   <span class="arrow open"></span>
                </a>
            </li>
                     
            <li class="nav-item">
                <a href="javascript:void(0);" onclick="goToPage('/superadmin/Home/organizations')" class="nav-link nav-toggle">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span class="title">Organization Management</span>
                    <span class="arrow"></span>
                </a>
                           
            </li>

            <li class="nav-item">
                <a href="javascript:void(0);" onclick="goToPage('/superadmin/Home/MasterData')" class="nav-link nav-toggle">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span class="title">Master Data Management</span>
                    <span class="arrow"></span>
                </a>
                           
            </li>
        </ul>
      <!-- END SIDEBAR MENU -->
      <!-- END SIDEBAR MENU -->
   </div>
   <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR --> 


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
					<li>
						<a data-toggle="tab" href="#diagnostic-tests" href="#">Diagnostic Tests</a>
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

					<div id="diagnostic-tests" class="tab-pane fade">
						<table class="table table-striped">    
		                    <thead>
		                        <tr>
		                            <th>#</th>
		                            <th>Diagnostic Test</th>
		                            <th>Category</th>
		                            <th>Specimen</th>
		                            <th>Created At</th>
		                            <th>Updated At</th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        <tr ng-repeat="diagnosticTest in masterDiagnosticTests">
		                            <td>{{ $index + 1 }}</td>
		                            <td>{{ diagnosticTest.name }}</td>
		                            <td>{{ diagnosticTest.category_desc }}</td>
		                            <td>{{ diagnosticTest.specimen }}</td>
		                            <td>{{ diagnosticTest.created_at | date : 'MMM d, y h:mm a' }}</td>
		                            <td>{{ diagnosticTest.updated_at | date : 'MMM d, y h:mm a' }}</td>
		                            <td class="text-right" style="width: 30px;">
		                                <a href="#!report-parameters/{{diagnosticTest.id}}">
		                                    <i class="fa fa-eye" aria-hidden="true"></i>
		                                </a>
		                            </td>
		                        </tr>
		                    </tbody>
		                </table>
					</div>
				</div>
	    	</div>
	    </div>
	</div>
</div>
<script type="text/javascript" src="http://lignio.com/assets/js/lib/gtm.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/analytics.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/bootstrap.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/js.cookie.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.slimscroll.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.blockui.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/bootstrap-switch.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/moment.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/daterangepicker.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/morris.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/raphael-min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.waypoints.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.counterup.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/amcharts.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/serial.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/pie.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/radar.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/light.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/patterns.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/chalk.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/ammap.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/worldLow.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/amstock.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/fullcalendar.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/horizontal-timeline.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.flot.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.flot.resize.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.flot.categories.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.easypiechart.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.sparkline.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.vmap.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.vmap.russia.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.vmap.world.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.vmap.europe.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.vmap.germany.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.vmap.usa.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.vmap.sampledata.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/app.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/dashboard.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/layout.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/demo.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/quick-sidebar.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/quick-nav.min.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/bootbox.js"></script><script type="text/javascript" src="http://lignio.com/assets/js/lib/angular/angular.js"></script><script src="http://lignio.com/assets/js/lib/datatables/jquery.dataTables.js"></script>
<script src="http://lignio.com/assets/js/lib/datatables/dataTables.bootstrap.js"></script>
<script src="http://lignio.com/assets/js/lib/datatables/angular-datatables.js"></script>
<!-- <script src="http://lignio.com/assets/js/organizationManagementModule.js"></script> -->
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
			$http.get('/superadmin/Home/getDiagnosticTestCategories').then(function(res) {
				$scope.diagnosticTestCategories = res.data;
			});
		};		

		var getAllMeasurementUnits = function() {
			$http.get('/superadmin/Home/getMeasurementUnits').then(function(res) {
				$scope.measurementUnits = res.data;			
			});
		};

		var getAllMasterDiagnosticTests = function() {
			$http.get('/superadmin/Home/getMasterDiagnosticTests').then(function(res) {
				$scope.masterDiagnosticTests = res.data;			
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
	    getAllMasterDiagnosticTests();
	});
</script>
            </div>
            <!-- END CONTENT -->
         </div>
         <!-- END CONTAINER -->         
         <!-- BEGIN FOOTER -->
<div class="page-footer">
   <div class="page-footer-inner"> 2016 © Metronic Theme By
      <a target="_blank" href="http://keenthemes.com/">Keenthemes</a> &nbsp;|&nbsp;
      <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
   </div>
   <div class="scroll-to-top" style="display: none;">
      <i class="icon-arrow-up"></i>
   </div>
</div>

<!-- End -->
<div class="jqvmap-label"></div>
<div class="jqvmap-label"></div>
<div class="jqvmap-label"></div>
<div class="jqvmap-label"></div>
<div class="jqvmap-label"></div>
<div class="daterangepicker dropdown-menu opensleft">
   <div class="calendar left">
      <div class="daterangepicker_input">
         <input class="input-mini" type="text" name="daterangepicker_start" value=""><i class="fa fa-calendar"></i>
         <div class="calendar-time" style="display: none;">
            <div></div>
            <i class="fa fa-clock-o"></i>
         </div>
      </div>
      <div class="calendar-table"></div>
   </div>
   <div class="calendar right">
      <div class="daterangepicker_input">
         <input class="input-mini" type="text" name="daterangepicker_end" value=""><i class="fa fa-calendar"></i>
         <div class="calendar-time" style="display: none;">
            <div></div>
            <i class="fa fa-clock-o"></i>
         </div>
      </div>
      <div class="calendar-table"></div>
   </div>
   <div class="ranges">
      <ul>
         <li>Today</li>
         <li>Yesterday</li>
         <li>Last 7 Days</li>
         <li>Last 30 Days</li>
         <li>This Month</li>
         <li>Last Month</li>
         <li>Custom</li>
      </ul>
      <div class="range_inputs"><button class="applyBtn btn btn-sm btn-success" disabled="disabled" type="button">Apply</button> <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button></div>
   </div>
</div>         
      </div>
      <script type="text/javascript">
         var goToPage = function(url) {
            // if(url != )
            var pageNavigateForm = document.getElementById('pageNavigateForm');
            pageNavigateForm.setAttribute('action', BASEPATH + url);
            pageNavigateForm.submit();
         };

         var logoutUser = function() {
            var token = document.getElementById('Authorization').value;
            var asyncHttpReq = new XMLHttpRequest();            
            asyncHttpReq.open("GET", BASEPATH + '/Login/logout');
            asyncHttpReq.setRequestHeader('Authorization', token);
            asyncHttpReq.addEventListener("load", function() {
               if (asyncHttpReq.readyState === asyncHttpReq.DONE) {
                  if (asyncHttpReq.status === 200) {
                     bootbox.alert('You have Successfully logged out!', function() {
                        window.location.href = BASEPATH;   
                     });                     
                  } else{
                     bootbox.alert('Your session has expired!', function() {
                        window.location.href = BASEPATH;   
                     });
                  }
               }
            });
            asyncHttpReq.send();            
         };
      </script>
   
</body></html>
