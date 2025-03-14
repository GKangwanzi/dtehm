<?php 
include "includes/dbhandle.php";
include "includes/head.php";
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
         <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
           Add New Member 
        </button>-->
    </div>

<div class="text-end">
<?php
//Create new beneficiary
if (isset($_POST['post'])){

    
    $name           = $_POST['proname'];
    $price          = $_POST['price'];
    $description    = $_POST['description'];
    $category       = $_POST['category'];
    $qty            = $_POST['qty'];
    $points         = $_POST['points'];

    $filename       = $_FILES["uploadfile"]["name"];
    $tempname       = $_FILES["uploadfile"]["tmp_name"];
    $folder         = "photos/" . $filename;
 
    $sql = "INSERT INTO products (name, price, description, category, qty, photo, points)
    VALUES ('$name', '$price', '$description', '$category', '$qty', '$filename', '$points')";

    if(mysqli_query($con, $sql) and move_uploaded_file($tempname, $folder)){
        echo "
        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
            Product added successful!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
            </button>
        </div>";

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        // Close connection
        mysqli_close($con);

    }else{
       echo "<p class='text-subtitle text-muted'>"."Use this form to add a new product"."</p>";
    }
    ?>
    </div>
</div>

<!-- General Form -->
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="row">
<form enctype="multipart/form-data" method="POST">
<div class="mb-3">
    <label for="simpleinput" class="form-label">Product Name</label>
    <input type="text" name="proname" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <label for="simpleinput" class="form-label">Price</label>
    <input type="text" name="price" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <label for="example-email" class="form-label">Quantity</label>
    <input type="number" name="qty" id="example-email" name="example-email" class="form-control">
</div>
<div class="mb-3">
    <label class="form-label">Points</label>
    <input type="number" name="points"  class="form-control">
</div>
<div class="mb-3">
    <label for="example-select" class="form-label">Product Category</label>
    <select class="form-select" name="category" id="example-select" class="choices form-select" name="branch">
        <option>Select Category</option>
        <?php 
        include "includes/dbhandle.php";
        $sql = "SELECT * FROM pro_categories";
        if($result = mysqli_query($con, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        echo '<option value='.$row['proID'].'>' 
                        . $row['name']. '</option>';
                }
                mysqli_free_result($result);
            } else{
                echo "No records found.";
            }
        }
        ?>
    </select>
</div>
<div class="mb-3">
    <label for="formFile"  class="form-label">Product photo</label>
    <input class="form-control" type="file" name="uploadfile" id="formFile">
</div>

<div class="mb-3">
    <label for="example-textarea" class="form-label">Product description</label>
    <textarea class="form-control" name="description" id="example-textarea" rows="13" spellcheck="false"></textarea>
</div>
<div class="mb-3">
    <label for="example-select" class="form-label"></label>
    <button class="btn btn-primary form-control" name="post" type="submit">Add Product</button>
</div>
</form>
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
&copy; <script>document.write(new Date().getFullYear())</script> Developed at <a href="#!" class="text-reset fw-semibold">JulyBrands Digital</a> 
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

<!-- Vendor -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>

<!-- Apexcharts JS -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- for basic area chart -->
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

<!-- Widgets Init Js -->
<script src="assets/js/pages/ecommerce-dashboard.init.js"></script>

<!-- App js-->
<script src="assets/js/app.js"></script>

</body>
</html>