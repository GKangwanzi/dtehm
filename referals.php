<?php include "core/insert.php" ?>
<?php include "core/sms.php" ?>
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
    <?php
    $sqll = "SELECT memberID FROM members ORDER BY memberID DESC LIMIT 1";
    $resultt = mysqli_query($con, $sqll);
    $roww = mysqli_fetch_array($resultt);
    $lastMember = $roww['memberID'];
    $new = substr($lastMember, -3)+1;

    ?>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
            Add New Member
        </button>
    </div>
</div>
<?php 
if (isset($_POST['register'])){


    $sqll = "SELECT memberID FROM members ORDER BY memberID DESC LIMIT 1";
    $resultt = mysqli_query($con, $sqll);
    $roww = mysqli_fetch_array($resultt);
    $lastMember = $roww['memberID'];
    $newnumber = substr($lastMember, -3)+1;


    $mID        = "DTEHM".$newnumber;
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
$commission = "0";
$commissionName = "Commision from new member";
$stmt = $con->prepare('INSERT INTO commissions (member, name, amount, newmember)
    VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $referalID, $commissionName, $commission, $mID);
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
<div class="row">
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT COUNT(referrer_id) as total FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level1='$memberid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
echo "<h4>Generation One - <b>".$row['total']." Members"."</b></h4>";
?>

<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level1='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){

echo '<div class="col-6 col-lg-2 col-sm-6 col-md-4"><div class="card bg-primary-subtle">
<div class="card-body">
'; 
echo "<img src='assets/images/users/user-12.jpg' alt='avatar' class='img-fluid avatar-md img-thumbnail me-2 rounded-circle avatar-border'>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'><b>".$row['referrer_id']. "</b></p>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>".$row['fname']."</p>";
echo "</div>
</div>
</div>";
}}}
?>  
</div>

<div class="row">
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT COUNT(referrer_id) as total FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level2='$memberid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
echo "<h4>Generation Two - <b>".$row['total']." Members"."</b></h4>";
?>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level2='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-6 col-lg-2 col-sm-6 col-md-4'><div class='card bg-success-subtle'><div class='card-body'>"; 
echo "<img src='assets/images/users/user-12.jpg' alt='avatar' class='img-fluid avatar-md img-thumbnail me-2 rounded-circle avatar-border'>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>";
echo $row['referrer_id'];
echo "</p>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>".$row['fname']." ".$row['lname']."</p>";
echo "</div></div></div>";
}}}
?>  
</div>

<div class="row">
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT COUNT(referrer_id) as total FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level3='$memberid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
echo "<h4>Generation Three - <b>".$row['total']." Members"."</b></h4>";
?>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level3='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-6 col-lg-2 col-sm-6 col-md-4'><div class='card bg-secondary-subtle'><div class='card-body'>"; 
echo "<img src='assets/images/users/user-12.jpg' alt='avatar' class='img-fluid avatar-md img-thumbnail me-2 rounded-circle avatar-border'>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>";
echo $row['referrer_id'];
echo "</p>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>".$row['fname']." ".$row['lname']."</p>";
echo "</div></div></div>";
}}}
?>  
</div>

<div class="row">
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT COUNT(referrer_id) as total FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level4='$memberid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
echo "<h4>Generation Four - <b>".$row['total']." Members"."</b></h4>";
?>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level4='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-6 col-lg-2 col-sm-6 col-md-4'><div class='card bg-warning-subtle'><div class='card-body'>"; 
echo "<img src='assets/images/users/user-12.jpg' alt='avatar' class='img-fluid avatar-md img-thumbnail me-2 rounded-circle avatar-border'>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>";
echo $row['referrer_id'];
echo "</p>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>".$row['fname']." ".$row['lname']."</p>";
echo "</div></div></div>";
}}}
?>  
</div>

<div class="row">
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT COUNT(referrer_id) as total FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level5='$memberid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
echo "<h4>Generation Five - <b>".$row['total']." Members"."</b></h4>";
?>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level5='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-6 col-lg-2 col-sm-6 col-md-4'><div class='card bg-primary-subtle'><div class='card-body'>"; 
echo "<img src='assets/images/users/user-12.jpg' alt='avatar' class='img-fluid avatar-md img-thumbnail me-2 rounded-circle avatar-border'>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>";
echo $row['referrer_id'];
echo "</p>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>".$row['fname']." ".$row['lname']."</p>";
echo "</div></div></div>";
}}}
?>  
</div>

