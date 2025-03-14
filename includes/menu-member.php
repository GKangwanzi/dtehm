            <div class="app-sidebar-menu">
                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <div class="logo-box">
                            <a href="./dash-m.php" class="logo logo-light">
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
                                    <span style="color: #61B231; font-weight: 800;" > <?php echo $_SESSION['id']; ?> </span>

                                </a>
                            </li>



                            <li>
                                <a >
                                    <span> <?php
$memberid = $_SESSION['id'];
$sql = "SELECT SUM(points) AS totalpoints FROM points WHERE member='$memberid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$mypoints = $row['totalpoints'];

$sql1 = "SELECT SUM(points) AS totalpoints FROM points WHERE referal='$memberid'";
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_array($result1);
$level1points = $row1['totalpoints'];

$sql2 = "SELECT SUM(points) AS totalpoints FROM points WHERE level2='$memberid'";
$result2 = mysqli_query($con, $sql2);
$row2 = mysqli_fetch_array($result2);
$level2points = $row2['totalpoints'];

$sql3 = "SELECT SUM(points) AS totalpoints FROM points WHERE level3='$memberid'";
$result3 = mysqli_query($con, $sql3);
$row3 = mysqli_fetch_array($result3);
$level3points = $row3['totalpoints'];

$sql4 = "SELECT SUM(points) AS totalpoints FROM points WHERE level4='$memberid'";
$result4 = mysqli_query($con, $sql4);
$row4 = mysqli_fetch_array($result4);
$level4points = $row4['totalpoints'];

$sql5 = "SELECT SUM(points) AS totalpoints FROM points WHERE level5='$memberid'";
$result5 = mysqli_query($con, $sql5);
$row5 = mysqli_fetch_array($result5);
$level5points = $row5['totalpoints'];

$sql6 = "SELECT SUM(points) AS totalpoints FROM points WHERE level6='$memberid'";
$result6 = mysqli_query($con, $sql6);
$row6 = mysqli_fetch_array($result6);
$level6points = $row6['totalpoints'];

$sql7 = "SELECT SUM(points) AS totalpoints FROM points WHERE level7='$memberid'";
$result7 = mysqli_query($con, $sql7);
$row7 = mysqli_fetch_array($result7);
$level7points = $row7['totalpoints'];

$sql8 = "SELECT SUM(points) AS totalpoints FROM points WHERE level8='$memberid'";
$result8 = mysqli_query($con, $sql8);
$row8 = mysqli_fetch_array($result8);
$level8points = $row8['totalpoints'];

$sql9 = "SELECT SUM(points) AS totalpoints FROM points WHERE level9='$memberid'";
$result9 = mysqli_query($con, $sql9);
$row9 = mysqli_fetch_array($result9);
$level9points = $row9['totalpoints'];

$sql10 = "SELECT SUM(points) AS totalpoints FROM points WHERE level10='$memberid'";
$result10 = mysqli_query($con, $sql10);
$row10 = mysqli_fetch_array($result10);
$level10points = $row10['totalpoints'];


echo "<strong>".$mypoints+$level1points+$level2points+$level3points+$level4points+$level5points+$level6points+$level7points+$level8points+$level9points+$level10points." POINTS</strong>";
?> </span>
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
                                <a href="#sidebarMembers" data-bs-toggle="collapse">
                                    <i data-feather="dollar-sign"></i>
                                    <span> Withdraws & Accounts </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMembers">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="withdraws.php" class="tp-link">Withdraws</a>
                                        </li>
                                        <li>
                                            <a href="mobileaccount.php" class="tp-link">Mobile Money Account</a>
                                        </li>
                                        <li>
                                            <a href="bankaccount.php" class="tp-link">Bank Account</a>
                                        </li>
                                         

                                    </ul>
                                </div>
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