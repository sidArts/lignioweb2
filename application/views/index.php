<?= $header ?>

<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->

<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?= $sidebar ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" style="min-height: 1001px;">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title">
                <?= $heading ?>
                <!--<small>statistics, charts, recent events and reports</small>-->
            </h1>
            <!-- END PAGE TITLE-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="http://keenthemes.com/preview/metronic/theme/admin_1/index.html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Dashboard</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- END PAGE HEADER-->
            <div class="row widget-row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?= $bookings ?>">
                                    <?= $bookings ?>
                                </span>
                            </div>
                            <div class="desc"> New Bookings </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?= $reports ?>">
                                    <?= $reports ?>
                                </span>
                            </div>
                            <div class="desc"> Reports </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?= $collection ?>">
                                    <?= $collection ?>
                                </span>
                            </div>
                            <div class="desc"> Pending Sample </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?= $rescheduled ?>">
                                    <?= $rescheduled ?>
                                </span>
                            </div>
                            <div class="desc"> Rescheduled Bookings </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-xs-12 col-sm-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class="icon-bubbles font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">Comments</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#portlet_comments_1" data-toggle="tab"> Pending </a>
                                </li>
                                <li>
                                    <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#portlet_comments_2" data-toggle="tab"> Approved </a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="portlet_comments_1">
                                    <!-- BEGIN: Comments -->
                                    <div class="mt-comments">
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="<?= base_url() . 'assets' ?>/img/avatar1(1).jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author">Michael Baker</span>
                                                    <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                                </div>
                                                <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. </div>
                                                <div class="mt-comment-details">
                                                    <span class="mt-comment-status mt-comment-status-pending">Pending</span>
                                                    <ul class="mt-comment-actions">
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Quick Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">View</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="<?= base_url() . 'assets' ?>/img/avatar6.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author">Larisa Maskalyova</span>
                                                    <span class="mt-comment-date">12 Feb, 08:30AM</span>
                                                </div>
                                                <div class="mt-comment-text"> It is a long established fact that a reader will be distracted. </div>
                                                <div class="mt-comment-details">
                                                    <span class="mt-comment-status mt-comment-status-rejected">Rejected</span>
                                                    <ul class="mt-comment-actions">
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Quick Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">View</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="<?= base_url() . 'assets' ?>/img/avatar8.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author">Natasha Kim</span>
                                                    <span class="mt-comment-date">19 Dec,09:50 AM</span>
                                                </div>
                                                <div class="mt-comment-text"> The generated Lorem or non-characteristic Ipsum is therefore or non-characteristic. </div>
                                                <div class="mt-comment-details">
                                                    <span class="mt-comment-status mt-comment-status-pending">Pending</span>
                                                    <ul class="mt-comment-actions">
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Quick Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">View</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="/img/avatar4.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author">Sebastian Davidson</span>
                                                    <span class="mt-comment-date">10 Dec, 09:20 AM</span>
                                                </div>
                                                <div class="mt-comment-text"> The standard chunk of Lorem or non-characteristic Ipsum used since the 1500s or non-characteristic. </div>
                                                <div class="mt-comment-details">
                                                    <span class="mt-comment-status mt-comment-status-rejected">Rejected</span>
                                                    <ul class="mt-comment-actions">
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Quick Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">View</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END: Comments -->
                                </div>
                                <div class="tab-pane" id="portlet_comments_2">
                                    <!-- BEGIN: Comments -->
                                    <div class="mt-comments">
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="<?= base_url() . 'assets' ?>/img/avatar4.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author">Michael Baker</span>
                                                    <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                                </div>
                                                <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. </div>
                                                <div class="mt-comment-details">
                                                    <span class="mt-comment-status mt-comment-status-approved">Approved</span>
                                                    <ul class="mt-comment-actions">
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Quick Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">View</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="<?= base_url() . 'assets' ?>/img/avatar8.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author">Larisa Maskalyova</span>
                                                    <span class="mt-comment-date">12 Feb, 08:30AM</span>
                                                </div>
                                                <div class="mt-comment-text"> It is a long established fact that a reader will be distracted by. </div>
                                                <div class="mt-comment-details">
                                                    <span class="mt-comment-status mt-comment-status-approved">Approved</span>
                                                    <ul class="mt-comment-actions">
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Quick Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">View</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="<?= base_url() . 'assets' ?>/img/avatar6.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author">Natasha Kim</span>
                                                    <span class="mt-comment-date">19 Dec,09:50 AM</span>
                                                </div>
                                                <div class="mt-comment-text"> The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. </div>
                                                <div class="mt-comment-details">
                                                    <span class="mt-comment-status mt-comment-status-approved">Approved</span>
                                                    <ul class="mt-comment-actions">
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Quick Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">View</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="<?= base_url() . 'assets' ?><?= base_url() . 'assets' ?>/img/avatar1(1).jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author">Sebastian Davidson</span>
                                                    <span class="mt-comment-date">10 Dec, 09:20 AM</span>
                                                </div>
                                                <div class="mt-comment-text"> The standard chunk of Lorem Ipsum used since the 1500s </div>
                                                <div class="mt-comment-details">
                                                    <span class="mt-comment-status mt-comment-status-approved">Approved</span>
                                                    <ul class="mt-comment-actions">
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Quick Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">View</a>
                                                        </li>
                                                        <li>
                                                            <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END: Comments -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12 col-sm-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class=" icon-social-twitter font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">Quick Actions</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#tab_actions_pending" data-toggle="tab"> Pending </a>
                                </li>
                                <li>
                                    <a href="http://keenthemes.com/preview/metronic/theme/admin_1/dashboard_3.html#tab_actions_completed" data-toggle="tab"> Completed </a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_actions_pending">
                                    <!-- BEGIN: Actions -->
                                    <div class="mt-actions">
                                        <div class="mt-action">
                                            <div class="mt-action-img">
                                                <img src="<?= base_url() . 'assets' ?>/img/avatar10.jpg"> </div>
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-icon ">
                                                            <i class="icon-magnet"></i>
                                                        </div>
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Natasha Kim</span>
                                                            <p class="mt-action-desc">Dummy text of the printing</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-green"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                    <div class="mt-action-buttons ">
                                                        <div class="btn-group btn-group-circle">
                                                            <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                            <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-action">
                                            <div class="mt-action-img">
                                                <img src="<?= base_url() . 'assets' ?>/img/avatar3(1).jpg"> </div>
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-icon ">
                                                            <i class=" icon-bubbles"></i>
                                                        </div>
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Gavin Bond</span>
                                                            <p class="mt-action-desc">pending for approval</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-red"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                    <div class="mt-action-buttons ">
                                                        <div class="btn-group btn-group-circle">
                                                            <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                            <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-action">
                                            <div class="mt-action-img">
                                                <img src="<?= base_url() . 'assets' ?>/img/avatar2(1).jpg"> </div>
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-icon ">
                                                            <i class="icon-call-in"></i>
                                                        </div>
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Diana Berri</span>
                                                            <p class="mt-action-desc">Lorem Ipsum is simply dummy text</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-green"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                    <div class="mt-action-buttons ">
                                                        <div class="btn-group btn-group-circle">
                                                            <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                            <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-action">
                                            <div class="mt-action-img">
                                                <img src="<?= base_url() . 'assets' ?>/img/avatar7.jpg"> </div>
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-icon ">
                                                            <i class=" icon-bell"></i>
                                                        </div>
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">John Clark</span>
                                                            <p class="mt-action-desc">Text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-red"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                    <div class="mt-action-buttons ">
                                                        <div class="btn-group btn-group-circle">
                                                            <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                            <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-action">
                                            <div class="mt-action-img">
                                                <img src="/img/avatar8.jpg"> </div>
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-icon ">
                                                            <i class="icon-magnet"></i>
                                                        </div>
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Donna Clarkson </span>
                                                            <p class="mt-action-desc">Simply dummy text of the printing</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-green"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                    <div class="mt-action-buttons ">
                                                        <div class="btn-group btn-group-circle">
                                                            <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                            <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-action">
                                            <div class="mt-action-img">
                                                <img src="/img/avatar9.jpg"> </div>
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-icon ">
                                                            <i class="icon-magnet"></i>
                                                        </div>
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Tom Larson</span>
                                                            <p class="mt-action-desc">Lorem Ipsum is simply dummy text</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-green"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                    <div class="mt-action-buttons ">
                                                        <div class="btn-group btn-group-circle">
                                                            <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                            <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END: Actions -->
                                </div>
                                <div class="tab-pane" id="tab_actions_completed">
                                    <!-- BEGIN:Completed-->
                                    <div class="mt-actions">
                                        <div class="mt-action">
                                            <div class="mt-action-img">
                                                <img src="/img/avatar1(1).jpg"> </div>
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-icon ">
                                                            <i class="icon-action-redo"></i>
                                                        </div>
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Frank Cameron</span>
                                                            <p class="mt-action-desc">Lorem Ipsum is simply dummy</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-red"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                    <div class="mt-action-buttons ">
                                                        <div class="btn-group btn-group-circle">
                                                            <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                            <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-action">
                                            <div class="mt-action-img">
                                                <img src="/img/avatar8.jpg"> </div>
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-icon ">
                                                            <i class="icon-cup"></i>
                                                        </div>
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Ella Davidson </span>
                                                            <p class="mt-action-desc">Text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-green"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                    <div class="mt-action-buttons">
                                                        <div class="btn-group btn-group-circle">
                                                            <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                            <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-action">
                                            <div class="mt-action-img">
                                                <img src="/img/avatar5.jpg"> </div>
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-icon ">
                                                            <i class=" icon-graduation"></i>
                                                        </div>
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Jason Dickens </span>
                                                            <p class="mt-action-desc">Dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-red"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                    <div class="mt-action-buttons ">
                                                        <div class="btn-group btn-group-circle">
                                                            <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                            <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-action">
                                            <div class="mt-action-img">
                                                <img src="/img/avatar2(1).jpg"> </div>
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-icon ">
                                                            <i class="icon-badge"></i>
                                                        </div>
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Jan Kim</span>
                                                            <p class="mt-action-desc">Lorem Ipsum is simply dummy</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-green"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                    <div class="mt-action-buttons ">
                                                        <div class="btn-group btn-group-circle">
                                                            <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                            <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END: Completed -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<?php include 'partials/footer.php' ?>
<!-- BEGIN FOOTER -->


<!-- BEGIN CORE PLUGINS -->
<?php include 'partials/coreplugins.php' ?>
<!-- END CORE PLUGINS -->