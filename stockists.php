<?php include "core/insert.php" ?>
<?php include "includes/dbhandle.php" ?>
<?php include "includes/con.php" ?>
<?php include "includes/head.php" ?>
<?php include "core/sms.php" ?>

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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
            Add New Stockist
        </button>
    </div>

<div class="text-end">
<?php 
if (isset($_POST['upgrade'])){

    $mID    = $_POST["memberid"];


    $sql    = "UPDATE users SET role='stockist' WHERE memberID='$mID' ";

    if(mysqli_query($con, $sql)){
    echo "
        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
            User upgraded successful!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
            </button>
        </div>";

    } else{
        echo mysqli_error($con);
    }
}
?>

    </div>
</div>




    <!-- Datatables  -->
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Registred Stockists</h5>
                </div><!-- end card header -->

                <div class="card-body">

<?php
$tableName = "members";
$tableid = "memberID";
$sql = "SELECT * FROM $tableName LEFT JOIN users ON members.memberID=users.memberID LEFT JOIN branches ON members.branch=branches.id WHERE users.role='stockist' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
echo "<table id='datatable' class='table table-bordered dt-responsive table-responsive nowrap'>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Phone Number</th>";
echo "<th>Branch</th>";
echo "<th>Action</th>";
echo "</tr>";
echo "</thead>";
while($row = mysqli_fetch_array($result)){
echo "<tr>"; 
echo "<td>" . $row['memberID'] . "</td>";
echo "<td>" . $row['fname'].' '.$row['lname'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>                                                       
    <a aria-label='anchor' class='btn btn-sm bg-primary-subtle me-1' data-bs-toggle='tooltip' data-bs-original-title='Edit'>
        <i class='mdi mdi-pencil-outline fs-14 text-primary'></i>
    </a>
    <a href='core/delete.php?id=".$row['memberID']."&t=".$tableName."&tID=".$tableid."' aria-label='anchor' class='btn btn-sm bg-danger-subtle' data-bs-toggle='tooltip' data-bs-original-title='Delete'>
        <i class='mdi mdi-delete fs-14 text-danger'></i>
    </a>
</td>";
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
            <h5 class="modal-title" id="exampleModalgridLabel">New Stockist</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

<form action="" method="POST">
<div class="mb-3">
<input type="text" name="memberid" id="simpleinput" placeholder="Member ID" class="form-control">
</div>

<div class="mb-3">
    <button name="upgrade" class="btn btn-primary form-control" type="submit">Upgrade to Stockist</button>
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




