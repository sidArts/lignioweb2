 <!-- BEGIN CONTENT -->
 <div class="page-content-wrapper">

    <div ng-app="newDiagnosticTestModule" ng-controller="newDiagnosticTestController" class="page-content" style="min-height: 1001px;">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <h1 class="page-title"> New Diagnostic Test</h1>
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
                    <a href="/diagnosticTests">Diagnostic Tests</a>
                    <i class="fa fa-arrow-right"></i>
                </li>
                <li>
                    <span>New Diagnostic Test</span>
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
                            <i class="fa fa-gift"></i>New Diagnostic Test Details </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class="form-horizontal1">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Diagnostic Category</label>
                                        <div class="col-md-4">
                                            <select class="form-control input-circle-left input-circle-right" ng-model="diagnosticTest.category" ng-options="value._id as value.name for value in categoryList">
                                                <option value="">--Select--</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Diagnostic Test</label>
                                        <div class="col-md-4">
                                            <input type="text" ng-model="diagnosticTest.name" class="form-control">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description</label>
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <textarea ng-model="diagnosticTest.description" class="form-control" placeholder="Add Description"></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Cost</label>
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="checkbox" ng-model="diagnosticTest.presenceRequired">
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" class="btn btn-circle green" ng-click="submitNewDiagnosticTest()">Submit</button>
                                            <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() . "assets" ?>/js/lib/angular/angular.js"></script>
<script src="<?= base_url() . "assets" ?>/js/diagnosticTestModule/diagnosticTestModule.js"></script>