<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div ng-app="bookingDetailModule" ng-controller="bookingDetailController" class="page-content" style="min-height: 1001px;">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <h1 class="page-title"> Booking Details</h1>
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
                    <a href="<?php print base_url('Booking'); ?>">Bookings</a>
                    <i class="fa fa-arrow-right"></i>
                </li>
                <li>
                    <span>Booking Details</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-4">
                        <table class="table">
                            <tr>
                                <td>Order ID</td>
                                <td>{{booking.id}}</td>
                            </tr>
                            <tr>
                                <td>Order Date</td>
                                <td>{{booking.created_at | date : 'MMM d, y h:mm:ss a'}}</td>
                            </tr>
                            <tr>
                                <td>Total Amount</td>
                                <td><i class="fa fa-rupee"></i>&nbsp;{{booking.required_amount}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <table class="table">
                            <tr>
                                <td>Expected Delivery Date</td>
                                <td>{{booking.expected_report_delivery_date | date : 'MMM d, y h:mm:ss a'}}</td>
                            </tr>
                            <tr>
                                <td>Actual Delivery Date</td>
                                <td>{{booking.actual_report_delivery_date | date : 'MMM d, y h:mm:ss a'}}</td>
                            </tr>
                            <tr>
                                <td>Paid Amount</td>
                                <td><i class="fa fa-rupee"></i>&nbsp;{{booking.paid_amount}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <table class="table">
                            <tr>
                                <td>Booking Type</td>
                                <td>{{booking.booking_type}}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{booking.statusDesc}}</td>
                            </tr>
                            <tr>
                                <td>Due Amount</td>
                                <td>
                                    <i class="fa fa-rupee"></i>&nbsp;
                                    {{booking.required_amount - booking.paid_amount}}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Diagnostic Test</th>
                                    <th>Specimen</th>
                                    <th>Cost</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="value in booking.bookingDetails">
                                    <td>{{$index + 1}}</td>
                                    <td>{{value.name}}</td>
                                    <td>{{value.specimen}}</td>
                                    <td>{{value.cost}}</td>
                                    <td>{{value.statusDesc}}</td>
                                    <td>
                                        <button ng-disabled="value.status_id != 10" class="btn btn-primary btn-xs">download report</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>               
            </div>
        </div>
        <div id="assignUserModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Assign User</h4>
                    </div>
                    <div class="modal-body">
                        <select class="form-control" ng-model="bookingDetail.assigned_to">
                            <option value="0">--select--</option>
                            <option ng-repeat="value in pathologists" ng-value="value.user_id">
                                {{value.firstname}}&nbsp;{{value.lastname}} ({{value.phone}})
                            </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" ng-click="updateBookingDetail()">Assign</button>
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
<script type="text/javascript">
    var booking_id = <?php print $booking_id; ?>
</script>
<script src="<?php print base_url('assets/js/lib/lodash.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/angular/angular.js'); ?>"></script>
<script src="<?php print base_url('assets/js/bookingModule/bookingsDetailModule.js'); ?>"></script>
