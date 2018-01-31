<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div ng-app="lignioApp" ng-controller="lignioController" class="page-content" style="min-height: 1001px;">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <h1 class="page-title"> Master Diagnostic Tests</h1>
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
                    <span>Master Diagnostic Tests</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->
        <button class="btn btn-primary" ng-click="addNewTestPage()">Add New</button>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <!-- <table datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" class="table table-striped"> -->
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
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<?php print $js; ?>
<script src="<?php print base_url('assets/js/lib/angular/angular.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/angular/angular-route.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/datatables/dataTables.bootstrap.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/datatables/angular-datatables.js'); ?>"></script>
<script src="<?php print base_url('assets/js/diagnosticTestModule/masterDiagnosticTestModule.js'); ?>"></script>