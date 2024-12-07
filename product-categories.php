<?php include "includes/head.php" ?>

<!-- Left Sidebar Start -->
<?php include 'includes/left-menu.php'; ?>
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
                    <div class="col-5">
                    <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add category</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                    <div class="row">
                    <div class="col-12">
                    <form>
                    <div class="mb-3">
                    <label for="simpleinput" class="form-label">Category name</label>
                    <input type="text" id="simpleinput" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="example-textarea" class="form-label">Description</label>
                        <textarea class="form-control" id="example-textarea" rows="6" spellcheck="false"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="example-select" class="form-label">.</label>
                        <button class="btn btn-primary form-control" type="submit">Add Category</button>
                    </div>

                    </form>
                    </div>
                    </div>
                    </div>

                    </div>
                    </div>



                    <div class="col-7">
                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title mb-0">Categories</h5>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <td>#001</td>
                                            <td>Category 1</td>
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
                                            <td>#002</td>
                                            <td>Category 2</td>
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
                                            <td>#003</td>
                                            <td>Category 3</td>
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
                                            <td>#004</td>
                                            <td>Category 4</td>
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
                                            <td>#005</td>
                                            <td>Category 5</td>
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