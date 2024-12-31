<?php include "core/insert.php" ?>
<?php include "includes/dbhandle.php" ?>
<?php include "includes/con.php" ?>
<?php include "includes/head.php" ?>
<?php include "core/sms.php" ?>

<!-- Left Sidebar Start -->
<?php 
    if ($_SESSION['role']=='admin') { 
        include 'includes/left-menu.php';
    }elseif($_SESSION['role']=='member' AND $_SESSION['membership']=='paid') { 
        include 'includes/menu-member.php';
    }elseif($_SESSION['role']=='member' AND $_SESSION['membership']=='unpaid') { 
        include 'includes/menu-nomember.php';
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
            Deposit Now
        </button>
    </div>

<div class="text-end"> 

    </div>
</div>
 

    <!-- Datatables  -->
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">All Transactions</h5>
                </div><!-- end card header -->

                <div class="card-body">

<?php
$tableName = "deposits";
$tableid = "depositID";
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM $tableName WHERE member='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
echo "<table id='datatable' class='table table-bordered dt-responsive table-responsive nowrap'>";
echo "<thead>";
echo "<tr>";
echo "<th>Amount</th>";
echo "<th>Phone Number</th>";
echo "<th>Ref</th>";
echo "<th>Status</th>";
echo "<th>Date</th>";
echo "</tr>";
echo "</thead>";
while($row = mysqli_fetch_array($result)){
echo "<tr>"; 
echo "<td>" . $row['amount'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td>" . $row['transactionRef']. "</td>";
echo "<td>" . $row['status'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "</tr>";
} 
echo "</table>";
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

</div>
</div>
</div> 


<!-- Register Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalgridLabel">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalgridLabel">New Deposit</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
 
<form action="pay/pesapal-iframe.php" method="POST">
<div class="mb-3">
<input type="text" name="amount" id="simpleinput" placeholder="Enter Amount (Ugx)" class="form-control">
</div>

 
<div class="mb-3">
    <input type="text" hidden name="memberID" value="<?php echo $_SESSION['id']; ?>" id="simpleinput" placeholder="Phone Number" class="form-control">
</div>

<div class="mb-3">
<input type="text" name="type" hidden value="MERCHANT" class="form-control" readonly="readonly" />
</div>

<div class="mb-3">
    <button name="deposit" class="btn btn-primary form-control" type="submit">Initiate Deposit</button>
</div>

</form>
        </div> <!-- end modal body -->
    </div> <!-- end modal content -->
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




