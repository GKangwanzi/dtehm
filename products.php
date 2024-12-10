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
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantiry</th>
                                                <th>Uploaded</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <tr>
                                                    <td>Noni Juice Mix</td>
                                                    <td>UGX 203,000</td>
                                                    <td>16</td>
                                                    <td>2023-12-22</td>
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
                                                    <td>Dura Vine Juice</td>
                                                    <td>UGX 203,000</td>
                                                    <td>53</td>
                                                    <td>2023-05-05</td>
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
                                                    <td>Dynamic Slim Juice</td>
                                                    <td>UGX 176,000</td>
                                                    <td>24</td>
                                                    <td>2023-01-20</td>
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
                                                    <td>ESPI Hist Juice</td>
                                                    <td>UGX 176,000</td>
                                                    <td>42</td>
                                                    <td>2023-09-18</td>
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
                                                    <td>Adino Plus Capsules</td>
                                                    <td>UGX 163,000</td>
                                                    <td>27</td>
                                                    <td>2022-06-15</td>
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
                                                    <td>Force 4 DS Capsules</td>
                                                    <td>UGX 163,000</td>
                                                    <td>61</td>
                                                    <td>2022-11-30</td>
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
                                                    <td>IQ-Vision Capsules</td>
                                                    <td>UGX 163,000</td>
                                                    <td>23</td>
                                                    <td>2023-04-05</td>
                                                     <td>                                                       
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                            <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                        </a>
                                                        <a aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete">
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




