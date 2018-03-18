<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div ng-app="lignioApp" ng-controller="employeeManagementController" class="page-content" style="min-height: 1001px;">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <h1 class="page-title"> <?php print $userDetails['org_name'] ?></h1>
            <!--<small>statistics, charts, recent events and reports</small>-->
        </h1>
        <!-- END PAGE TITLE-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php print base_url(); ?>">Home</a>
                    <i class="fa fa-arrow-right"></i>
                </li>
                <li>
                    <span>Employee Management</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->
        <!-- <button class="btn btn-primary" ng-click="addNewTestPage()">Add New</button> -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <!-- <table datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" class="table table-striped"> -->
                <table class="table table-striped">    
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="employee in employees">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ employee.firstname + ' ' + employee.lastname }}</td>
                            <td>{{ employee.email }}</td>
                            <td>{{ employee.address }}</td>
                            <td>{{ employee.created_at | date : 'MMM d, y h:mm a' }}</td>
                            <td>{{ employee.updated_at | date : 'MMM d, y h:mm a' }}</td>
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
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<?php print $js; ?>

<script type="text/javascript">
    angular.module('lignioApp', [])
    .run(function($http) {
      $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
    })
    .controller('employeeManagementController', function($scope, $http) {
        $http.get('/api/User').then(function(res) { $scope.employees = res.data; });
    });
</script>