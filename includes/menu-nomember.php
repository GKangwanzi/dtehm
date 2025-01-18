            <div class="app-sidebar-menu">
                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <div class="logo-box">
                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-memeber.png" alt="" height="40">
                                </span>
                            </a>
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="40">
                                </span>
                            </a>
                        </div>

                        <ul id="side-menu">

                            <li >
                                <a  >
                                    <span style="color: #61B231; font-weight: 800;" > User ID: <?php echo $_SESSION['id']; ?> </span>
                                </a>
                            </li>
                            <li >
                                <?php 

                                    echo "<a href='./pay/pesapal-sub-iframe.php?id=".$_SESSION['id']."&fname=".$_SESSION['user']."&lname=".$_SESSION['user']."&amount=76000&action=subscription?page=dash-m' aria-label='anchor'>";

                                ?>
                                     <i data-feather="home"></i>
                                    <span> Pay Membership </span>
                                </a>
                            </li>

                            <li style="opacity: 0.2;">
                                <a href="#" >
                                    <i data-feather="shopping-cart"></i>
                                    <span> Orders </span>
                                </a>
                            </li>
                            
                            <li style="opacity: 0.2;">
                                <a href="#">
                                    <i data-feather="shopping-cart"></i>
                                    <span> Products </span>
                                </a>
                            </li>

                            <li style="opacity: 0.2;">
                                <a href="#" >
                                    <i data-feather="dollar-sign"></i>
                                    <span> Deposits </span>
                                </a>
                            </li>

                            <li style="opacity: 0.2;">
                                <a href="#" >
                                    <i data-feather="dollar-sign"></i>
                                    <span> Withdraws </span>
                                </a>
                            </li>

                            <li style="opacity: 0.2;">
                                <a href="#" class="tp-link">
                                    <i data-feather="users"></i>
                                    <span> My Referrals </span>
                                </a>
                            </li>

                
                            <li style="opacity: 0.2;">
                                <a href="#" >
                                    <i data-feather="user"></i>
                                    <span> Account Settings </span>
                                </a>
                            </li>

                        </ul>
            
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
            </div>