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
        
    </div>

<div class="text-end">


<?php
//Update members
if (isset($_POST['update'])){

    $member     = $_GET['id'];
    $memberid   = $_POST['memberid'];
    $fname      = $_POST['fname'];
    $lname      = $_POST['lname'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];

     
    $sql = "UPDATE members SET memberID='$memberid', fname='$fname', lname='$lname', email='$email', phone='$phone' WHERE memberID='$member'";

    if(mysqli_query($con, $sql)){
        echo "
        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
            Member details updated successfully!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
            </button>
        </div>";
        ?>
        <script type="text/javascript">
            window.setTimeout(function(){
        window.location.href = "members.php";
        }, 2000);
        </script>
        <?php

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        
 
    }else{
       echo "<p class='text-subtitle text-muted'>"."My Profile"."</p>";
    }
    ?>
    </div>
</div>




    <!-- Datatables  -->
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Update Members</h5>
                </div><!-- end card header -->

                <div class="card-body">
<?php
if (isset($_GET['id'])){

$memberid = $_GET['id'];
$sql = "SELECT * FROM members WHERE memberID='$memberid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
}
    ?>
<form action="" method="POST">
<div class="mb-3">
<input type="text" value="<?php echo $row['memberID']; ?>" name="memberid" id="simpleinput" placeholder="Member ID" class="form-control">
</div>
<div class="mb-3">
    <input type="text" value="<?php echo $row['fname']; ?>" name="fname" id="simpleinput" placeholder="First Name" class="form-control">
</div>
<div class="mb-3">
    <input type="text" value="<?php echo $row['lname']; ?>" name="lname" id="simpleinput" placeholder="Last Name" class="form-control">
</div>
<div class="mb-3">
    <input type="email" value="<?php echo $row['email']; ?>" id="example-email" name="email" class="form-control" placeholder="Email Address">
</div>

<div class="mb-3">
    <input type="text" value="<?php echo $row['phone']; ?>" name="phone" id="simpleinput" placeholder="Phone Number" class="form-control">
</div>

<div class="mb-3">
    <button name="update" class="btn btn-primary form-control" type="submit">Update</button>
</div>

</form>

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




