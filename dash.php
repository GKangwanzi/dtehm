<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>DTEHM Health</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body data-menu-color="dark" data-sidebar="default">

        <!-- Begin page -->
        <div id="app-layout">

            <!-- Topbar Start -->
            <div class="topbar-custom">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                            <li>
                                <button class="button-toggle-menu nav-link">
                                    <i data-feather="menu" class="noti-icon"></i>
                                </button>
                            </li>
                            <li class="d-none d-lg-block">
                                <h5 class="mb-0">Hi Enostus</h5>
                            </li>
                        </ul>

                        <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

                            

                            <li class="d-none d-sm-flex">
                                <button type="button" class="btn nav-link" data-toggle="fullscreen">
                                    <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                                </button>
                            </li>
 

        
                            <li class="dropdown notification-list topbar-dropdown">
                                <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/user-5.jpg" alt="user-image" class="rounded-circle">
                                    <span class="pro-user-name ms-1">
                                        Enostus <i class="mdi mdi-chevron-down"></i> 
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>
        
                                    <!-- item-->
                                    <a href="pages-profile.html" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                        <span>My Account</span>
                                    </a>
        
                                    <!-- item-->
                                    <a href="auth-lock-screen.html" class="dropdown-item notify-item">
                                        <i class="mdi mdi-lock-outline fs-16 align-middle"></i>
                                        <span>Lock Screen</span>
                                    </a>
        
                                    <div class="dropdown-divider"></div>
        
                                    <!-- item-->
                                    <a href="auth-logout.html" class="dropdown-item notify-item">
                                        <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                        <span>Logout</span>
                                    </a>
        
                                </div>
                            </li>
        
                        </ul>
                    </div>

                </div>
               
            </div>
            <!-- end Topbar -->

            <!-- Left Sidebar Start -->
            <div class="app-sidebar-menu">
                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <div class="logo-box">
                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="40">
                                </span>
                            </a>
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="40">
                                </span>
                            </a>
                        </div>

                        <ul id="side-menu">

                            <li style="margin-top: 50px;" class="menu-title">Menu</li>

                            <li>
                                <a href="#" >
                                    <i data-feather="home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>


                            <li>
                                <a href="#sidebarAuth" data-bs-toggle="collapse">
                                    <i data-feather="shopping-bag"></i>
                                    <span> Products </span>
                                </a>
                                <div class="collapse" id="sidebarAuth">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="auth-login.html" class="tp-link">Log In</a>
                                        </li>
                                        <li>
                                            <a href="auth-register.html" class="tp-link">Register</a>
                                        </li>
                                        <li>
                                            <a href="auth-recoverpw.html" class="tp-link">Recover Password</a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html" class="tp-link">Lock Screen</a>
                                        </li>
                                        <li>
                                            <a href="auth-confirm-mail.html" class="tp-link">Confirm Mail</a>
                                        </li>
                                        <li>
                                            <a href="email-verification.html" class="tp-link">Email Verification</a>
                                        </li>
                                        <li>
                                            <a href="auth-logout.html" class="tp-link">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarError" data-bs-toggle="collapse">
                                    <i data-feather="shopping-cart"></i>
                                    <span> Orders </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarError">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="error-404.html" class="tp-link">Error 404</a>
                                        </li>
                                        <li>
                                            <a href="error-500.html" class="tp-link">Error 500</a>
                                        </li>
                                        <li>
                                            <a href="error-503.html" class="tp-link">Error 503</a>
                                        </li>
                                        <li>
                                            <a href="error-429.html" class="tp-link">Error 429</a>
                                        </li>
                                        <li>
                                            <a href="offline-page.html" class="tp-link">Offline Page</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarExpages" data-bs-toggle="collapse">
                                    <i data-feather="dollar-sign"></i>
                                    <span> Deposit </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarExpages">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="pages-starter.html" class="tp-link">Starter</a>
                                        </li>
                                        <li>
                                            <a href="pages-profile.html" class="tp-link">Profile</a>
                                        </li>
                                        <li>
                                            <a href="pages-pricing.html" class="tp-link">Pricing</a>
                                        </li>
                                        <li>
                                            <a href="pages-timeline.html" class="tp-link">Timeline</a>
                                        </li>
                                        <li>
                                            <a href="pages-invoice.html" class="tp-link">Invoice</a>
                                        </li>
                                        <li>
                                            <a href="pages-faqs.html" class="tp-link">FAQs</a>
                                        </li>
                                        <li>
                                            <a href="pages-gallery.html" class="tp-link">Gallery</a>
                                        </li>
                                        <li>
                                            <a href="pages-maintenance.html" class="tp-link">Maintenance</a>
                                        </li>
                                        <li>
                                            <a href="pages-coming-soon.html" class="tp-link">Coming Soon</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                
                            <li>
                                <a href="apps-todolist.html" class="tp-link">
                                    <i data-feather="dollar-sign"></i>
                                    <span> Withdraw </span>
                                </a>
                            </li>

                            <li>
                                <a href="apps-contacts.html" class="tp-link">
                                    <i data-feather="users"></i>
                                    <span> My Referrals </span>
                                </a>
                            </li>

                            <li>
                                <a href="apps-calendar.html" class="tp-link">
                                    <i data-feather="file-text"></i>
                                    <span> Transactions </span>
                                </a>
                            </li>

                
                            <li>
                                <a href="#sidebarBaseui" data-bs-toggle="collapse">
                                    <i data-feather="user"></i>
                                    <span> Account Settings </span>
                                </a>
                                <div class="collapse" id="sidebarBaseui">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="ui-accordions.html" class="tp-link">Accordions</a>
                                        </li>
                                        <li>
                                            <a href="ui-alerts.html" class="tp-link">Alerts</a>
                                        </li>
                                        <li>
                                            <a href="ui-badges.html" class="tp-link">Badges</a>
                                        </li>
                                        <li>
                                            <a href="ui-breadcrumb.html" class="tp-link">Breadcrumb</a>
                                        </li>
                                        <li>
                                            <a href="ui-buttons.html" class="tp-link">Buttons</a>
                                        </li>
                                        <li>
                                            <a href="ui-cards.html" class="tp-link">Cards</a>
                                        </li>
                                        <li>
                                            <a href="ui-collapse.html" class="tp-link">Collapse</a>
                                        </li>
                                        <li>
                                            <a href="ui-dropdowns.html" class="tp-link">Dropdowns</a>
                                        </li>
                                        <li>
                                            <a href="ui-video.html" class="tp-link">Embed Video</a>
                                        </li>
                                        <li>
                                            <a href="ui-grid.html" class="tp-link">Grid</a>
                                        </li>
                                        <li>
                                            <a href="ui-images.html" class="tp-link">Images</a>
                                        </li>
                                        <li>
                                            <a href="ui-list.html" class="tp-link">List Group</a>
                                        </li>
                                        <li>
                                            <a href="ui-modals.html" class="tp-link">Modals</a>
                                        </li>
                                        <li>
                                            <a href="ui-placeholders.html" class="tp-link">Placeholders</a>
                                        </li>
                                        <li>
                                            <a href="ui-pagination.html" class="tp-link">Pagination</a>
                                        </li>
                                        <li>
                                            <a href="ui-popovers.html" class="tp-link">Popovers</a>
                                        </li>
                                        <li>
                                            <a href="ui-progress.html" class="tp-link">Progress</a>
                                        </li>
                                        <li>
                                            <a href="ui-scrollspy.html" class="tp-link">Scrollspy</a>
                                        </li>
                                        <li>
                                            <a href="ui-spinners.html" class="tp-link">Spinners</a>
                                        </li>
                                        <li>
                                            <a href="ui-tabs.html" class="tp-link">Tabs</a>
                                        </li>
                                        <li>
                                            <a href="ui-tooltips.html" class="tp-link">Tooltips</a>
                                        </li>
                                        <li>
                                            <a href="ui-typography.html" class="tp-link">Typography</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
            
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">

                            </div>
                        </div>

                        <!-- Start Row -->
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="widget-first">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="bg-primary-subtle rounded-2 p-1 me-2 border border-dashed border-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><path fill="#287F71" fill-rule="evenodd" d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z" clip-rule="evenodd"/></svg>
                                                        </div>
                                                        <p class="mb-0 text-dark fs-15">Current Balance</p>
                                                    </div>
                                                    <h3 class="mb-0 fs-24 text-black me-2">Ugx 25,894</h3>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">


                                        <div class="widget-first">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="bg-primary-subtle rounded-2 p-1 me-2 border border-dashed border-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><path fill="#287F71" fill-rule="evenodd" d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z" clip-rule="evenodd"/></svg>
                                                        </div>
                                                        <p class="mb-0 text-dark fs-15">Commission Balance</p>
                                                    </div>
                                                    <h3 class="mb-0 fs-24 text-black me-2">Ugx 32,000</h3>
                                                </div>

                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="widget-first">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="bg-primary-subtle rounded-2 p-1 me-2 border border-dashed border-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><path fill="#287F71" fill-rule="evenodd" d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z" clip-rule="evenodd"/></svg>
                                                        </div>
                                                        <p class="mb-0 text-dark fs-15">Total Deposits</p>
                                                    </div>
                                                    <h3 class="mb-0 fs-24 text-black me-2">Ugx 15,894</h3>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="widget-first">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="bg-primary-subtle rounded-2 p-1 me-2 border border-dashed border-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><path fill="#287F71" fill-rule="evenodd" d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z" clip-rule="evenodd"/></svg>
                                                        </div>
                                                        <p class="mb-0 text-dark fs-15">Total Withdraw</p>
                                                    </div>
                                                    <h3 class="mb-0 fs-24 text-black me-2">Ugx 2,894</h3>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Start -->




                        <div class="row">
                            <!-- Start Recent Order -->
                            <div class="col-md-12">
                                <div class="card overflow-hidden mb-0">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h5 class="card-title text-black mb-0">Recent Order</h5>
                                        </div>
                                    </div>

                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-traffic mb-0">

                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Customer Name</th>
                                                        <th>Items</th>
                                                        <th>Total</th>
                                                        <th>Created</th>
                                                        <th>Modified</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-muted">#3413</a>
                                                    </td>
                                                    <td class="d-flex align-items-center">
                                                        <img src="assets/images/users/user-12.jpg" class="avatar avatar-sm rounded-circle me-3" />
                                                        <div>
                                                            <p class="mb-0 fw-medium fs-14">Richard Dom</p>
                                                            <p class="text-muted fs-13 mb-0">richard@api.com</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">82</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">$480.00</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">August 09, 2023</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">August 18, 2023</p>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-primary-subtle text-primary fw-semibold">Delivered</span>
                                                    </td>
                                                    <td>                                                       
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                            <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                        </a>
                                                        <a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-muted">#4125</a>
                                                    </td>
                                                    <td class="d-flex align-items-center">
                                                        <img src="assets/images/users/user-11.jpg" class="avatar avatar-sm rounded-circle me-3" />
                                                        <div>
                                                            <p class="mb-0 fw-medium fs-14">Randal Dare</p>
                                                            <p class="text-muted fs-13 mb-0">randal@dotcom.com</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">93</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">$568.00</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">January 19, 2023</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">March 09, 2023</p>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-primary-subtle text-primary fw-semibold">Delivered</span>
                                                    </td>
                                                    <td>                                                       
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                            <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                        </a>
                                                        <a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-muted">#6532</a>
                                                    </td>
                                                    <td class="d-flex align-items-center">
                                                        <img src="assets/images/users/user-13.jpg" class="avatar avatar-sm rounded-circle me-3" />
                                                        <div>
                                                            <p class="mb-0 fw-medium fs-14">Bickle Bob</p>
                                                            <p class="text-muted fs-13 mb-0">bicklebob@dotcom.com</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">56</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">$398.00</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">April 25, 2023</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">June 21, 2023</p>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-danger-subtle text-danger fw-semibold">Cancelled</span>
                                                    </td>
                                                    <td>                                                       
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                            <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                        </a>
                                                        <a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-muted">#7405</a>
                                                    </td>
                                                    <td class="d-flex align-items-center">
                                                        <img src="assets/images/users/user-14.jpg" class="avatar avatar-sm rounded-circle me-3" />
                                                        <div>
                                                            <p class="mb-0 fw-medium fs-14">Emma Wilson</p>
                                                            <p class="text-muted fs-13 mb-0">emmawilson@dotcom.com</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">68</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">$652.00</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">September 24, 2023</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">November 13, 2023</p>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-info-subtle text-info fw-semibold">Pending</span>
                                                    </td>
                                                    <td>                                                       
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                            <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                        </a>
                                                        <a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-muted">#4526</a>
                                                    </td>
                                                    <td class="d-flex align-items-center">
                                                        <img src="assets/images/users/user-15.jpg" class="avatar avatar-sm rounded-circle me-3" />
                                                        <div>
                                                            <p class="mb-0 fw-medium fs-14">Hugh Jackma</p>
                                                            <p class="text-muted fs-13 mb-0">hughjackma@dotcom.com</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">52</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">$746.00</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">July 28, 2023</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">August 21, 2023</p>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-warning-subtle text-warning fw-semibold">Shipped</span>
                                                    </td>
                                                    <td>                                                       
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                            <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                        </a>
                                                        <a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-muted">#1054</a>
                                                    </td>
                                                    <td class="d-flex align-items-center">
                                                        <img src="assets/images/users/user-12.jpg" class="avatar avatar-sm rounded-circle me-3" />
                                                        <div>
                                                            <p class="mb-0 fw-medium fs-14">Angelina Hose</p>
                                                            <p class="text-muted fs-13 mb-0">angelinahose@dotcom.com</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">45</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">$205.00</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">June 09, 2023</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">August 25, 2023</p>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-info-subtle text-info fw-semibold">Pending</span>
                                                    </td>
                                                    <td>                                                       
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                            <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                        </a>
                                                        <a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>    
                                    </div>

                                    <div class="card-footer py-0 border-top">
                                        <div class="row align-items-center">
                                            <div class="col-sm">
                                                <div class="text-block text-center text-sm-start">
                                                    <span class="fw-medium">1 of 3</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-auto mt-3 mt-sm-0">
                                                <div class="pagination gap-2 justify-content-center py-3 ps-0 pe-3">
                                                    <ul class="pagination mb-0">
                                                        <li class="page-item disabled"> 
                                                            <a class="page-link me-2 rounded-2" href="javascript:void(0);"> Prev </a> 
                                                        </li>
                                                        <li class="page-item active"> 
                                                            <a class="page-link rounded-2 me-2" href="#" data-i="1" data-page="5">1</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link me-2 rounded-2" href="#" data-i="2" data-page="5">2</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link text-primary rounded-2" href="javascript:void(0);"> next </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Recent Order -->
                        </div>

                    </div> <!-- container-fluid -->
                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col fs-13 text-muted text-center">
                                &copy; <script>document.write(new Date().getFullYear())</script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">Zoyothemes</a> 
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <!-- Apexcharts JS -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- for basic area chart -->
        <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

        <!-- Widgets Init Js -->
        <script src="assets/js/pages/ecommerce-dashboard.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        
    </body>
</html>