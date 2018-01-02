<div  ng-app="registrationModule" ng-controller="registrationController" class="container" style="width: 45%; margin-top: 6%;">		
 <div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Registration</h4>
    </div>
    <div class="panel-body">
      <form action="<?php base_url('Registration') ?>" method="POST">
        <div class="form-group">
         <label>Organization Name</label>
         <input type="text" ng-model="organization.name" class="form-control">
       </div>
       <div class="form-group">
         <label>Description</label>
         <textarea ng-model="organization.description" class="form-control"></textarea>
       </div>
       <div class="form-group">
         <label>Address</label>
         <textarea ng-model="organization.address" class="form-control"></textarea>
       </div>
       <div class="form-group">
         <label>Country</label>
         <select ng-change="getStatesByCountry(organization.country_id)" ng-options="country.id as country.name for country in countries" ng-model="organization.country_id" class="form-control">
           <option value="">--Select--</option>
         </select>
       </div>
       <div class="form-group">
         <label>State</label>
         <select ng-change="getCitiesByState(organization.state_id)" ng-options="state.id as state.name for state in states" ng-model="organization.state_id" class="form-control">
           <option value="">--Select--</option>
         </select>
       </div>
       <div class="form-group">
         <label>City</label>
         <select ng-options="city.id as city.name for city in cities" ng-model="organization.city_id" class="form-control">
          <option value="">--Select--</option>
        </select>
      </div>
      <div class="form-group">
       <label>Pincode</label>
       <input type="text" class="form-control" ng-model="organization.pincode">
     </div>
     <div class="form-group">
       <input type="checkbox">
       Agree <a href="#">Terms and Conditions</a>
     </div>
     <button type="button" class="btn btn-primary btn-block" ng-click="registerUser()">Submit</button>
   </form>
 </div>
</div>
<?php print $js; ?>
<script type="text/javascript">
var app = angular.module('registrationModule', []);
app.controller("registrationController", function($scope, $http) {
    $scope.user      = {};
    $scope.countries = [];
    $scope.states    = [];
    $scope.cities    = [];
    $scope.registerUser = function() {
        var data = angular.copy($scope.organization);
        var promise = $http.post('/Registration/save', data);
        promise.then(function(res) {
            console.log(res.data);
            bootbox.alert('Your data has been saved successfully!..Please fill up the next form to complete Resgistration...');
        }, function(err) {
            /*var msg = ((err.data.message) ? err.data.message : 'Something went wrong..Please try again!');
            bootbox.alert(msg, function() {
                $scope.user.password = '';
                $scope.$apply();
            }); */
        });
    };

    var getCountries = function() {
        var url = '/api/LocationManagement/getCountries';
        var promise = $http.get(url);
        promise.then(function(res) {
            $scope.countries = res.data;
        });
    };
    $scope.getStatesByCountry = function(id) {
        var url = '/api/LocationManagement/getStates/' + id;
        var promise = $http.get(url);
        promise.then(function(res) {
            $scope.states = res.data;
        });
    };
    $scope.getCitiesByState = function(id) {
        var url = '/api/LocationManagement/getCities/' + id;
        var promise = $http.get(url);
        promise.then(function(res) {
            $scope.cities = res.data;
        });
    };
    getCountries();
});
</script>