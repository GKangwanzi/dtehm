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
<?php 
if (isset($_POST['register'])){

    $mID        = $_POST["memberid"];
    $referalID  = $_POST["referal"];
    $fname      = $_POST["firstname"];
    $lname      = $_POST["lastname"];
    $email      = $_POST["email"];
    $phone      = $_POST["phone"];
    $branch     = $_POST["branch"];
    $message    = "This is good news";
    $password   = "DH".mt_rand(10, 1000);
    $message    = "Your DTEHM Account details, username $mID  password $password ";

    $sql2 = "SELECT * FROM referrals WHERE referrer_id='$referalID' ";
    $result = mysqli_query($con, $sql2);
    $row = mysqli_fetch_array($result);
    $level2 = $row['level1'] ?? null;

    $sql3 = "SELECT * FROM referrals WHERE referrer_id='$level2' ";
    $result = mysqli_query($con, $sql3);
    $row = mysqli_fetch_array($result);
    $level3 = $row['level1'] ?? null;;

    $sql4 = "SELECT * FROM referrals WHERE referrer_id='$level3' ";
    $result = mysqli_query($con, $sql4);
    $row = mysqli_fetch_array($result);
    $level4 = $row['level1'] ?? null;;

    $sql5 = "SELECT * FROM referrals WHERE referrer_id='$level4' ";
    $result = mysqli_query($con, $sql5);
    $row = mysqli_fetch_array($result);
    $level5 = $row['level1'] ?? null;;

    $sql6 = "SELECT * FROM referrals WHERE referrer_id='$level5' ";
    $result = mysqli_query($con, $sql6);
    $row = mysqli_fetch_array($result);
    $level6 = $row['level1'] ?? null;;

    $sql7 = "SELECT * FROM referrals WHERE referrer_id='$level6' ";
    $result = mysqli_query($con, $sql7);
    $row = mysqli_fetch_array($result);
    $level7 = $row['level1'] ?? null;;

    $sql8 = "SELECT * FROM referrals WHERE referrer_id='$level7' ";
    $result = mysqli_query($con, $sql8);
    $row = mysqli_fetch_array($result);
    $level8 = $row['level1'] ?? null;;



try {   
    // begin atomic transaction
$stmt = $con->begin_transaction();

// insert into members
$stmt = $con->prepare('INSERT INTO members (memberID, fname, lname, email, phone, branch, password) VALUES (?, ?, ?, ?, ?, ?, ?)');
$stmt->bind_param('sssssss', $mID, $fname, $lname, $email, $phone, $branch, $password);
$stmt->execute();

// insert into referrals
$stmt = $con->prepare('INSERT INTO referrals (referrer_id, level1, level2, level3, level4, level5, level6, level7, level8)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->bind_param('sssssssss', $mID, $referalID, $level2, $level3, $level4, $level5, $level6, $level7, $level8);
$stmt->execute();

// insert into commissions
$date = date('yyyy-mm-dd');
$commission = "10000";
$commissionName = "Commision from new member";
$stmt = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $referalID, $commissionName, $commission);
$stmt->execute();

// insert into users
$date = date('yyyy-mm-dd');
$role = "member";
$commissionName = "Commision from new member";
$stmt = $con->prepare('INSERT INTO users (memberID, fname, lname, username, password, role)
    VALUES (?, ?, ?, ?, ?, ?)');
$stmt->bind_param('ssssss', $mID, $fname, $lname, $mID, $password, $role);
$stmt->execute();

// Commit the transaction
    $con->commit();
    SendSMS('non_customised','bulk', $phone, $message);
    echo "
        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
            Member registration successful!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
            </button>
        </div>";
} catch (Exception $e) {
    // Rollback the transaction in case of error
    $con->rollback();
    echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>"."Failed to insert data: " . $e->getMessage();
            "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
            </button>
        </div>";

}
}
/*
    $sql = "INSERT INTO members (memberID, fname, lname, email, phone, branch, password)
    VALUES ('$mID', '$fname', '$lname', '$email', '$phone', '$branch', '$password')";
    $sql = "INSERT INTO referrals (referrer_id, referree_id)
    VALUES ('$mID', '$mID')";

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
*/
?>
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
$tableName = "members";
$tableid = "memberID";
$sql = "SELECT * FROM $tableName INNER JOIN branches ON members.branch=branches.id";
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




