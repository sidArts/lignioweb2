 <!-- BEGIN CONTENT -->
 <div class="page-content-wrapper">

    <div ng-app="newDiagnosticTestModule" ng-controller="newDiagnosticTestController" class="page-content" style="min-height: 1001px;">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE
        <h1 class="page-title">
            <h1 class="page-title"> View Master Diagnostic Tests</h1>
            <small>statistics, charts, recent events and reports</small>
        </h1>
         END PAGE TITLE-->
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
                <!-- <table datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" class="table table-striped"> -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Diagnostic Test</th>
                            <th>Category</th>
                            <th width="40%">Description</th>
                            <th>Specimen</th>
                            <th class="text-right" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="diagnosticTest in masterDiagnosticTests">
                            <td>
                                {{$index + 1}}
                            </td>
                            <td>{{ diagnosticTest.name }}</td>
                            <td>{{ diagnosticTest.category }}</td>
                            <td>{{ diagnosticTest.description }}</td>
                            <td>{{ diagnosticTest.specimen }}</td>
                            <td class="text-right">
                                <span class="label label-success" ng-if="diagnosticTest.isAdded == 1">
                                    Added
                                </span>&nbsp;
                                <button ng-if="diagnosticTest.isAdded != 1" ng-click="addDiagnosticTestToOrg($index)" class="btn btn-default btn-xs">
                                    add to list
                                </button>&nbsp;
                                <button ng-click="viewDiagnosticTestDetails($index)" class="btn btn-default btn-xs">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div id="diagnosticTestDetails" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Diagnostic Test Details</h3>
                    </div>
                    <div class="modal-body">
                        <!-- <div class="row">
                            <div class="col-lg-6">
                                <strong>Diagnostic Test</strong>
                            </div>
                            <div class="col-lg-6">
                                {{diagnosticTestDetails.name}}
                            </div>
                        </div> -->
                        <table class="table table-striped">
                            <tr>
                                <th width="15%">Diagnostic Test</th>
                                <td>{{diagnosticTestDetails.name}}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{diagnosticTestDetails.category}}</td>
                            </tr>
                            <tr>
                                <th>Specimen</th>
                                <td>{{diagnosticTestDetails.specimen}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{diagnosticTestDetails.description}}</td>
                            </tr>
                        </table>
                        <h3 class="page-header">
                            Laboratory Parameters
                        </h3>
                        <table class="table table-striped">
                            <tr>
                                <th width="1%">#</th>
                                <th>Parameter</th>
                                <th>Healthy Range</th>
                            </tr>
                            <tr ng-repeat="parameter in diagnosticTestDetails.laboratoryParameters">
                                <td>{{$index + 1 }}</td>
                                <td>{{parameter.name}}</td>
                                <td>{{parameter.healthy_range}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="addToListModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content modal-sm">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add To Organization</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Price</label>
                            <input ng-model="data.cost" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button ng-click="saveDetails()" type="button" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

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