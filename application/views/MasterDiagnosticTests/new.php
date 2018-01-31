<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div ng-app="lignioApp" ng-controller="newDiagnosticTestController" class="page-content" style="min-height: 1001px;">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <h1 class="page-title"> Master Diagnostic Tests</h1>
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
                    <a href="javascript:void(0)" ng-click="goToMasterDiagnosticTestList()">Master Diagnostic Tests</a>
                    <i class="fa fa-arrow-right"></i>
                </li>
                <li>
                    <span>New Master Diagnostic Test</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <form name="myForm" class="well">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control" ng-model="masterDiagnosticTest.category_id" required>
                            <option value="">--Please Select--</option>
                            <option ng-repeat="val in categories" value="{{val.id}}">{{val.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" ng-model="masterDiagnosticTest.name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Specimen</label>
                        <input name="specimen" type="text" ng-model="masterDiagnosticTest.specimen" class="form-control" name="specimen" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" ng-model="masterDiagnosticTest.description" name="description" required></textarea>
                    </div>
                    <button type="button" ng-disabled="myForm.$invalid" ng-click="saveMasterDiagnosticTest()" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<?php print $js; ?>
<script type="text/javascript">
angular.module('lignioApp', [])
.run(function($http) {
  $http.defaults.headers.common.Authorization = document.getElementById('Authorization').value;
})
.controller('newDiagnosticTestController', function($scope, $http) {
    $scope.masterDiagnosticTest = {};
    $scope.categories = [];
    $scope.saveMasterDiagnosticTest = function() {
        var promise = $http.post('/api/MasterDiagnosticTest/create', angular.copy($scope.masterDiagnosticTest));
        promise.then(function() {
            bootbox.alert('Master Diagnostic Test Successfully Created!', function() {
                $scope.goToMasterDiagnosticTestList();                
            });
        })
    };

    $scope.goToMasterDiagnosticTestList = function() {
        var action = '/MasterDiagnosticTests';
        $('#pageNavigateForm').attr('action', action);
        $('#pageNavigateForm').submit();
    };

    var getCategories = function() {
        var url = '/api/MasterDiagnosticTestCategories';
        var promise = $http.get(url);
        promise.then(function(res) {
            $scope.categories = res.data;
        })
    };
    getCategories();
});
</script>