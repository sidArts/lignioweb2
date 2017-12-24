<!DOCTYPE html>
<html>
<head>
	<title>Registration | Lignio Dashboard</title>
  <?php print $css; ?>
  <style type="text/css">
      body {
          background-image: url('/assets/img/background.jpg');
          background-position: center;
          background-repeat: no-repeat;
          background-attachment: fixed;
      }
  </style>
</head>
<body ng-controller="registrationController">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Lignio</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="<?php if($this->uri->segment(1) == NULL) print 'active'; ?>"><a href="/">Home</a></li>
                <li class="<?php if($this->uri->segment(1) == 'Registration') print 'active'; ?>">
                    <a href="/Registration">Organization Registration</a>
                </li>
                <li><a href="#">Download Manual</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="<?php if($this->uri->segment(1) == 'Login') print 'active'; ?>">
                    <a href="/Login">
                        <span class="glyphicon glyphicon-user"></span> Login
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <?php print $content; ?>
</body>
</html>