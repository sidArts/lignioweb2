<link rel="stylesheet" type="text/css" href="<?php print base_url('assets/css/lib/nya-bs-select.css') ?>">
<div class="page-content-wrapper">

        <div ng-app="newBookingModule" ng-controller="newBookingController" class="page-content" style="min-height: 1001px;">
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
                        <a href="/">Home</a>
                        <i class="fa fa-arrow-right"></i>
                    </li>
                    <li>
                        <span>New Booking</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- END PAGE HEADER-->

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Booking Details </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="#" class="form-horizontal">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">First Name</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" ng-model="booking.firstname" class="form-control" placeholder="First Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Last Name</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" ng-model="booking.lastname" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="email" ng-model="booking.email" class="form-control" placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Phone</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" ng-model="booking.phone" class="form-control" placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Add Diagnostic Tests</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-diagnostic-test-modal">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1"></label>
                                        <div class="col-md-6">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Diagnostic Test</th>
                                                        <th>Specimen</th>
                                                        <th>Cost</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-if="booking.diagnosticTests.length == 0">
                                                        <td colspan="4" class="text-center">
                                                            <strong>No Record Found</strong>
                                                        </td>
                                                    </tr>
                                                    <tr ng-repeat="value in booking.diagnosticTests">
                                                        <td>{{$index + 1}}</td>
                                                        <td>{{value.name}}</td>
                                                        <td>{{value.specimen}}</td>
                                                        <td>{{value.cost}}</td>
                                                    </tr>
                                                    <tr ng-if="booking.diagnosticTests.length > 0">
                                                        <td colspan="3" class="text-right">Total:</td>
                                                        <td>{{booking.totalAmount}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Amount Paying</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" ng-model="booking.paid_amount" class="form-control" placeholder="Paid Amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Expected Delivery Date</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="date" ng-model="booking.expected_report_delivery_date" class="form-control" placeholder="Expected Delivery Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" class="btn btn-circle green" ng-click="submitBooking()">Submit</button>
                                            <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->

                            <div id="add-diagnostic-test-modal" class="modal fade">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Select Diagnostic Tests</h4>
                                    </div>
                                    <div class="modal-body">

                                        <table datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Specimen</th>
                                                    <th>Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="value in diagnosticTestList">
                                                    <td><input type="checkbox" ng-model="checkedDiagnosticTests[value.id]"></td>
                                                    <td>{{ value.name }}</td>
                                                    <td></td>
                                                    <td>{{ value.specimen }}</td>
                                                    <td>{{value.cost}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                            
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" ng-click="selectDiagnosticTest()">Done</button>
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

<?php print $js ?>
<script src="<?= base_url('assets/js/lib/nya-bs-select.js')?>"></script>
<script src="<?= base_url('assets/js/lib/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/datatables/dataTables.bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/datatables/angular-datatables.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/lodash.js') ?>"></script>
<script src="<?= base_url('assets/js/bookingModule/newBooking.js')?>"></script>