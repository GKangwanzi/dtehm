
<?php 
include "includes/head.php";
include "includes/dbhandle.php";
?>

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

</div>
</div>
 open
<!-- Start Row -->
<div class="row">
<div class="col-md-6 col-xl-3">
<div class="card">
<div class="card-body">

<div class="widget-first">
<div class="d-flex justify-content-between align-items-end">
<div>
<div class="d-flex align-items-center mb-3">
<div class="bg-primary-subtle rounded-2 p-1 me-2 border border-dashed border-primary">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
</div>
<p class="mb-0 text-dark fs-15">Members</p>
</div>
<h3 class="mb-0 fs-24 text-black me-2"> 
<?php 

$sql = "SELECT COUNT(password) AS tmember FROM members WHERE membership='paid' ";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        echo number_format($row['tmember'], 0, '.', ',');
        mysqli_free_result($result);
    } else{
        echo "0";
    }
}
?>
</h3>
</div>

</div>
</div>
</div>
</div>
</div>

<div class="col-md-6 col-xl-3">
<div class="card">
<div class="card-body">


<div class="widget-first">
<div class="d-flex justify-content-between align-items-end">
<div>
<div class="d-flex align-items-center mb-3">
<div class="bg-secondary-subtle rounded-2 p-1 me-2 border border-dashed border-secondary">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="rgb(150, 59, 104)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg>
</div>
<p class="mb-0 text-dark fs-15">Pending Members</p>
</div>
<h3 class="mb-0 fs-24 text-black me-2">
<?php 

$sql = "SELECT COUNT(password) AS tmember FROM members WHERE membership='unpaid' ";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        echo number_format($row['tmember'], 0, '.', ',');
        mysqli_free_result($result);
    } else{
        echo "0";
    }
}
?>
</h3>
</div>

</div>
</div>



</div>
</div>
</div>

<div class="col-md-6 col-xl-3">
<div class="card">
<div class="card-body">
<div class="widget-first">
<div class="d-flex justify-content-between align-items-end">
<div>
<div class="d-flex align-items-center mb-3">
<div class="bg-info-subtle rounded-2 p-1 me-2 border border-dashed border-info">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="rgb(115, 187, 226)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
</div>
<p class="mb-0 text-dark fs-15">Stockists</p>
</div>
<h3 class="mb-0 fs-24 text-black me-2">
<?php 

$sql = "SELECT COUNT(role) AS sttotal FROM users WHERE role='stockist' ";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        echo number_format($row['sttotal'], 0, '.', ',');
        mysqli_free_result($result);
    } else{
        echo "0";
    }
}
?>
</h3>
</div>

</div>
</div>
</div>
</div>
</div>

<div class="col-md-6 col-xl-3">
<div class="card">
<div class="card-body">
<div class="widget-first">
<div class="d-flex justify-content-between align-items-end">
<div>
<div class="d-flex align-items-center mb-3">
<div class="bg-warning-subtle rounded-2 p-1 me-2 border border-dashed border-warning">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="rgb(245, 148, 64)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
</div>
<p class="mb-0 text-dark fs-15">Products</p>
</div>
<h3 class="mb-0 fs-24 text-black me-2">
<?php 

$sql = "SELECT COUNT(price) AS tprice FROM products";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        echo number_format($row['tprice'], 0, '.', ',');
        mysqli_free_result($result);
    } else{
        echo "0";
    }
}
?>
</h3>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<!-- End Start -->

<!-- Start Row -->
<div class="row">
<div class="col-md-6 col-xl-3">
<div class="card">
<div class="card-body">

<div class="widget-first">
<div class="d-flex justify-content-between align-items-end">
<div>
<div class="d-flex align-items-center mb-3">
<div class="bg-primary-subtle rounded-2 p-1 me-2 border border-dashed border-primary">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><path fill="#287F71" fill-rule="evenodd" d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z" clip-rule="evenodd"/></svg>
</div>
<p class="mb-0 text-dark fs-15">Available Payout</p>
</div>
<h3 class="mb-0 fs-24 text-black me-2"> 
<?php 
$sqlo = "SELECT SUM(amount) AS mobilewithdraws FROM commission_withdraws WHERE account='mobile' ";
$resulto = mysqli_query($con, $sqlo);
$row = mysqli_fetch_array($resulto);
$twithdraws = $row['mobilewithdraws'];

