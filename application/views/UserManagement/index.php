 <!-- BEGIN CONTENT -->
 <div class="page-content-wrapper">

    <div ng-app="userMangementModule" ng-controller="userMangementController" class="page-content" style="min-height: 1001px;">
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
                    <span>User Management</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Location</th>
                            <th>Created At</th>
                            <th class="text-right" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="user in users">
                            <td>
                                {{$index + 1}}
                            </td>
                            <td>
                                {{ user.firstname }}&nbsp;{{ user.lastname }}
                            </td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.phone }}</td>
                            <td>{{ user.gender }}</td>
                            <td>{{ user.address }}, {{ user.city }}, {{ user.state }}</td>                            
                            <td>{{ user.created_at | date : 'MMM d, y h:mm a' }}</td>
                            <td class="text-right">
                                <span class="label" ng-class="{ 'label-warning': (org.status_id == 1), 'label-success': (org.status_id == 7),
                                'label-danger' : (org.status_id == 8) }">
                                    {{org.status}}
                                </span>&nbsp;
                                <button ng-click="viewUserDetails($index)" class="btn btn-default btn-xs">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div id="userDetailsModal" class="modal fade" role="dialog">
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
    </div>
</div>

<?php print $js; ?>
<script src="<?php print base_url('assets/js/lib/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/datatables/dataTables.bootstrap.js'); ?>"></script>
<script src="<?php print base_url('assets/js/lib/datatables/angular-datatables.js'); ?>"></script>
<script src="<?= base_url() . "assets" ?>/js/userManagementModule.js"></script>