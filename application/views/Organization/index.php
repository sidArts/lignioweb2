 <!-- BEGIN CONTENT -->
 <div class="page-content-wrapper">

    <div ng-app="orgMangementModule" ng-controller="orgMangementController" class="page-content" style="min-height: 1001px;">
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
                    <span>Organization Management</span>
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
                            <th width="40%">Location</th>
                            <th>Website</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th class="text-right" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="org in organizations">
                            <td>
                                {{$index + 1}}
                            </td>
                            <td>{{ org.name }}</td>
                            <td>{{ org.address }}, {{ org.city }}, {{ org.state }}</td>
                            <td>{{ org.website }}</td>
                            <td>{{ org.created_at | date : 'MMM d, y h:mm a' }}</td>
                            <td>{{ org.status }}</td>
                            <td class="text-right">
                                <span class="label" ng-class="{ 'label-warning': (org.status_id == 1 || org.status_id == 13), 'label-success': (org.status_id == 7),
                                'label-danger' : (org.status_id == 8) }">
                                    {{org.status}}
                                </span>&nbsp;
                                <button ng-click="setStatus($index)" class="btn btn-default btn-xs">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        
        <!-- Modal -->
<div id="setOrganizationStatusModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Organization </h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Select Status</label>
            <select class="form-control" ng-model="organization.status_id">
                <option value="">--select--</option>
                <option value="7">Approved</option>
                <option value="8">Rejected</option>
                <option value="1">Pending</option>
                <option value="13">Inactive</option>
            </select>
        </div>
        <button class="btn btn-primary" ng-click="saveOrgStatus()">Save</button>
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
<script src="<?= base_url() . "assets" ?>/js/organizationManagementModule.js"></script>
