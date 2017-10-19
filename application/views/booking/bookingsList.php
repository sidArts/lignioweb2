
<link rel="stylesheet" href="<?= base_url('assets/css/lib/datatables/dataTables.bootstrap.css'); ?>" />

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div ng-app="bookingModule" ng-controller="bookingController" class="page-content" style="min-height: 1001px;">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <h1 class="page-title"> Bookings</h1>
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
                    <span>Bookings</span>
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
                            <th>Full Name</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="booking in bookings">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ booking.booking_type }}</td>
                            <td>{{ booking.booking_id }}</td>
                            <td>{{ booking.firstname }}&nbsp;{{ booking.lastname }}</td>
                            <td>{{ booking.status }}</td>
                            <td>{{ booking.created_at | date : 'MMM d, y h:mm a' }}</td>
                            <td class="text-right" style="width: 30px;">
                                <a class="btn btn-primary" href="/booking/details/{{booking._id}}">
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
    var diagnosticLabId = '<?= $diagnosticLabId ?>';
</script>

<script src="<?php print base_url('assets/js/lib/angular/angular.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/datatables/dataTables.bootstrap.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/datatables/angular-datatables.js'); ?>"></script>
<script src="<?php print base_url('assets/js/bookingModule/bookingsView.js'); ?>"></script>
