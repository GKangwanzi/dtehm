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

<!-- Start Row -->
<div class="row">
<div class="col-md-3 col-xl-3">
<div class="card" style="background: #61B231;">
<div class="card-body">

<div class="widget-first">
<div class="d-flex justify-content-between align-items-end">
<div>
<div class="d-flex align-items-center mb-3">
<div class="bg-primary-subtle rounded-2 p-1 me-2 border border-dashed border-primary">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><path fill="#287F71" fill-rule="evenodd" d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z" clip-rule="evenodd"/></svg>
</div>
<p class="mb-0 text-light fs-15">Wallet Balance</p>
</div>
<h3 class="mb-0 fs-24 text-white me-2">
    <?php 
        $memberid = $_SESSION['id'];
        $sql = "SELECT SUM(amount) AS wtotal FROM deposits WHERE member = '$memberid'AND status='Complete' ";
        $sql1    = "SELECT SUM(total) as totalOrders FROM orders WHERE member = '$memberid' ";
            $result = mysqli_query($con, $sql1);
            $row    = mysqli_fetch_array($result);
            $totalOrders  = (int)$row['totalOrders'];



        if($result = mysqli_query($con, $sql)){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $currencyBalance = (int)$row['wtotal'] - $totalOrders;
                echo "Ugx ".number_format($currencyBalance, 0, '.', ',');
                mysqli_free_result($result);
            } else{
                echo "Ugx 0";
            }
        }
        ?></h3>
</div>

</div>
</div>
</div>
</div>
</div>

<div class="col-md-6 col-xl-3">
<div class="card" style="background: #4E9322;">
<div class="card-body">


<div class="widget-first">
<div class="d-flex justify-content-between align-items-end">
<div>
<div class="d-flex align-items-center mb-3">
<div class="bg-primary-subtle rounded-2 p-1 me-2 border border-dashed border-primary">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><path fill="#287F71" fill-rule="evenodd" d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z" clip-rule="evenodd"/></svg>
</div>
<p class="mb-0 text-light fs-15">Commission Balance</p>
</div>
<h3 class="mb-0 fs-24 text-white me-2">
<?php 
$memberid = $_SESSION['id'];
$sql = "SELECT SUM(amount) AS ctotal FROM commissions WHERE member = '$memberid' ";
if($result = mysqli_query($con, $sql)){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $totalcommission = $row['ctotal'];
            } else{
                $totalcommission = 0;
            }
        }


$sql = "SELECT SUM(amount) AS cwtotal FROM commission_withdraws WHERE member = '$memberid' AND status='paid' ";
if($result = mysqli_query($con, $sql)){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $totalwcommission = $row['cwtotal'];
            } else{
                $totalwcommission = 0;
            }
        }


$balance = $totalcommission - $totalwcommission;

echo "Ugx ".number_format($balance, 0, '.', ',');

?>
</h3>
</div>

</div>
</div>



</div>
</div>
</div>

<div class="col-md-6 col-xl-3">
<div class="card" style="background: #287F71;">
<div class="card-body">
<div class="widget-first">
<div class="d-flex justify-content-between align-items-end">
<div>
<div class="d-flex align-items-center mb-3">
<div class="bg-primary-subtle rounded-2 p-1 me-2 border border-dashed border-primary">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><path fill="#287F71" fill-rule="evenodd" d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z" clip-rule="evenodd"/></svg>
</div>
<p class="mb-0 text-light fs-15">Total Deposits</p>
</div>
<h3 class="mb-0 fs-24 text-white me-2">
    <?php 
        $memberid = $_SESSION['id'];
        include "includes/dbhandle.php";
        $sql = "SELECT SUM(amount) AS wtotal FROM deposits WHERE member = '$memberid'AND status='Complete' ";
        if($result = mysqli_query($con, $sql)){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                echo "Ugx ".number_format($row['wtotal'], 0, '.', ',');
                mysqli_free_result($result);
            } else{
                echo "Ugx 0";
            }
        }
        ?></h3>
</div>

</div>
</div>
</div>
</div>
</div>

<div class="col-md-6 col-xl-3">
<div class="card" style="background: #21685A;">
<div class="card-body">
<div class="widget-first">
<div class="d-flex justify-content-between align-items-end">
<div>
<div class="d-flex align-items-center mb-3">
<div class="bg-primary-subtle rounded-2 p-1 me-2 border border-dashed border-primary">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><path fill="#287F71" fill-rule="evenodd" d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z" clip-rule="evenodd"/></svg>
</div>
<p class="mb-0 text-light fs-15">Total Withdraw</p>
</div>
<h3 class="mb-0 fs-24 text-white me-2">
<?php 
$memberid = $_SESSION['id'];

$sql = "SELECT SUM(amount) AS tcwtotal FROM commission_withdraws WHERE member = '$memberid'";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        echo "Ugx ".number_format($row['tcwtotal'], 0, '.', ',');
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
<h5 class="card-title text-black mb-0">My Recent Order</h5>
</div>
</div>

<div class="card-body p-0">
<div class="table-responsive">
<table class="table table-traffic mb-0">

<thead>
<tr>
<th>Order ID</th>
<th>Product</th>
<th>Total</th> 
<th>Created</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<?php

$sql = "SELECT * FROM orders INNER JOIN products ON orders.product=products.prodID WHERE orders.member='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<tr>"; 
echo "<td>
<a href='javascript:void(0);' class='text-muted'>".$row['orderid']."</a>
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