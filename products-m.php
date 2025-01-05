<?php include "core/insert.php" ?>
<?php include "includes/dbhandle.php" ?>
<?php include "includes/con.php" ?>
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

</div>
</div>

<!-- Start Row -->
<div class="row">
    <?php
$tableName = "products";
$tableid = "prodID";
$sql = "SELECT * FROM $tableName";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_array($result)){
echo "<div class='col-sm-6 col-md-4 col-xl-3'>
        <!-- Simple card -->
        <div class='card d-block'>
            <img class='card-img-top rounded-top' src='photos/".$row['photo']."' alt='Card image cap'>
            <div class='card-body'>
                <h4 class='card-title'>".$row['name']."</h4>
                <h5 class='card-title'>"."Ugx ".$row['price']."</h5>
                <p class='card-text text-muted'>".substr_replace($row['description'],"...", 90)."</p>
                <a href='buy.php?id=".$row['prodID']."' class='btn btn-primary'>View Details</a>
            </div> <!-- end card-body--> 
        </div> <!-- end card-->
    </div><!-- end col -->";

} 
// Free result set
mysqli_free_result($result);
} else{
echo "No records matching your query were found.";
}
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
    

</div>
<!-- End Start -->


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