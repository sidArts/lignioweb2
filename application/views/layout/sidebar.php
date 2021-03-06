<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
   <!-- BEGIN SIDEBAR -->
   <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
   <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
   <div class="page-sidebar navbar-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
      <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
      <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
      <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
      <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
      <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
      <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
         <li class="nav-item start active open">
            <a href="#"  onclick="goToPage('/Dashboard')" class="nav-link nav-toggle">
               <i class="fa fa-tachometer" aria-hidden="true"></i>
               <span class="title">Dashboard</span>
               <span class="selected"></span>
               <span class="arrow open"></span>
            </a>
         </li>
         <?php foreach ($menuList as $value): ?>
            <li class="nav-item">
               <?php if($value['url'] == '#'): ?>
               <a href="#" class="nav-link nav-toggle">
                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                     <span class="title"><?php print $value['name']; ?></span>
                     <span class="arrow"></span>
               </a>
               <?php else: ?>
               <a href="javascript:void(0);" onclick="goToPage('<?php print $value['url'] ?>')" class="nav-link nav-toggle">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  <span class="title"><?php print $value['name']; ?></span>
                  <span class="arrow"></span>
               </a>
               <?php endif; ?>
                
               <?php if(isset($value['sub_menu']) && is_array($value['sub_menu']) && count($value['sub_menu']) > 0): ?>
               <ul class="sub-menu">
                  <?php foreach ($value['sub_menu'] as $sub_menu): ?>
                     <li class="nav-item">
                        <a href="javascript:void(0);" onclick="goToPage('<?php print $sub_menu['url'] ?>')" class="nav-link ">
                           <span class="title"><?php print $sub_menu['name'] ?></span>
                        </a>
                     </li>
                  <?php endforeach; ?>
               </ul>
               <?php endif; ?>
            </li>   
         <?php endforeach; ?>
         
         
         
         <!-- <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
               <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               <span class="title">Bookings</span>
               <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
               <li class="nav-item">
                  <a href="javascript:void(0);" onclick="goToPage('Booking')" class="nav-link ">
                     <span class="title">View Bookings</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="javascript:void(0);" onclick="goToPage('Booking/create')" class="nav-link ">
                     <span class="title">New Booking</span>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
               <i class="fa fa-tasks" aria-hidden="true"></i>
               <span class="title">Tasks</span>
               <span class="arrow"></span>
            </a>
         </li>
         <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
               <i class="fa fa-clipboard" aria-hidden="true"></i>
               <span class="title">Diagnostic Reports</span>
               <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
               <li class="nav-item">
                  <a href="<?php print base_url('Report'); ?>" class="nav-link ">
                     <span class="title">View Shared Reports</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?php print base_url('Report/create'); ?>" class="nav-link ">
                     <span class="title">Upload New Report</span>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
               <i class="fa fa-stethoscope" aria-hidden="true"></i>
               <span class="title">Diagnostic Tests</span>
               <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
               <li class="nav-item">
                  <a href="javascript:void(0);" onclick="goToPage('DiagnosticTest')" class="nav-link ">
                     <span class="title">View Diagnostic Tests</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="javascript:void(0);" onclick="goToPage('DiagnosticTest/create')" class="nav-link ">
                     <span class="title">Add New</span>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a href="/diagnosticTestSample" class="nav-link nav-toggle">
               <i class="fa fa-stethoscope" aria-hidden="true"></i>
               <span class="title">Diagnostic Test Sample</span>
               <span class="arrow"></span>
            </a>
         </li>
         <li class="nav-item">
            <a href="/profile" class="nav-link nav-toggle">
               <i class="fa fa-user-o" aria-hidden="true"></i>
               <span class="title">Profile</span>
               <span class="arrow"></span>
            </a>
         </li> -->
      </ul>
      <!-- END SIDEBAR MENU -->
      <!-- END SIDEBAR MENU -->
   </div>
   <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->    