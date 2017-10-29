<!DOCTYPE html>
<html ng-app="loginModule">
<head>
	<title>Login | Lignio Dashboard</title>
	<link rel="stylesheet" type="text/css" href="<?php print base_url('assets/css/lib/bootstrap.min.css') ?>">
</head>
<body ng-controller="loginController">
	<form id="pageNavigateForm" method="post" action="<?php print base_url('Dashboard') ?>">
		<input type="hidden" name="Authorization" id="Authorization">
	</form>
	<div class="container" style="width: 35%; margin-top: 3%;">
		
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">Login</div>
      				<div class="panel-body">
      					<form action="<?php base_url('Login') ?>" method="POST">
      						<div class="form-group">
      							<label for="email">Email address:</label>
      							<input type="text" ng-model="user.email" name="email" class="form-control" id="email">
      						</div>
      						<div class="form-group">
      							<label for="pwd">Password:</label>
      							<input type="password" ng-model="user.password" name="password" class="form-control" id="pwd">
      						</div>
      						<div class="checkbox">
      							<label><input type="checkbox"> Remember me</label>
      						</div>
      						<button type="button" class="btn btn-default" ng-click="authorizeUser()">Submit</button>
      					</form>
      				</div>
				</div>
			</div>
		
	</div>
	
<script type="text/javascript" src="<?php print base_url('assets/js/lib/angular.js') ?>"></script>
<script type="text/javascript" src="<?php print base_url('assets/js/lib/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php print base_url('assets/js/lib/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php print base_url('assets/js/lib/bootbox.js') ?>"></script>
<script type="text/javascript">
var BASEPATH = 'http://localhost/lignioweb/';
var app = angular.module('loginModule', []);
app.controller("loginController", function($scope, $http) {
	$scope.user = {};
	$scope.authorizeUser = function() {
		$http({
			method: 'POST',
			url: BASEPATH + 'Login/authorize',
			data: angular.copy($scope.user)
		}).then(function(res) {
			document.getElementById('Authorization').value = res.data.token;
			document.getElementById('pageNavigateForm').submit();
		}, function(err) { 
			bootbox.alert(err.data.message, function() {
				$scope.user.password = '';
				$scope.$apply();
			}); 
		});
	};
});
</script>
</body>
</html>