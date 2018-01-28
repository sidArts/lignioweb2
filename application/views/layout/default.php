<!DOCTYPE html>
<html>
<head>
	<title>Registration | Lignio Dashboard</title>
  <?php print $css; ?>
  <style type="text/css">
      body {
          background-image: url('/assets/img/lignio.png');
          background-position: center;
          background-repeat: no-repeat;
          background-attachment: fixed;
         {
        h1, h1 
        font-size: 36px;

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
                <li class="<?php if($this->uri->segment(1) == NULL) print 'active'; ?>">
                  <a href="/">Home</a>
                </li>
                <li class="<?php if($this->uri->segment(2) == 'organization') print 'active'; ?>">
                   <a href="/Registration/organization">Organization Registration</a>
                </li>
                <li class="<?php if($this->uri->segment(2) == 'employee') print 'active'; ?>">
                  <a href="/Registration/employee">Employee Registration</a>
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