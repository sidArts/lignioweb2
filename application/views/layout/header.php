<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
   <!-- BEGIN HEADER INNER -->
   <div class="page-header-inner ">
      <!-- BEGIN LOGO -->
      <div class="page-logo">
         <a href="<?php print base_url(); ?>">
            <img src="<?php print base_url(); ?>assets/img/logo.png" alt="logo" class="logo-default"> </a>
            <div class="menu-toggler sidebar-toggler">
               <span></span>
            </div>
      </div>
      <!-- END LOGO -->
      <!-- BEGIN RESPONSIVE MENU TOGGLER -->
      <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
         <span></span>
      </a>
      <!-- END RESPONSIVE MENU TOGGLER -->
      <!-- BEGIN TOP NAVIGATION MENU -->
      <div class="top-menu">
         <ul class="nav navbar-nav pull-right">
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
               <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                  <i class="fa fa-bell-o" aria-hidden="true"></i>
                  <span class="badge badge-default"> 7 </span>
               </a>
               <ul class="dropdown-menu">
                  <li class="external">
                     <h3>
                        <span class="bold">12 pending</span> notifications
                     </h3>
                     <a href="http://keenthemes.com/preview/metronic/theme/admin_1/page_user_profile_1.html">view all</a>
                  </li>
                  <li>
                     <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                        <ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                           <li>
                              <a href="javascript:;">
                                 <span class="time">just now</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-success">
                                       <i class="fa fa-plus"></i>
                                    </span> New user registered. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">3 mins</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                       <i class="fa fa-bolt"></i>
                                    </span> Server #12 overloaded. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">10 mins</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-warning">
                                       <i class="fa fa-bell-o"></i>
                                    </span> Server #2 not responding. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">14 hrs</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-info">
                                       <i class="fa fa-bullhorn"></i>
                                    </span> Application error. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">2 days</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                       <i class="fa fa-bolt"></i>
                                    </span> Database overloaded 68%. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">3 days</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                       <i class="fa fa-bolt"></i>
                                    </span> A user IP blocked. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">4 days</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-warning">
                                       <i class="fa fa-bell-o"></i>
                                    </span> Storage Server #4 not responding dfdfdfd. 
                                 </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                              <span class="time">5 days</span>
                              <span class="details">
                                 <span class="label label-sm label-icon label-info">
                                    <i class="fa fa-bullhorn"></i>
                                 </span> System Error. 
                              </span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                                 <span class="time">9 days</span>
                                 <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                       <i class="fa fa-bolt"></i>
                                    </span> Storage server failed. 
                                 </span>
                              </a>
                           </li>
                        </ul>
                        <div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                        <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                     </div>
                  </li>
               </ul>
            </li>
            <!-- END NOTIFICATION DROPDOWN -->
            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
            <li class="dropdown dropdown-user">
               <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                  <img alt="" class="img-circle" src="<?php print base_url(); ?>assets/img/avatar3_small.jpg">
                  <span class="username username-hide-on-mobile"> Nick </span>
                  <i class="fa fa-angle-down"></i>
               </a>
               <ul class="dropdown-menu dropdown-menu-default">
                  <li>
                     <a href="http://keenthemes.com/preview/metronic/theme/admin_1/page_user_profile_1.html">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i> My Profile 
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0);" onclick="logoutUser()">
                        <i class="fa fa-sign-out"></i> Log Out 
                     </a>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
      <!-- END TOP NAVIGATION MENU -->
   </div>
   <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->