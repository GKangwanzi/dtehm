<?php 
include "includes/head.php"; 
include "includes/dbhandle.php";
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




        <div class="d-flex flex-wrap gap-2">
            <a href="<?php echo 'includes/order-action.php?action=deliver&order='.$_GET['order'];?>" type="button" class="btn btn-primary">Mark Delivered</a>
            <a href="<?php echo 'includes/order-action.php?action=cancel&order='.$_GET['order']; ?>" type="button" class="btn btn-danger">Cancel Order</a>

        </div>

 
        </div>
    </div>





<div class="row">


<!-- Product details -->
<div class="col-8">

<?php
$member = $_GET['member'];
$order = $_GET['order'];
$sql = "SELECT orders.qty as qty, orders.orderid, orders.total, orders.status, products.name, products.price FROM orders INNER JOIN products ON orders.product=products.prodID WHERE orderid='$order' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo '<ul class="list-group card">'.
    '<li class="list-group-item active" aria-current="true">'
        .'Order #' .$row['orderid'].' Details'.
    '</li>
    <li class="list-group-item">'
        .$row['name'].
    '</li>
    <li class="list-group-item">'
        .$row['price'].'x'.$row['qty'].
    '</li>
    <li class="list-group-item">'
        .$row['total'].
    '</li>
    <li class="list-group-item">'
        .$row['status'].
    '</li>

</ul>';
}}}
?>

</div>


<!-- Member details -->
<div class="col-4">

<?php

$sql = "SELECT * FROM members WHERE memberID='$member' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo '<ul class="list-group card">'.
    '<li class="list-group-item active" aria-current="true">'
        .$row['memberID'].
    '</li>
    <li class="list-group-item">'
        .$row['fname'].
    '</li>
    <li class="list-group-item">'
        .$row['phone'].
    '</li>
    <li class="list-group-item">'
        .$row['email'].
    '</li>

</ul>';

}}}
?>

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




