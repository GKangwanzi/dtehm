<?php include "core/insert.php" ?>
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
<h5 class="card-title mb-0">Register a branch</h5>
</div><!-- end card header -->
<div class="card-body">
<div class="row">
<div class="col-12">
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
try {

    $db = new Database("localhost", "root", "", "dtehm");

    $tableName = "branches";
    $data = [
        "name" => $_POST["branch_name"],
        "description" => $_POST["description"]
    ];

    $insertedId = $db->insert($tableName, $data);
    echo "
        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
            Branch registration successful!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
            </button>
        </div>";

    $db->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
}
?>
<form action="" method="POST">
<div class="mb-3">
<label for="simpleinput" class="form-label">Branch name</label>
<input name="branch_name" type="text" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
<label for="example-textarea" class="form-label">Branch location</label>
<textarea name="description" class="form-control" id="example-textarea" rows="5" spellcheck="false"></textarea>
</div>
<div class="mb-3">
<label for="example-select" class="form-label">.</label>
<button class="btn btn-primary form-control" type="submit">Add Branch</button>
</div>

</form>
</div>
</div>
</div>

</div>
</div>



<div class="col-7">

<?php
if (isset($_GET['edit'])) {
    // code...
}else{

    
}

 ?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Registred Branches</h5>
    </div><!-- end card header -->

    <div class="card-body">
        <?php
    include "./includes/dbhandle.php";

    $sql = "SELECT * FROM branches";
    if($result = mysqli_query($con, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table id='datatable' class='table table-bordered dt-responsive table-responsive nowrap'>";
                echo "<thead>";
                 echo "<tr>";
                    echo "<th>Name</th>";
                    echo "<th>User Role</th>";
                    echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>"; 
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>                                                       
                        <a aria-label='anchor' class='btn btn-sm bg-primary-subtle me-1' data-bs-toggle='tooltip' data-bs-original-title='Edit'>
                            <i class='mdi mdi-pencil-outline fs-14 text-primary'></i>
                        </a>
                        <a href='delete.php?id=".$row['id']."' aria-label='anchor' class='btn btn-sm bg-danger-subtle' data-bs-toggle='tooltip' data-bs-original-title='Delete'>
                            <i class='mdi mdi-delete fs-14 text-danger'></i>
                        </a>
                    </td>";
                echo "</tr>";
            } 
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    ?>
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