<?php 
include "includes/head.php";
include "includes/dbhandle.php";
?>
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




<!-- Datatables  -->
<div class="row">
<div class="col-12">
<div class="card">

<div class="card-header">
<h5 class="card-title mb-0">Products</h5>
</div><!-- end card header -->

<div class="card-body">
<table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
<thead>
<tr>
<th>Product Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Points</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$tableName = "products";
$tableid = "prodID";
$sql = "SELECT * FROM $tableName";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<tr>"; 
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['price']. "</td>";
echo "<td>" . $row['qty'] . "</td>";
echo "<td>" . $row['points'] . "</td>";
 echo "<td>                                                       
    <a href='editprod.php?id=".$row['prodID']."' aria-label='anchor' class='btn btn-sm bg-primary-subtle me-1' data-bs-toggle='tooltip' data-bs-original-title='Edit Category'>
        <i class='mdi mdi-pencil-outline fs-14 text-primary'></i>
    </a>
    <a onclick='return checkDelete()' href='core/delete.php?id=".$row['prodID']."&t=".$tableName."&tID=".$tableid."' aria-label='anchor' class='btn btn-sm bg-danger-subtle' data-bs-toggle='tooltip' data-bs-original-title='Delete'>
        <i class='mdi mdi-delete fs-14 text-danger'></i>
    </a>
</td>";
}
}else{
echo "No records matching your query were found.";
}
}else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>

</tbody>
</table>
</div>

</div>
</div>
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
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete this record?');
}
</script>
<?php include "includes/footer.php" ?>




