<?php include "includes/head.php" ?>


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
<h4 class="fs-18 fw-semibold m-0">Member Registration</h4>
</div>

<div class="text-end">
<ol class="breadcrumb m-0 py-0">
<!--
<li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
<li class="breadcrumb-item active">General Elements</li> 
-->
</ol>
</div>
</div>

<!-- General Form -->
<div class="row">

    
<div class="col-12">
<div class="card">

<div class="card-body">
<div class="row">
<div class="col-lg-6">
<form>
<div class="mb-3">
    <label for="simpleinput" class="form-label">First Name</label>
    <input type="text" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <label for="simpleinput" class="form-label">Last Name</label>
    <input type="text" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <label for="example-email" class="form-label">Email</label>
    <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
</div>

<div class="mb-3">
    <label for="simpleinput" class="form-label">Phone Number</label>
    <input type="text" id="simpleinput" class="form-control">
</div>

</div>

<div class="col-lg-6">
<div class="mb-3">
<label for="simpleinput" class="form-label">Password</label>
<input type="text" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <label for="simpleinput" class="form-label">Address</label>
    <input type="text" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <label for="example-select" class="form-label">Refered By</label>
    <select class="form-select" id="example-select" class="choices form-select" name="category">
        <option>Select Category</option>
        <?php 
        include "includes/dbhandle.php";
        $sql = "SELECT * FROM users";
        if($result = mysqli_query($con, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        echo '<option value='.$row['userID'].'>' 
                        . $row['fname'].' '. $row['lname'] . '</option>';
                }
                mysqli_free_result($result);
            } else{
                echo "No records found.";
            }
        }
        ?>
        
    </select>
</div>
<div class="mb-3">
    <label for="example-select" class="form-label">.</label>
    <button class="btn btn-primary form-control" type="submit">Register</button>
</div>

</form>
</div>
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