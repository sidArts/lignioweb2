<!DOCTYPE html>
<html>
<head>
	<title>Superadmin Login</title>
	<link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="http://lignio.com/assets/css/lib/font-awesome.css">
</head>
<body ng-app="loginModule" ng-controller="loginController">
	<div class="container" style="width: 30%">
		<h3 class="page-header">Superadmin Login</h3>
		<form action="/superadmin/Home/login" method="post">
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
<script type="text/javascript" src="http://lignio.com/assets/js/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://lignio.com/assets/js/lib/bootstrap.min.js"></script>	
<script type="text/javascript" src="http://lignio.com/assets/js/lib/bootbox.js"></script>
<script type="text/javascript" src="http://lignio.com/assets/js/lib/angular/angular.js"></script>
<script type="text/javascript">
var BASEPATH = '/';
var app = angular.module('loginModule', []);
app.controller("loginController", function($scope, $http) {
	$scope.user = {};
	$scope.authorizeUser = function() {
		$http({
			method: 'POST',
			url: BASEPATH + 'superadmin/Home/login',
			data: angular.copy($scope.user)
		}).then(function(res) {
			$form = $('<form>', { action: '/superadmin/Home/organizations', method: 'POST' });
			$form.append($('<input>', { type: 'hidden', name: 'Authorization', value: res.data.token }));
			$('body').append($form);
			$form.submit();
		}, function(err) {
			var msg = ((err.data.message) ? err.data.message : 'Something went wrong..Please try again!');
			bootbox.alert(msg, function() {
				$scope.user.password = '';
				$scope.$apply();
			}); 
		});
	};
});
</script>
</body>
</html>