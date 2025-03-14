<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}

if (isset($_POST['logout'])) {
    // Initialize the session.
    // Unset all of the session variables.
   // unset($_SESSION['user']);
    // Finally, destroy the session.    
    session_destroy();
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>DTEHM Health</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="DTEHM Health Ministries"/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <link rel="manifest" href="./manifest.json">

        <!-- Datatables css -->
        <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
        <link href="assets/css/picker.min.css" rel="stylesheet" type="text/css" id="app-style" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
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
                                        <?php echo $_SESSION['user']; ?> <i class="mdi mdi-chevron-down"></i> 
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>
        
                                    <!-- item-->
                                    <a href="profile.php" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                        <span>My Account</span>
                                    </a>
        
                                    <!-- item-->
                                    <a href="#" class="dropdown-item notify-item">
                                        <i class="mdi mdi-lock-outline fs-16 align-middle"></i>
                                        <span>Lock Screen</span>
                                    </a>
        
                                    <div class="dropdown-divider"></div>
        
                                    <!-- item-->
                                    <form method="POST" action="">
                                    <button name="logout" class="dropdown-item notify-item"> 

                                        
                                        <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                        <span>Logout</span>
                                    </button>
                                    </form>
        
                                </div>
                            </li>
        
                        </ul>
                    </div>

                </div>
               
            </div>
            <!-- end Topbar -->