<?php 
include "core/insert.php";
include "includes/dbhandle.php";
include "includes/con.php";
include "includes/head.php" ?>

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

</div>
</div>

<div class="row">
    <div class="card">

    <div class="card-body">
        <div>
            <?php

if (isset($_GET['id'])){

    $member = $_SESSION['id'];
    $id = $_GET['id'];

     
    $sql = "UPDATE commission_withdraws SET status='paid' WHERE id='$id'";

    if(mysqli_query($con, $sql)){
        echo '<div class="alert alert-primary mb-0" role="alert">
                <h4 class="alert-heading">Well done!</h4>
                <p>Withdraw successfully approved.</p>
                <hr>
                <p class="mb-0">Welldone!</p>
            </div>';

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
    </div> <!-- end card body -->

</div>

</div>


</div> <!-- container-fluid -->
</div> <!-- content -->

<!-- Footer Start -->
<footer class="footer">
<div class="container-fluid">
<div class="row">
<div class="col fs-13 text-muted text-center">
&copy; <script>document.write(new Date().getFullYear())</script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">JulyBrands Digital</a> 
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

<?php include "includes/footer.php" ?>