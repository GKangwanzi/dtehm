<?php include "core/insert.php" ?>
<?php include "includes/dbhandle.php" ?>
<?php include "includes/con.php" ?>
<?php include "includes/head.php" ?>

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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
            Add New Branch
        </button>
    </div>

    <div class="text-end">
<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
try {

    $tableName = "branches";
    $data = [
        "name" => $_POST["branch_name"],
        "code" => $_POST["branch_code"]
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
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalgridLabel">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalgridLabel">New Branch</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

<form action="" method="POST">
<div class="mb-3">
<label for="simpleinput" class="form-label">Branch name</label>
<input name="branch_name" type="text" class="form-control">
</div>
<div class="mb-3">
<label for="simpleinput" class="form-label">Branch Code</label>
<input name="branch_code" type="text" id="simpleinput" class="form-control">
</div>

<div class="mb-3">
<label for="example-select" class="form-label">.</label>
<button class="btn btn-primary form-control" type="submit">Add Branch</button>
</div>

</form>
        </div> <!-- end modal body -->
    </div> <!-- end modal content -->
</div>
</div>



<!-- Datatables  -->
<div class="row">
<div class="col-12">
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Registred Branches</h5>
    </div><!-- end card header -->

<div class="card-body">
    <?php
    $tableName = "branches";
    $tableid = "id";
    $sql = "SELECT * FROM branches";
    if($result = mysqli_query($con, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table id='datatable' class='table table-bordered dt-responsive table-responsive nowrap'>";
                echo "<thead>";
                 echo "<tr>";
                    echo "<th>Code</th>";
                    echo "<th>Name</th>";
                    echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>"; 
                    echo "<td>" . $row['code'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>                                                       
                        <a aria-label='anchor' class='btn btn-sm bg-primary-subtle me-1' data-bs-toggle='tooltip' data-bs-original-title='Edit'>
                            <i class='mdi mdi-pencil-outline fs-14 text-primary'></i>
                        </a>
                        <a onclick='return checkDelete()' href='core/delete.php?id=".$row['id']."&t=".$tableName."&tID=".$tableid."' aria-label='anchor' class='btn btn-sm bg-danger-subtle' data-bs-toggle='tooltip' data-bs-original-title='Delete'>
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
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete this record?');
}
</script>
<?php include "includes/footer.php" ?>