<?php 
include "includes/dbhandle.php";
include "includes/head.php";
?>


<!-- Left Sidebar Start -->
<?php 
    if ($_SESSION['role']=='admin') { 
        include 'includes/left-menu.php';
    }elseif($_SESSION['role']=='member') { 
        include 'includes/menu-member.php';
    }elseif($_SESSION['role']=='stockist') { 
        include 'includes/menu-stockist.php';
    }else{

    }
 ?>
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
         <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
           Add New Member 
        </button>-->
    </div>

<div class="text-end">
<?php
//Create new beneficiary
if (isset($_POST['post'])){

    $member = $_SESSION['id'];
    $password = $_POST['password'];

     
    $sql = "UPDATE users SET password=$password WHERE memberID='$member'";

    if(mysqli_query($con, $sql)){
        echo "
        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
            Password successfully changed!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
            </button>
        </div>";

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        // Close connection
        mysqli_close($con);

    }else{
       echo "<p class='text-subtitle text-muted'>"."My Profile"."</p>";
    }
    ?>
    </div>
</div>

<!-- General Form -->
<div class="row">
<div class="col-12"> 
<div class="card">
<div class="card-body">
    <?php 
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE memberID='$id' ";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        ?>
    <div class="card-header">
    <h5 class="card-title mb-0"><?php echo $row['memberID']; ?></h5>
    </div><!-- end card header -->
<div class="card-body">
<div class="row">
<form enctype="multipart/form-data" method="POST">
<div class="mb-3"> 
     
    <label for="simpleinput"  class="form-label">First Name</label>
    <input type="text" disabled  value="<?php echo $row['fname']; ?>"  class="form-control">
</div>
<div class="mb-3">
    <label for="simpleinput" class="form-label">Last Name</label>
    <input disabled type="text"  value="<?php echo $row['lname']; ?>" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <label for="example-email" class="form-label">Password</label>
    <input type="password" name="password" placeholder="Change password"   class="form-control">
</div>


<div class="mb-3">
    <label for="example-select" class="form-label"></label>
    <button class="btn btn-primary form-control" name="post" type="submit">Update Profile</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

</div> <!-- container-fluid -->





</div> <!-- content -->

<!-- Footer Start -->
<footer class="footer">
<div class="container-fluid">
<div class="row">
<div class="col fs-13 text-muted text-center">
&copy; <script>document.write(new Date().getFullYear())</script> Developed at <a href="#!" class="text-reset fw-semibold">JulyBrands Digital</a> 
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