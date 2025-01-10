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

<div class="row">
<h4>Generation 1</h4>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level1='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){

echo '<div class="col-2"><div class="card bg-primary-subtle">
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
<h4>Generation 2</h4>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level2='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-2'><div class='card bg-success-subtle'><div class='card-body'>"; 
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
<h4>Generation 3</h4>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level3='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-2'><div class='card bg-secondary-subtle'><div class='card-body'>"; 
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
<h4>Generation 4</h4>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level4='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-2'><div class='card bg-warning-subtle'><div class='card-body'>"; 
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
<h4>Generation 5</h4>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level5='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-2'><div class='card bg-primary-subtle'><div class='card-body'>"; 
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
<h4>Generation 6</h4>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level6='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-2'><div class='card bg-success-subtle'><div class='card-body'>"; 
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
<h4>Generation 7</h4>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level7='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-2'><div class='card bg-secondary-subtle'><div class='card-body'>"; 
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
<h4>Generation 8</h4>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level8='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-2'><div class='card '><div class='card-body'>"; 
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
<h4>Generation 9</h4>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level9='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-2'><div class='card bg-danger-subtle'><div class='card-body'>"; 
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
<h4>Generation 10</h4>
<?php
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM referrals INNER JOIN members ON referrals.referrer_id=members.memberID WHERE referrals.level10='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<div class='col-2'><div class='card bg-primary-subtle'><div class='card-body'>"; 
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