<div class="page-content-wrapper">

        <div ng-app="newBookingModule" ng-controller="newBookingController" class="page-content" style="min-height: 1001px;">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title">
                <h1 class="page-title"> New Booking</h1>
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
                                        <label class="col-md-3 control-label">Diagnostic Test</label>
                                        <div class="col-md-4">
                                            <select class="form-control input-circle-left input-circle-right" ng-model="booking.diagnosticTest" ng-options="value._id as value.name for value in diagnosticTestList">
                                                <option value="">--Select--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">First Name</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon input-circle-left">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                                <input type="text" ng-model="booking.firstname" class="form-control input-circle-right" placeholder="First Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Last Name</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon input-circle-left">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                                <input type="text" ng-model="booking.lastname" class="form-control input-circle-right" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon input-circle-left">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                                <input type="email" ng-model="booking.email" class="form-control input-circle-right" placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Phone</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" ng-model="booking.phone" class="form-control input-circle-left" placeholder="Phone">
                                                <span class="input-group-addon input-circle-right">
                                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                                </span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<script src="<?= base_url() . 'assets' ?>/js/lib/angular/angular.js"></script>
<script src="<?= base_url() . 'assets' ?>/js/bookingModule/bookingController.js"></script>