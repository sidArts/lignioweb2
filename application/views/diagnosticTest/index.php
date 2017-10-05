<link rel="stylesheet" href="<?= base_url() . 'assets' ?>/css/lib/datatables/dataTables.bootstrap.css" />
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div ng-app="diagnosticTestModule" ng-controller="diagnosticTestController" class="page-content" style="min-height: 1001px;">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <h1 class="page-title"> Diagnostic Tests</h1>
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
                    <span>Diagnostic Tests</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <table datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Specimen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="value in diagnosticTestList">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ value.name }}</td>
                            <td></td>
                            <td>{{ value.specimen }}</td>
                            <td class="text-right">
                                <button class="btn btn-primary btn-sm" ng-click="editDiagnosticTest($index)">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div id="editDiagnosticTestModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Diagnostic Test</h4>
                    </div>
                    <div class="modal-body">
                        <!-- BEGIN FORM-->
                        <div class="form-horizontal1">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Diagnostic Category</label>
                                    <div class="col-md-5">
                                        <select class="form-control input-circle-left input-circle-right" ng-model="diagnosticTest.category" ng-options="value._id as value.name for value in categoryList">
                                            <option value="">--Select--</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Diagnostic Test</label>
                                    <div class="col-md-5">
                                        <input type="text" ng-model="diagnosticTest.name" class="form-control">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Description</label>
                                    <div class="col-md-5 col-lg-5 col-sm-5">
                                        <textarea rows="6" ng-model="diagnosticTest.description" class="form-control" placeholder="Add Description"></textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Cost</label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fa fa-rupee"></i>
                                            </span>
                                            <input type="text" ng-model="diagnosticTest.cost" class="form-control input-circle-right" placeholder="Cost">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Physical Presence Required</label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="checkbox" ng-model="diagnosticTest.presenceRequired">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Status</label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <select class="form-control" ng-model="diagnosticTest.isActive">
                                                <option ng-value="true">Active</option>
                                                <option ng-value="false">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="button" class="btn btn-circle green" ng-click="updateDiagnosticTest()">Submit</button>
                                        <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END FORM-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<?php print $js; ?>
<script>
    var diagnosticLabId = '<?= $diagnosticLabId ?>';
</script>
<script src="<?= base_url('assets/js/lib/bootbox.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/angular/angular.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/datatables/dataTables.bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/datatables/angular-datatables.js') ?>"></script>
<script src="<?= base_url('assets/js/diagnosticTestModule/diagnosticTestModule.js') ?>"></script>