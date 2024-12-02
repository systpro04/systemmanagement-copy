<?php
  $page = basename($_SERVER['REQUEST_URI']);
?>
<!doctype html>
 <html lang="en" data-layout="vertical" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="img-2" data-preloader="enable" data-layout-width="fluid" data-layout-position="fixed" data-sidebar-visibility="show">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <title>Sysdev</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
     <!-- Layout config Js -->
    <script src="<?php echo base_url(); ?>assets/js/layout.js"></script>
     <!-- Bootstrap Css -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <!-- Icons Css -->
    <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/select2.css" rel="stylesheet" type="text/css" />
     <!-- App Css-->
    <link href="<?php echo base_url(); ?>assets/css/datatable.css" rel="stylesheet" type="text/css" />
      
    <link href="<?php echo base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/buttons.css" rel="stylesheet" type="text/css" />
     <!-- custom Css-->
    <link href="<?php echo base_url(); ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/js/iconify.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery3.6.0.js"></script>
    <link href="<?php echo base_url(); ?>assets/jquery-ui.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable2.1.8.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatable/buttons.css">
    <script src="<?php echo base_url(); ?>assets/js/datatable/buttons.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/buttons5.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/jszip.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/pdfmake.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/vfsfonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/html5.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/colvis.js"></script>
    <link href="<?php echo base_url(); ?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dropzone.css" type="text/css" />

    <!-- Filepond css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/filepond.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/filepond-image-preview.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flatpickr.css">
    <script src="<?php echo base_url(); ?>assets/js/flatpickr.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/fullcalendar.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toastify.css">
    <script src="<?php echo base_url(); ?>assets/js/toastify.js"></script>

 </head>
 <body>
     <!-- Begin page -->
     <div id="layout-wrapper">
         <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>
                        <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <iconify-icon icon="line-md:bell-filled-loop" class="fs-22"></iconify-icon><span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">0</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">

                                <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications  </h6>
                                            </div>
                                            <div class="col-auto dropdown-tabs">
                                                <span class="badge bg-light-subtle text-body fs-13 count"> </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-2 pt-2">
                                        <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true" id="notificationItemsTab" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab" aria-selected="true">
                                                    Requests
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-content position-relative">
                                    <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel" data-simplebar="" style="max-height: 400px;">
                                        <div class="pe-2"></div>
                                        <div class="my-3 text-center view-all">
                                            <a href="<?php echo base_url(); ?>request" type="button" class="btn btn-soft-success waves-effect waves-light">View Requests  <i class="ri-arrow-right-line align-middle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user avatar-sm" src="http://172.16.161.34:8080/hrms/<?=$this->session->userdata('photo'); ?>" alt="Header Avatar" />
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text fw-bold"><?php echo $this->session->userdata('name'); ?> </span>
                                        <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"><i><?php echo $this->session->userdata('emp_id'); ?> - <?php echo $this->session->userdata('hrms_position'); ?> </i></span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome <?php echo $this->session->userdata('name'); ?>! </h6>
                                <a class="dropdown-item" href="<?php echo base_url('profile'); ?>"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>  <span class="align-middle">Profile </span></a>
                                <a class="dropdown-item" href="<?php echo base_url();?>logout"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>  <span class="align-middle" data-key="t-logout">Logout </span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
         <div class="app-menu navbar-menu">
             <div class="navbar-brand-box">
                 <a href="<?php echo base_url('dashboard'); ?>" class="logo logo-light">
                     <span class="logo-sm">
                     <img src="http://172.16.161.34:8080/hrms/<?=$this->session->userdata('photo'); ?>" height="20" class="rounded-circle avatar-sm"  />
                     </span>
                     <span class="logo-lg">
                         <img src="assets/images/logo-light.png" alt="" style=" height: 80px;" />
                     </span>
                 </a>
                 <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                     <i class="ri-record-circle-line"></i>
                 </button>
             </div>
             <div id="scrollbar">
                 <div class="container-fluid">
                     <div id="two-column-menu">
                     </div>
                     <ul class="navbar-nav" id="navbar-nav">
                         <li class="menu-title"><span data-key="t-menu">HOME</span></li>
                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'dashboard') ? 'active' : ''; ?>" href="<?php echo base_url('dashboard'); ?>">
                                <iconify-icon icon="solar:widget-2-bold-duotone" class="fs-25"></iconify-icon>&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Dashboard </span>
                             </a>
                         </li>

                         <?php if ($this->session->userdata('position') == 'System Analyst' || $this->session->userdata('emp_id') == '01022-2014') { ?>
                            <li class="nav-item">

                                <a class="nav-link menu-link <?php echo in_array($page, ['kpi_view', 'module_view', 'add_user_view']) ? 'active' : ''; ?>"  href="#sidebarLayouts"  data-bs-toggle="collapse"  role="button"  aria-expanded="<?php echo in_array($page, ['profile']) ? 'true' : 'false'; ?>"  aria-controls="sidebarLayouts">
                                    <iconify-icon icon="solar:shield-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Admin Setup </span>
                                </a>

                                <div class="collapse menu-dropdown <?php echo in_array($page, ['kpi_view', 'module_view', 'add_user_view']) ? 'show' : ''; ?>" id="sidebarLayouts">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url('kpi_view'); ?>" class="nav-link fs-11 <?php echo ($page == 'kpi_view') ? 'active' : ''; ?>  "> &nbsp;&nbsp;&nbsp;&nbsp;Create KPI</a>
                                            <a href="<?php echo base_url('module_view'); ?>" class="nav-link fs-11 <?php echo ($page == 'module_view') ? 'active' : ''; ?>  "> &nbsp;&nbsp;&nbsp;&nbsp;Add Module | System</a>
                                            <a href="<?php echo base_url('add_user_view'); ?>" class="nav-link fs-11 <?php echo ($page == 'add_user_view') ? 'active' : ''; ?>  "> &nbsp;&nbsp;&nbsp;&nbsp;Add Team Member</a>
                                            <!-- <a href="#!" class="nav-link fs-11"> &nbsp;&nbsp;&nbsp;&nbsp;Create Rules | Regulations</a> -->
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>


                        <?php if ($this->session->userdata('emp_id') == '21114-2013' || $this->session->userdata('emp_id') == '01022-2014') { ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?php echo ($page == 'request') ? 'active' : ''; ?> " href="<?php echo base_url('request'); ?>">
                                    <iconify-icon icon="solar:shield-check-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Request </span>
                                </a>
                            </li>
                         <?php } ?>


                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'logs') ? 'active' : ''; ?>" href="<?php echo base_url('logs'); ?>">
                                <iconify-icon icon="solar:database-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Logs </span>
                             </a>
                         </li>


                         <li class="menu-title"><span data-key="t-menu">MENU </span></li>

                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'structure') ? 'active' : ''; ?>" href="<?php echo base_url('structure'); ?>">
                                <iconify-icon icon="solar:layers-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Organization Structure </span>
                             </a>
                         </li>
                         
                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'rules_view') ? 'active' : ''; ?>" href="<?php echo base_url('rules_view'); ?>">
                                <iconify-icon icon="solar:shield-warning-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Rules | Regulations </span>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'kpi') ? 'active' : ''; ?>" href="<?php echo base_url('kpi'); ?>">
                                <iconify-icon icon="solar:notebook-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Key Personnel Indicator </span>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'it_responsibilities') ? 'active' : ''; ?>" href="<?php echo base_url('it_responsibilities'); ?>">
                                <iconify-icon icon="solar:bug-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">IT Responsibilities </span>
                             </a>
                         </li>

                         <?php if ($this->session->userdata('position') == 'System Analyst' || $this->session->userdata('emp_id') == '21114-2013') { ?>
                        <li class="nav-item">

                            <a class="nav-link menu-link <?php echo in_array($page, ['current_system', 'new_system']) ? 'active' : ''; ?>"  href="#sidebarLayouts2"  data-bs-toggle="collapse"  role="button"  aria-expanded="<?php echo in_array($page, ['current_system']) ? 'true' : 'false'; ?>"  aria-controls="sidebarLayouts">
                                <iconify-icon icon="solar:cpu-bolt-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Current | New System </span>
                            </a>

                            <div class="collapse menu-dropdown <?php echo in_array($page, ['current_system', 'new_system']) ? 'show' : ''; ?>" id="sidebarLayouts2">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('current_system'); ?>" class="nav-link fs-11 <?php echo ($page == 'current_system') ? 'active' : ''; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;Current System | Module</a>
                                        <a href="<?php echo base_url('new_system'); ?>" class="nav-link fs-11 <?php echo ($page == 'new_system') ? 'active' : ''; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;New System | Module</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php } ?>

                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'gantt_view') ? 'active' : ''; ?>" href="<?php echo base_url('gantt_view'); ?>">
                                <iconify-icon icon="solar:align-bottom-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Gantt Chart </span>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'deployment_view') ? 'active' : ''; ?>" href="<?php echo base_url('deployment_view'); ?>">
                                <iconify-icon icon="solar:folder-check-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Deployment System </span>
                             </a>
                         </li>
                         
                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'meeting_schedule') ? 'active' : ''; ?>" href="<?php echo base_url('meeting_schedule'); ?>">
                                <iconify-icon icon="solar:checklist-minimalistic-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Meeting Scheduled </span>
                             </a>
                         </li>
                        
                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'setup_location_view') ? 'active' : ''; ?>" href="<?php echo base_url('setup_location_view'); ?>">
                                <iconify-icon icon="solar:map-point-wave-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Setup Location </span>
                             </a>
                         </li>
                         
                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'it_task_view') ? 'active' : ''; ?>" href="<?php echo base_url('it_task_view'); ?>">
                                <iconify-icon icon="solar:bill-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">IT Daily Task </span>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'weekly_view') ? 'active' : ''; ?>" href="<?php echo base_url('weekly_view'); ?>">
                                <iconify-icon icon="solar:folder-path-connect-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">Weekly Report </span>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link menu-link <?php echo ($page == 'faq_view') ? 'active' : ''; ?>" href="<?php echo base_url('faq_view'); ?>">
                                <iconify-icon icon="solar:question-square-bold-duotone" class="fs-25"></iconify-icon >&nbsp;&nbsp;&nbsp;&nbsp;  <span class="fs-12">FAQ </span>
                             </a>
                         </li>

                     </ul>
                 </div>
                 <!-- Sidebar -->
             </div>
             <div class="sidebar-background"></div>
         </div>
         <!-- Left Sidebar End -->
         <!-- Vertical Overlay-->
         <div class="vertical-overlay"></div>

         <!-- ============================================================== -->
         <!-- Start right Content here -->
         <!-- ============================================================== -->
         <div class="main-content">
             <div class="page-content">