$sql = "SELECT SUM(amount) AS cbtotal FROM commission_balance WHERE status='Success' ";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        echo "Ugx ".number_format($row['cbtotal']-$twithdraws, 0, '.', ',');
        mysqli_free_result($result);
    } else{
        echo "Ugx 0";
    }
}
?>
</h3>
</div>

</div>
</div>
</div>
</div>
</div>

<div class="col-md-6 col-xl-3">
<div class="card">
<div class="card-body">


<div class="widget-first">
<div class="d-flex justify-content-between align-items-end">
<div>
<div class="d-flex align-items-center mb-3">
<div class="bg-secondary-subtle rounded-2 p-1 me-2 border border-dashed border-secondary">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><path fill="rgb(150, 59, 104)" fill-rule="evenodd" d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z" clip-rule="evenodd"/></svg>
</div>
<p class="mb-0 text-dark fs-15">Commission Made</p>
</div>
<h3 class="mb-0 fs-24 text-black me-2">
    <?php 

$sql = "SELECT SUM(amount) AS ctotal FROM commissions ";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        echo "Ugx ".number_format($row['ctotal'], 0, '.', ',');
        mysqli_free_result($result);
    } else{
        echo "Ugx 0";
    }
}
?>
</h3>
</div>

</div>
</div>



</div> 
</div>
</div>

<div class="col-md-6 col-xl-3">
<div class="card">
<div class="card-body">
<div class="widget-first">
<div class="d-flex justify-content-between align-items-end">
<div>
<div class="d-flex align-items-center mb-3">
<div class="bg-info-subtle rounded-2 p-1 me-2 border border-dashed border-info">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="rgb(115, 187, 226)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="8 12 12 16 16 12"></polyline><line x1="12" y1="8" x2="12" y2="16"></line></svg>
</div>
<p class="mb-0 text-dark fs-15">Total Deposits</p>
</div>
<h3 class="mb-0 fs-24 text-black me-2">
<?php 

$sql = "SELECT SUM(amount) AS wtotal FROM deposits WHERE status='Complete' ";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        echo "Ugx ".number_format($row['wtotal'], 0, '.', ',');
        mysqli_free_result($result);
    } else{
        echo "Ugx 0";
    }
}
?>
</h3>
</div>

</div>
</div>
</div>
</div>
</div>

<div class="col-md-6 col-xl-3">
<div class="card">
<div class="card-body">
<div class="widget-first">
<div class="d-flex justify-content-between align-items-end">
<div>
<div class="d-flex align-items-center mb-3">
<div class="bg-warning-subtle rounded-2 p-1 me-2 border border-dashed border-warning">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="rgb(245, 148, 64)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="16 12 12 8 8 12"></polyline><line x1="12" y1="16" x2="12" y2="8"></line></svg>
</div>
<p class="mb-0 text-dark fs-15">Total Withdraw</p>
</div>
<h3 class="mb-0 fs-24 text-black me-2">
<?php 

$sql = "SELECT SUM(amount) AS cwtotal FROM commission_withdraws WHERE status='paid' ";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        echo "Ugx ".number_format($row['cwtotal'], 0, '.', ',');
        mysqli_free_result($result);
    } else{
        echo "Ugx 0";
    }
}
?>
</h3>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<!-- End Start -->




<div class="row">
<!-- Start Recent Order -->
<div class="col-md-12">
<div class="card overflow-hidden mb-0">
<div class="card-header">
<div class="d-flex align-items-center">
<h5 class="card-title text-black mb-0">Recent Order</h5>
</div>
</div>

<div class="card-body p-0">
<div class="table-responsive">
<table class="table table-traffic mb-0">

<thead>
<tr>
<th>Order ID</th>
<th>Customer Name</th>
<th>Product</th>
<th>Qty</th>
<th>Total</th>
<th>Created</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<?php

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
<p class='mb-0'>".$row['qty']."</p>
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
<!-- End Recent Order -->
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