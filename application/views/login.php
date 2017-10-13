<!DOCTYPE html>
<html ng-app="loginModule">
<head>
	<title>Login | Lignio Dashboard</title>
	<link rel="stylesheet" type="text/css" href="<?php print base_url('assets/css/lib/bootstrap.min.css') ?>">
</head>
<body ng-controller="loginController">
	<div class="row" style="margin-top: 3%;">
		<div class="col-lg-4 col-sm-4 col-md-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">Login</div>
      				<div class="panel-body">
      					<form action="<?php base_url('Login') ?>" method="POST">
      						<div class="form-group">
      							<label for="email">Email address:</label>
      							<input type="email" name="email" class="form-control" id="email">
      						</div>
      						<div class="form-group">
      							<label for="pwd">Password:</label>
      							<input type="password" name="password" class="form-control" id="pwd">
      						</div>
      						<div class="checkbox">
      							<label><input type="checkbox"> Remember me</label>
      						</div>
      						<button type="submit" class="btn btn-default">Submit</button>
      					</form>
      				</div>
				</div>
			</div>
		</div>
	</div>
	<form id="pageNavigateForm" method="post" action="<?php print base_url('Dashboard') ?>">
		<input type="hidden" name="Authorization" id="name" value="<?php print $token ?>">
	</form>
<script type="text/javascript" src="<?php print base_url('assets/js/lib/angular.js') ?>"></script>
<script type="text/javascript">
var app = angular.module('loginModule', []);
app.controller("loginController", function($scope, $document) {
	var loginSuccess = '<?php print $status; ?>';
	if(loginSuccess) {
		document.getElementById('pageNavigateForm').submit();
	}
});
</script>
</body>
</html>