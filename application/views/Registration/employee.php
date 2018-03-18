<div  ng-app="EmpregistrationModule" ng-controller="EmployeeregistrationController" class="container" style="width: 45%; margin-top: 6%;">		
 <div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Registration</h4>
    </div>
    <div class="panel-body">
      <form action="<?php base_url('Employeeregistration') ?>" method="POST">
        <div class="form-group">
          <label>Organization Name</label>
          <select class="form-control" ng-model="employee.org_id" ng-options="org.organization_id as org.name for org in organizations">
            <option value="">--select--</option>
          </select>
       </div>
        <div class="form-group">
          <label>Phone</label>
          <input type="text" ng-model="employee.phone" class="form-control">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" ng-model="employee.email" class="form-control">
        </div>
        <div class="form-group">
          <label>First Name</label>
          <input type="text" ng-model="employee.firstname" class="form-control">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" ng-model="employee.lastname" class="form-control">
        </div>
        <div class="form-group">
         <label>Country</label>
         <select ng-change="getStatesByCountry(employee.country_id)" ng-options="country.id as country.name for country in countries" ng-model="employee.country_id" class="form-control">
           <option value="">--Select--</option>
         </select>
       </div>
       <div class="form-group">
         <label>State</label>
         <select ng-change="getCitiesByState(employee.state_id)" ng-options="state.id as state.name for state in states" ng-model="employee.state_id" class="form-control">
           <option value="">--Select--</option>
         </select>
       </div>
       <div class="form-group">
         <label>City</label>
         <select ng-options="city.id as city.name for city in cities" ng-model="employee.city_id" class="form-control">
          <option value="">--Select--</option>
        </select>
      </div>
        <div class="form-group">
          <input type="checkbox">
          Agree <a href="#">Terms and Conditions</a>
        </div>
        <button type="button" class="btn btn-primary btn-block" ng-click="registerUser()">
          Submit
        </button>
      </form>
    </div>
 </div>
</div>
<?php print $js; ?>
<script type="text/javascript">
var app = angular.module('EmpregistrationModule', []);
app.controller("EmployeeregistrationController", function($scope, $http) {
    $scope.user      = {};

    $scope.organizations = [];

    var getAllOrganizations = function() {
      var url = '/api/Organization/approvedOrganizations';
      var promise = $http.get(url);
      promise.then(function(res) {
        $scope.organizations = res.data;        
      })
    };

    $scope.registerUser = function() {
      var data = angular.copy($scope.employee);
      var promise = $http.post('/api/User/save', data);
      promise.then(function(res) {
          bootbox.alert('Your data has been saved successfully...!');
      });
    };

    $scope.getCitiesByState = function(state_id) {
      $http.get('/api/LocationManagement/getCities/' + state_id).then(function(res) { 
        $scope.cities = res.data; 
      });
    };

    $scope.getStatesByCountry = function(country_id) {
      $http.get('/api/LocationManagement/getStates/' + country_id).then(function(res) { 
        $scope.states = res.data; 
      });
    };

    $scope.getCountries = function(country_id) {
      $http.get('/api/LocationManagement/getCountries').then(function(res) { 
        $scope.countries = res.data; 
      });
    };

    $scope.getCountries();
    getAllOrganizations();    
});

</script>