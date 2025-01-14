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
         <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
           Add New Member 
        </button>-->
    </div>

<div class="text-end">
<?php 
if (isset($_POST['register'])){

    $mID        = $_POST["memberid"];
    $fname = $_POST["firstname"];
    $lname       = $_POST["lastname"];
    $email = $_POST["email"];
    $phone        = $_POST["phone"];
    $branch = $_POST["branch"];
    $message = "This is good news";
    $password = "DH".mt_rand(10, 1000);
    $message = "DTEHM Account details, username $phone  password $password ";


    $sql = "INSERT INTO members (memberID, fname, lname, email, phone, branch, password)
    VALUES ('$mID', '$fname', '$lname', '$email', '$phone', '$branch', '$password')";

    if(mysqli_query($con, $sql)){
    SendSMS('non_customised','bulk', $phone, $message);
    echo "
        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
            Branch registration successful!
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
                    <h5 class="card-title mb-0">Memberships</h5>
                </div><!-- end card header -->

                <div class="card-body">

<?php
$tableName  = "members";
$tableid    = "memberID";
$member     = $_SESSION['user'];
$sql        = "SELECT * FROM $tableName";
$sql2       = "SELECT * FROM $tableName WHERE memberID='$member' ";
if($result = mysqli_query($con, $sql2) AND $_SESSION['role']=='member'){
$row = mysqli_fetch_array($result);
header('Location: dash-m.php');

mysqli_free_result($result);

}elseif($result = mysqli_query($con, $sql) AND $_SESSION['role']=='admin' OR $_SESSION['role']=='stockist'){

    if(mysqli_num_rows($result) > 0){
echo "<table id='datatable' class='table table-bordered dt-responsive table-responsive nowrap'>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Phone Number</th>";
echo "<th>Status</th>";
echo "<th>Action</th>";
echo "</tr>";
echo "</thead>";
while($row = mysqli_fetch_array($result)){
echo "<tr>"; 
echo "<td>" . $row['memberID'] . "</td>";
echo "<td>" . $row['fname'].' '.$row['lname'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
if ($row['membership']=='unpaid') {
    // code...
    echo "<td>" ."<a aria-label='anchor' class='btn btn-sm bg-danger-subtle me-1' data-bs-toggle='tooltip' data-bs-original-title='Edit'>"
        . strtoupper($row['membership'])."
    </a>" . "</td>";
} elseif($row['membership']=='paid'){
    echo "<td>" ."<a aria-label='anchor' class='btn btn-sm bg-primary-subtle me-1' data-bs-toggle='tooltip' data-bs-original-title='Edit'>"
        . strtoupper($row['membership'])."
    </a>" . "</td>";
}
 
 if ($row['membership']=='unpaid') {
    // code...
    echo "<td>                                                    
    <a href='pay/pesapal-sub-iframe.php?id=".$row['memberID']."&fname=".$row['fname']."&lname=".$row['lname']."&amount=10000&action=subscription' class='btn btn-sm btn-primary'>
       Pay Now
    </a>
</td>";
} elseif($row['membership']=='paid'){
    echo "<td>                                                    
    
</td>";
}

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
            <h5 class="modal-title" id="exampleModalgridLabel">New Member</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

<form action="" method="POST">
<div class="mb-3">
<input type="text" name="memberid" id="simpleinput" placeholder="Member ID" class="form-control">
</div>
<div class="mb-3">
    <input type="text" name="firstname" id="simpleinput" placeholder="First Name" class="form-control">
</div>
<div class="mb-3">
    <input type="text" name="lastname" id="simpleinput" placeholder="Last Name" class="form-control">
</div>
<div class="mb-3">
    <input type="email" id="example-email" name="email" class="form-control" placeholder="Email Address">
</div>

<div class="mb-3">
    <input type="text" name="phone" id="simpleinput" placeholder="Phone Number" class="form-control">
</div>

<div class="mb-3">
    <select class="form-select" name="branch" id="example-select" class="choices form-select" name="branch">
        <option>Select Branch</option>
        <?php 
        include "includes/dbhandle.php";
        $sql = "SELECT * FROM branches";
        if($result = mysqli_query($con, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        echo '<option value='.$row['is'].'>' 
                        . $row['name']. '</option>';
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
<input type="text" id="simpleinput" placeholder="Enter referal ID" class="form-control">
</div>
<div class="mb-3">
    <button name="register" class="btn btn-primary form-control" type="submit">Register</button>
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




