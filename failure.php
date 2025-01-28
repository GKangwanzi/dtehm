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
            <div class="alert alert-danger mb-0" role="alert">
                <h4 class="alert-heading">Failure!</h4>
                <p>Your tranction failed. Make sure you have enough funds on your mobile money wallet</p>
                <hr>
                <p class="mb-0">Thank you for using DTEHM!</p>
            </div>
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