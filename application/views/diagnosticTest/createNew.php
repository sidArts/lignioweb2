 <!-- BEGIN CONTENT -->
 <div class="page-content-wrapper">

    <div ng-app="newDiagnosticTestModule" ng-controller="newDiagnosticTestController" class="page-content" style="min-height: 1001px;">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <h1 class="page-title"> View Master Diagnostic Tests</h1>
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
                    <a href="<?php print base_url('DiagnosticTest'); ?>">Diagnostic Tests</a>
                    <i class="fa fa-arrow-right"></i>
                </li>
                <li>
                    <span>View Master Diagnostic Tests</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button class="btn btn-primary">
                    Add Selected
                </button>
            </div>
        </div>

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
                            <th>Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="diagnosticTest in masterDiagnosticTests">
                            <td>
                                <input type="checkbox" ng-model="selectedDiagnosticTest[diagnosticTest.id]" ng-value="diagnosticTest.id">
                            </td>
                            <td>{{ diagnosticTest.name }}</td>
                            <td>{{ diagnosticTest.category_desc }}</td>
                            <td>{{ diagnosticTest.specimen }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php print $js; ?>
<script src="<?= base_url() . "assets" ?>/js/lib/angular/angular.js"></script>
<script src="<?php print base_url('assets/js/lib/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/datatables/dataTables.bootstrap.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/datatables/angular-datatables.js'); ?>"></script>
<script src="<?= base_url() . "assets" ?>/js/diagnosticTestModule/diagnosticTestModule.js"></script>