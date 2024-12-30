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

                            </div>
                        </div>




<!-- Datatables  -->
<div class="row">
<div class="col-12">
<div class="card">

    <div class="card-header">
        <h5 class="card-title mb-0">All Orders</h5>
    </div><!-- end card header -->

    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
<thead>
<tr>
<th>Order ID</th>
<th>Customer</th>
<th>Product</th>
<th>Total</th> 
<th>Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM orders INNER JOIN products ON orders.product=products.prodID INNER JOIN members ON orders.member=members.memberID";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<tr>"; 
echo "<td>
<a href='javascript:void(0);' class='text-muted'>".$row['orderid']."</a>
</td>";

echo "<td>
<p class='mb-0'>".$row['fname']." ".$row['lname']."</p>
</td>";
echo "<td>
<p class='mb-0'>".$row['name']."</p>
</td>";
echo "<td>
<p class='mb-0'>".$row['total']."</p>
</td>";
echo "<td>
<p class='mb-0'>".$row['date']."</p>
</td>";
echo "<td>";
if ($row['status']='pending') {
echo "<span class='badge bg-danger-subtle text-danger fw-semibold'>".strtoupper($row['status'])."</span>";
}elseif($row['status']='delivered'){
echo "<span class='badge bg-primary-subtle text-primary fw-semibold'>".strtoupper($row['status'])."</span>";

}

echo "</td>";
echo "<td>                                                      
<a aria-label='anchor' class='btn btn-sm bg-primary-subtle me-1' data-bs-toggle='tooltip' data-bs-original-title='View Details'>
<i class='mdi mdi-eye-outline fs-14 text-primary'></i>
</a>
</td>";
echo "</tr>";
}}}
?>
        </table>
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




