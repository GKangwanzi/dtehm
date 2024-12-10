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
                                                <th>Order ID</th>
                                                <th>Product Name</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <tr>
                                                    <td>#002</td>
                                                    <td>Noni Juice Mix</td>
                                                    <td>2023-12-22</td>
                                                    <td>UGX 203,000</td>
                                                    <td>
                                                        <span class="badge bg-primary-subtle text-primary fw-semibold">Delivered</span>
                                                    </td>
                                                     <td>
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="View Details">
                                                            <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                        </a>
                                                        <a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete order">
                                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#002</td>
                                                    <td>Noni Juice Mix</td>
                                                    <td>2023-12-22</td>
                                                    <td>UGX 203,000</td>
                                                    <td>
                                                        <span class="badge bg-warning-subtle text-warning fw-semibold">Pending</span>
                                                    </td>
                                                     <td>
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="View Details">
                                                            <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                        </a>
                                                        <a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete order">
                                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#002</td>
                                                    <td>Cabul-500 Capsules</td>
                                                    <td>2023-12-22</td>
                                                    <td>UGX 105,000</td>
                                                    <td>
                                                        <span class="badge bg-danger-subtle text-danger fw-semibold">Cancelled</span>
                                                    </td>
                                                     <td>
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="View Details">
                                                            <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                        </a>
                                                        <a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete order">
                                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#002</td>
                                                    <td>Noni Juice Mix</td>
                                                    <td>2023-12-22</td>
                                                    <td>UGX 203,000</td>
                                                    <td>
                                                        <span class="badge bg-primary-subtle text-primary fw-semibold">Completed</span>
                                                    </td>
                                                     <td>
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="View Details">
                                                            <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                        </a>
                                                        <a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete order">
                                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>


                                                
                                                
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
<?php include "includes/footer.php" ?>




