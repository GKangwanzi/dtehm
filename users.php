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
            Add New Member
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
                    <h5 class="card-title mb-0">Registred Members</h5>
                </div><!-- end card header -->

                <div class="card-body">

<?php 
$tableName = "users";
$tableid = "userID";
$sql = "SELECT * FROM $tableName";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
echo "<table id='datatable' class='table table-bordered dt-responsive table-responsive nowrap'>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Username</th>";
echo "<th>Password</th>";
echo "<th>Action</th>";
echo "</tr>";
echo "</thead>";
while($row = mysqli_fetch_array($result)){
echo "<tr>"; 
echo "<td>" . $row['memberID'] . "</td>";
echo "<td>" . $row['fname'].' '.$row['lname'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['password'] . "</td>";
echo "<td>                                                       
    <a aria-label='anchor' class='btn btn-sm bg-primary-subtle me-1' data-bs-toggle='tooltip' data-bs-original-title='Edit'>
        <i class='mdi mdi-pencil-outline fs-14 text-primary'></i>
    </a>
    <a onclick='return checkDelete()' href='core/delete.php?id=".$row['memberID']."&t=".$tableName."&tID=".$tableid."' aria-label='anchor' class='btn btn-sm bg-danger-subtle' data-bs-toggle='tooltip' data-bs-original-title='Delete'>
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
    <select class="form-select" name="branch" id="example-select" class="choices form-select">
        <option value="">Select Branch</option>
        <?php 
        include "includes/dbhandle.php";
        $sql = "SELECT * FROM branches";
        if($result = mysqli_query($con, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        echo '<option value='.$row['id'].'>' 
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
<select  name="referal" id="member-search" class="form-select">
    <option value="">Referal ID</option>
    <?php 
        include "includes/dbhandle.php";
        $sql = "SELECT * FROM members";
        if($result = mysqli_query($con, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        echo '<option value='.$row['memberID'].'>' 
                        . $row['memberID']." - ".$row['fname']." ".$row['lname']. '</option>';
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#member-search').picker({search : true});
    });

</script>

</div>
<!-- END wrapper -->
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete this record?');
}
</script>
<?php include "includes/footer.php" ?>




