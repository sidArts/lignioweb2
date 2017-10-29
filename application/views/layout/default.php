<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title><?php print $title; ?></title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description">
      <meta content="" name="author">

      <?php print $css; ?>
      <script type="text/javascript">
         var BASEPATH = 'http://localhost/lignioweb/';
      </script>
   </head>
   <!-- END HEAD -->
   <body class="page-header-fixed page-sidebar-closed-hide-logo">
      <form id="pageNavigateForm" method="post">
         <input type="hidden" name="Authorization" id="Authorization" value="<?php print $token ?>">
      </form>
      <div class="page-wrapper">         
         <?php print $header; ?>
         <!-- BEGIN HEADER & CONTENT DIVIDER -->
         <div class="clearfix"> </div>
         <!-- END HEADER & CONTENT DIVIDER -->
         <!-- BEGIN HEADER & CONTENT DIVIDER -->
         <div class="clearfix"> </div>
         <!-- END HEADER & CONTENT DIVIDER -->
         <!-- BEGIN CONTAINER -->
         <div class="page-container">
            <?php print $sidebar; ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
               <?php print $content; ?>
            </div>
            <!-- END CONTENT -->
         </div>
         <!-- END CONTAINER -->         
         <?php print $footer; ?>         
      </div>
      <script type="text/javascript">
         var goToPage = function(url) {
            var pageNavigateForm = document.getElementById('pageNavigateForm');
            pageNavigateForm.setAttribute('action', BASEPATH + url);
            pageNavigateForm.submit();
         };

         var logoutUser = function() {
            var token = document.getElementById('Authorization').value;
            var asyncHttpReq = new XMLHttpRequest();            
            asyncHttpReq.open("GET", BASEPATH + 'Login/logout');
            asyncHttpReq.setRequestHeader('Authorization', token);
            asyncHttpReq.addEventListener("load", function() {
               if (asyncHttpReq.readyState === asyncHttpReq.DONE) {
                  if (asyncHttpReq.status === 200) {
                     bootbox.alert('You have Successfully logged out!', function() {
                        window.location.href = BASEPATH;   
                     });                     
                  } else{
                     bootbox.alert('Your session has expired!', function() {
                        window.location.href = BASEPATH;   
                     });
                  }
               }
            });
            asyncHttpReq.send();            
         };
      </script>
   </body>
</html>