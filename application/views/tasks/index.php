<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div ng-app="bookingModule" ng-controller="bookingController" class="page-content" style="min-height: 1001px;">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <h1 class="page-title"> Tasks</h1>
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
                    <span>Tasks</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <table datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Booking Type</th>
                            <th>Booking ID</th>
                            <th>Full Name (Phone)</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Expected Delivery Date</th>
                            <th>Actual Delivery Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="booking in bookings">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ booking.booking_type }}</td>
                            <td>{{ booking.booking_id }}</td>
                            <td>{{ booking.firstname }}&nbsp;{{ booking.lastname }}&nbsp;({{booking.phone}})</td>
                            <td>{{ booking.status_desc }}</td>
                            <td>{{ booking.created_at | date : 'MMM d, y h:mm a' }}</td>
                            <td>{{ booking.expected_report_delivery_date }}</td>
                            <td>{{ ((booking.status == 3) ? booking.actual_report_delivery_date : 'NA')}}</td>
                            <td class="text-right" style="width: 30px;">
                                <button class="btn btn-primary" ng-click="showBookingDetails(booking.booking_id)">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
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
<script src="<?php print base_url('assets/js/lib/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/datatables/dataTables.bootstrap.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/datatables/angular-datatables.js'); ?>"></script>
<script src="<?php print base_url('assets/js/bookingModule/bookingsView.js'); ?>"></script>
