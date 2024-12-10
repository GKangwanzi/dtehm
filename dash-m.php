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
<h3 class="mb-0 fs-24 text-white me-2">Ugx 25,894</h3>
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
<h3 class="mb-0 fs-24 text-white me-2">Ugx 32,000</h3>
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
<h3 class="mb-0 fs-24 text-white me-2">Ugx 15,894</h3>
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
<h3 class="mb-0 fs-24 text-white me-2">Ugx 2,894</h3>
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
<th>Customer Name</th>
<th>Product</th>
<th>Total</th>
<th>Created</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tr>
<td>
<a href="javascript:void(0);" class="text-muted">#4125</a>
</td>
<td class="d-flex align-items-center">

<div>
    <p class="mb-0 fw-medium fs-14">Randal Dare</p>
    <p class="text-muted fs-13 mb-0">0756338621</p>
</div>
</td>
<td>
<p class="mb-0">93</p>
</td>
<td>
<p class="mb-0">$568.00</p>
</td>
<td>
<p class="mb-0">January 19, 2023</p>
</td>
<td>
<span class="badge bg-primary-subtle text-primary fw-semibold">Delivered</span>
</td>
<td>                                                       
<a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
    <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
</a>
<a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete">
    <i class="mdi mdi-delete fs-14 text-danger"></i>
</a>
</td>
</tr>

<tr>
<td>
<a href="javascript:void(0);" class="text-muted">#6532</a>
</td>
<td class="d-flex align-items-center">

<div>
    <p class="mb-0 fw-medium fs-14">Bickle Bob</p>
    <p class="text-muted fs-13 mb-0">0778469923</p>
</div>
</td>
<td>
<p class="mb-0">56</p>
</td>
<td>
<p class="mb-0">$398.00</p>
</td>
<td>
<p class="mb-0">April 25, 2023</p>
</td>
<td>
<span class="badge bg-danger-subtle text-danger fw-semibold">Cancelled</span>
</td>
<td>                                                       
<a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
    <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
</a>
<a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete">
    <i class="mdi mdi-delete fs-14 text-danger"></i>
</a>
</td>
</tr>

<tr>
<td>
<a href="javascript:void(0);" class="text-muted">#7405</a>
</td>
<td class="d-flex align-items-center">

<div>
    <p class="mb-0 fw-medium fs-14">Emma Wilson</p>
    <p class="text-muted fs-13 mb-0">0744973644</p>
</div>
</td>
<td>
<p class="mb-0">68</p>
</td>
<td>
<p class="mb-0">$652.00</p>
</td>
<td>
<p class="mb-0">September 24, 2023</p>
</td>
<td>
<span class="badge bg-info-subtle text-info fw-semibold">Pending</span>
</td>
<td>                                                       
<a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
    <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
</a>
<a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete">
    <i class="mdi mdi-delete fs-14 text-danger"></i>
</a>
</td>
</tr>


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