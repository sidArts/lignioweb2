
<div ng-app="loginModule" ng-controller="loginController" class="container" style="width: 35%; margin-top: 6%;">
	
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
<?php print $js; ?>
<script type="text/javascript">
var BASEPATH = '/';
var app = angular.module('loginModule', []);
app.controller("loginController", function($scope, $http) {
	$scope.user = {};
	$scope.authorizeUser = function() {
		$http({
			method: 'POST',
			url: BASEPATH + 'Login/authorize',
			data: angular.copy($scope.user)
		}).then(function(res) {
			$form = $('<form>', { action: '/Dashboard', method: 'POST' });
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