<div class="row">
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT COUNT(referrer_id) as total FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level6='$memberid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
echo "<h4>Generation Six - <b>".$row['total']." Members"."</b></h4>";
?>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level6='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-6 col-lg-2 col-sm-6 col-md-4'><div class='card bg-success-subtle'><div class='card-body'>"; 
echo "<img src='assets/images/users/user-12.jpg' alt='avatar' class='img-fluid avatar-md img-thumbnail me-2 rounded-circle avatar-border'>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>";
echo $row['referrer_id'];
echo "</p>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>".$row['fname']." ".$row['lname']."</h4>";
echo "</div></div></div>";
}}}
?>  
</div>

<div class="row">
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT COUNT(referrer_id) as total FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level7='$memberid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
echo "<h4>Generation Seven - <b>".$row['total']." Members"."</b></h4>";
?>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level7='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-6 col-lg-2 col-sm-6 col-md-4'><div class='card bg-secondary-subtle'><div class='card-body'>"; 
echo "<img src='assets/images/users/user-12.jpg' alt='avatar' class='img-fluid avatar-md img-thumbnail me-2 rounded-circle avatar-border'>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>";
echo $row['referrer_id'];
echo "</p>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>".$row['fname']." ".$row['lname']."</h4>";
echo "</div></div></div>";
}}}
?>  
</div>

<div class="row">
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT COUNT(referrer_id) as total FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level8='$memberid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
echo "<h4>Generation Eight - <b>".$row['total']." Members"."</b></h4>";
?>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level8='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-6 col-lg-2 col-sm-6 col-md-4'><div class='card '><div class='card-body'>"; 
echo "<img src='assets/images/users/user-12.jpg' alt='avatar' class='img-fluid avatar-md img-thumbnail me-2 rounded-circle avatar-border'>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>";
echo $row['referrer_id'];
echo "</p>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>".$row['fname']." ".$row['lname']."</h4>";
echo "</div></div></div>";
}}}
?>  
</div>

<div class="row">
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT COUNT(referrer_id) as total FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level9='$memberid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
echo "<h4>Generation Nine - <b>".$row['total']." Members"."</b></h4>";
?>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level9='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-6 col-lg-2 col-sm-6 col-md-4'><div class='card bg-danger-subtle'><div class='card-body'>"; 
echo "<img src='assets/images/users/user-12.jpg' alt='avatar' class='img-fluid avatar-md img-thumbnail me-2 rounded-circle avatar-border'>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>";
echo $row['referrer_id'];
echo "</p>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>".$row['fname']." ".$row['lname']."</h4>";
echo "</div></div></div>";
}}}
?>  
</div>

<div class="row">
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT COUNT(referrer_id) as total FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level10='$memberid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
echo "<h4>Generation Ten - <b>".$row['total']." Members"."</b></h4>";
?>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level10='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-6 col-lg-2 col-sm-6 col-md-4'><div class='card bg-primary-subtle'><div class='card-body'>"; 
echo "<img src='assets/images/users/user-12.jpg' alt='avatar' class='img-fluid avatar-md img-thumbnail me-2 rounded-circle avatar-border'>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>";
echo $row['referrer_id'];
echo "</p>";
echo "<p style='font-size: 0.8em;' class='fs-10 mb-0'>".$row['fname']." ".$row['lname']."</h4>";
echo "</div></div></div>";
}}}
?>  
</div>
</div> <!-- content -->



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
    <input type="text" name="referal" hidden value="<?php echo $memberid;?>" id="simpleinput" placeholder="Phone Number" class="form-control">
</div>

<div class="mb-3">
    <button name="register" class="btn btn-primary form-control" type="submit">Register</button>
</div>

</form>
        </div> <!-- end modal body -->
    </div> <!-- end modal content -->
</div>
</div> <!-- container-fluid -->



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