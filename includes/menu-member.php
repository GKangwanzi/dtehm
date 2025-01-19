            <div class="app-sidebar-menu">
                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <div class="logo-box">
                            <a href="./dash.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-memeber.png" alt="" height="40">
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

                            <li>
                                <a  >
                                    <span style="color: #61B231; font-weight: 800;" > User ID: <?php echo $_SESSION['id']; ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="./dash-m.php" >
                                    <i data-feather="home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="./orders.php" >
                                    <i data-feather="shopping-cart"></i>
                                    <span> Orders </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="products-m.php">
                                    <i data-feather="shopping-cart"></i>
                                    <span> Products </span>
                                </a>
                            </li>

                            <li>
                                <a href="deposit.php" >
                                    <i data-feather="dollar-sign"></i>
                                    <span> Deposits </span>
                                </a>
                            </li>

                            <li>
                                <a href="withdraws.php" >
                                    <i data-feather="dollar-sign"></i>
                                    <span> Withdraws </span>
                                </a>
                            </li>

                            <li>
                                <a href="referals.php" class="tp-link">
                                    <i data-feather="users"></i>
                                    <span> My Referrals </span>
                                </a>
                            </li>

                
                            <li>
                                <a href="profile.php" >
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