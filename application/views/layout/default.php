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
   </head>
   <!-- END HEAD -->
   <body class="page-header-fixed page-sidebar-closed-hide-logo">
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
   </body>
</html>